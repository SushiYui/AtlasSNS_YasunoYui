<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    //

    public function profile(Request $request){

        // ログインしているユーザーの情報を持ってくる
        $user = Auth::user();

        return view('users.profile', compact('user'));
    }

    public function update(Request $request){

        // バリデーションの設定
        $request->validate([
            'username' => 'required|string|max:255',
            'mail' => 'required|string|email|max:255',
            'password' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:400',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $user = Auth::user();

        // パスワードとパスワード確認が一致するかどうかをチェック
        if($request->input('password') === $request->input('password_1')){
            $user->password = Hash::make($request->input('password'));
        }else{
            return redirect()->back()->withErrors(['password' => 'パスワードが一致しません']);
        }

        $user->username = $request->input('username');
        $user->mail = $request->input('mail');
        $user->bio = $request->input('bio');

        // 画像の更新処理
        if($request->hasFile('images')){
        // 変数作って名前を変更する。アップロードしたファイルの元の名前を取得する
        $photo = $request->file('images')->getClientOriginalName();
        // pathinfo関数を使って、ファイル名から拡張子を除いた部分のみを取得する
        $photoName = pathinfo($photo, PATHINFO_FILENAME);
        // アップロードされたファイルの元の拡張子（例：jpg、png）を取得
        $extension = $request->file('images')->getClientOriginalExtension();

        $newPhoto = $photoName . '_'. time() .'.' . $extension;
        // $requestオブジェクトからimagesを取得して、storeAsメソッドでファイル名を指定して保存
        // （今回は'public/images'）に画像を保存している
        $path = $request->file('images')->storeAs('public/images',$newPhoto);

        // dd($path);

        if($user->images) {
            Storage::delete('public/images/' . $user->images);
        }
        
        // 登録するのに必要な項目を代入
        $user->images = $newPhoto;
        }
        
        $user->save();

        Auth::setUser($user);
        // dd($user);
        
        return redirect('/top');
        

    }


    // 検索処理の実施
    public function search(Request $request)
    {
        // dd($request->all());

        $keyword = $request->input('keyword');
        // 検索ワードを一時的に記録する
        // $searchHistory = $request->session()->get('search_history', []);
        if(!empty($keyword)){

            $users = User::where('username', 'like', '%' . $keyword . '%')->get();
        }else{
            $users = User::all();
        }
        // dd($users);

        return view('users.search', compact('keyword', 'users'));
    }


    // フォロー機能の実装で、特定のユーザーとの関係性を確認
    public function get_user($user_id){

        $user = User::with('following')->with('followed')->findOrFail('$user_id');
        return response()->json($user);
    }


    // フォローリストで選択したユーザーのプロフィール表示
    public function show($id){

        // findOrFile⇒指定した主キーを使ってレコードを取得する
        $user = User::findOrFail($id);

        dd($user);
        return view('users.friendProfile', compact('user'));
    }
    
}