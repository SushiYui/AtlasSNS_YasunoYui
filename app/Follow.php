<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'following_id', 'followed_id'
      ];

      // フォローしている人
      public function getFollow($user_id){
        return $this->where('following_id', $user_id);
      }
      // フォローされている
      public function getFollower($user_id){
        return $this->where('followed_id', $user_id);
      }

}
