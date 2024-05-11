<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'following_id', 'followed_id'
      ];

      public function getFollowCount(){
        return $this ->where('following_id',$user_id)->count();
      }
      public function getFollowerCount(){
        return $this ->where('followed_id',$user_id)->count();
      }

}
