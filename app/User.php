<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password', 'images',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // フォローする
    public function follow(Int $user_id) 
    {
        return $this->follows()->attach($user_id);
    }

        // フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }
    
    // 関係に基づいて関連データを取得したい
    public function follows (){
        // Userモデルの中でこのリレーションを定義すると、あるユーザーがフォローしている
        // 他のユーザーを簡単に取得することが出来る
        return $this->belongsToMany(User::class, 'follows','following_id','followed_id');
    }
    public function followers() {
        
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
    }
    

    // $thisはFollowモデルのインスタンス（データを示す）
    // 自分がフォローしているユーザーとの繋がりを取得している
    public function isFollowing(INT $user_id)
    {
        return (boolean) $this->follows()->where('followed_id', $user_id)->exists();
    }
    // 自分がフォローされているユーザーとの繋がりを取得している
    public function isFollowed(INT $user_id)
    {
        return (boolean) $this->followers()->where('following_id', $user_id)->exists();
    }
}
