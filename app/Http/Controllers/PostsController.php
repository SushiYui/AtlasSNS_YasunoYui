<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    //
    public function index(){

        $results = DB::table('users')
        ->join('posts', 'users.id', '=', 'posts.user_id')
        ->select('users.username', 'posts.id' , 'posts.user_id' , 'posts.post')
        ->get();
        // dd($result);

        return view('posts.index')->with(compact('results'));
    }


    public function tweet(Request $request){
        if($request->isMethod('post')){
            
            // ログインしているユーザー情報も取ってくる
            $user = Auth::user();
            $post = $request->input('content');
            // dd($user, $post);

            Post::create([
                'user_id' => $user->id,
                'post' => $post,
            ]);

            return redirect('/top');
        }
        return view('posts.index');
    }


    // *** 編集画面の表示  
    public function edit(Post $post){

        return view('posts.edit',compact('post'));
    }

    // *** 更新処理
    public function update(Request $request, Post $post){

        $request->validate([
            'content' => 'required|max:150',
        ]);

        $post->post = $request->input('content');
        $post->save();

        return redirect()->route('top');
    } 



    // 投稿削除用のメソッド
    public function delete($id){

        // 指定されたIDの投稿を削除
        Post::where('id',$id)->delete();
        return redirect('/top');

    }
}

