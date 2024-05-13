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
    //
    // public function followList(User $user, Follow $follow){
    //     $login_user = auth()->user();

    //     $is_following = $login_user->isFollowing($user->id);
    //     $follow_count = $follow->getFollowCount($user->id);
        
    //     return view('follows.followList',[
    //         'user'           => $user,
    //         'is_following'   => $is_following,
    //         'follow_count'   => $follow_count
    //     ]);
    // }
    // public function followerList(User $user, Follow $follow){
    //     $login_user = auth()->user();
    //     $is_followed = $login_user->isFollowed($user->id);
    //     $follower_count = $follow->getFollowCount($user->id);
    //     return view('follows.followerList',[
    //         'user'           => $user,
    //         'is_followed'    => $is_followed,
    //         'follower_count' => $follower_count
    //     ]);
    // }
}
