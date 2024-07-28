@extends('layouts.login')

@section('content')

<div class="content">
{!! Form::open(['url' => '/users/profile', 'method' => 'POST' , 'files' => true]) !!}
   <p class="title">ユーザー名</p>
   {!! Form::text('username', $user->username, ['placeholder' => 'ユーザー名']) !!}
   <p class="title">メールアドレス</p>
   {!! Form::text('mail', $user->mail, ['placeholder' => 'メールアドレス' ]) !!}
   <p class="title">パスワード</p>
   {!! Form::password('password',  ['placeholder' => 'パスワード']) !!}
   <p class="title">パスワード確認</p>
   {!! Form::password('password_1',  ['placeholder' => 'パスワード確認']) !!}
   <p class="title">自己紹介</p>
   {!! Form::text('bio', null, ['placeholder' => '自己紹介']) !!}
   <p class="title">アイコン画像</p>
   {!! Form::file('images') !!}
   {!! Form::submit('更新') !!}
{!! Form::close() !!}
</div>

@endsection