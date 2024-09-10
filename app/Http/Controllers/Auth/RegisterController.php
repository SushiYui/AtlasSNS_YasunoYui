<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request){
        if($request->isMethod('post')){

            $validatedData =$request->validate([
                'username' =>'required|string|min:2|max:12',
                'mail' =>'required|string|email|min:5|max:40|unique:users,mail',
                'password' =>'required|string|min:8|max:20|confirmed',
            ]);
            
            $username = $request->input('username');
            $mail = $request->input('mail');
            $password = $request->input('password');

            User::create([
                'username' => $validatedData['username'],
                'mail' => $validatedData['mail'],
                'password' => bcrypt($validatedData['password']),
            ]);

            return redirect('added')->with('username',$username);
        }
        return view('auth.register');
    }

    public function added(Request $request){
        $username = $request->session()->get('username');
        return view('auth.added')->with(compact('username'));
    }
}
