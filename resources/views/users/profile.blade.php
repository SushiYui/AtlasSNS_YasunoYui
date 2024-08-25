@extends('layouts.login')

@section('content')

<div class="profile-content">
    <img src="{{ asset('storage/images/' . Auth::user()->images) }}" class= "photo-size">
{!! Form::open(['url' => '/users/profile', 'method' => 'POST' , 'files' => true]) !!}
   <div class="profile-user">
   <p class="title">ユーザー名</p>
   {!! Form::text('username', $user->username, ['placeholder' => 'ユーザー名']) !!}
   </div>

   <div class="profile-user">
   <p class="title">メールアドレス</p>
   {!! Form::text('mail', $user->mail, ['placeholder' => 'メールアドレス' ]) !!}
   </div>

   <div class="profile-user">
   <p class="title">パスワード</p>
   {!! Form::password('password',  ['placeholder' => 'パスワード']) !!}
   </div>

   <div class="profile-user">
   <p class="title">パスワード確認</p>
   {!! Form::password('password_1',  ['placeholder' => 'パスワード確認']) !!}
   </div>

   <div class="profile-user">
    <p class="title">自己紹介</p>
   {!! Form::text('bio', null, ['placeholder' => '自己紹介']) !!}
   </div>

   <div class="profile-user">
    <p class="title">アイコン画像</p>
   {!! Form::file('images') !!}
   </div>

   <div class="profile-user">
   {!! Form::submit('更新') !!}
   </div>

{!! Form::close() !!}
</div>

@endsection
