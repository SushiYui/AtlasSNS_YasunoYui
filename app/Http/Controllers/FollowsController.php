<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;
use App\Follow;

class FollowsController extends Controller
{

    public function check_following($id){

        // Followモデルを使用してAuth::id()（今ログインしている人）がフォローしている人を見つけている。
        // $id（特定のユーザー）がフォローされているかどうかを調べている
        $check = Follow::where('following_id', Auth::id() )->where('followed_id', $id);

        if($check->count() == 0){

            // 今ログインしているユーザーが指定のユーザーをフォローしていない場合
            return response()->json(['status' => false]);

        }elseif($check->count() !=0){

            return response() ->json(['status' => true]);

        }
    }

    // フォロー処理実装
    public function following(Request $request){
        // dd($request);

        // 今フォローしている人：Auth::id()がフォローしたいユーザーのID：$request->idを
        // すでにフォローしているのかチェックしている
        $check =Follow::where('following_id', Auth::id())->where('followed_id' , $request->id);

        // まだフォローしていない場合
        if($check->count() == 0){
            $follow = new Follow;
            $follow->following_id =Auth::id();
            $follow->followed_id = $request->id;
            $follow->save();

        }

        return redirect($request->redirect_to);
    }

    // フォローを外す
    public function unFollowing(Request $request){
        // dd($request);

        $unFollowing = Follow::where('following_id',Auth::id())->where('followed_id', $request->id)->delete();

        return redirect($request->redirect_to);

    }

    // フォロー数、フォロワー数をカウント
    // public function show(User $user, Follow $follow){
    //     $user = auth()->user();
    //     $followCount = $follow->getFollowCount($user->id);
    //     $followerCount = $follow->getFollowerCount($user->id);

    //     return view('/layouts/login', compact('followCount', 'followerCount'));
    // }

    // フォローしている人の一覧表示
    public function show(User $user){
        $user = auth()->user();
        // フォローしているユーザーのリストを取得
        $followingList = $user->follows()->get();
        // フォローしているユーザーのIDを取得
        $followingId = $user->follows()->pluck('users.id')->toArray();

        // そのIDに基づいてフォローしているユーザーの最新の投稿を取得
        // $followingIdに含まれているuser_idの投稿をすべて取得
        $posts = Post::whereIn('user_id',$followingId)
        ->orderBy('created_at', 'desc')
        // その投稿を作成したユーザー情報も一緒に取得
        ->with('user')
        ->get();


        return view('follows.followList', compact('followingList','posts'));
    }

    // フォローしてくれた人の一覧表示
    public function friend(User $user){
        $user = auth()->user();

        $followedList = $user->followers()->get();
        $followedId = $user->followers()->pluck('users.id')->toArray();

        $posts = Post::whereIn('user_id', $followedId)
        ->orderBy('created_at' , 'desc')
        ->with('user')
        ->get();

        return view('follows.followerList', compact('followedList' , 'posts'));

    }

    public function tweetList($id){

        $posts = Post::where('user_id', $id)
        ->orderBy('created_at' , 'desc')->with('user')->get();

        $user = User::find($id);

        return view('users.friendProfile', compact('posts', 'user'));

    }

}
