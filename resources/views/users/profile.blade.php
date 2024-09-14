@extends('layouts.login')

@section('content')

<div class="profile-content">
    @if(Auth::user()->images !== 'icon1.png')
    <img src="{{ asset('storage/images/' . Auth::user()->images) }}" class="photo-size">
    @else
    <img src="{{ asset('images/icon1.png') }}" class="photo-size">
    @endif
    {!! Form::open(['url' => '/users/profile', 'method' => 'POST' , 'files' => true]) !!}
@csrf
   <div class="profile-user">
   <p class="title">ユーザー名</p>
   {!! Form::text('username', $user->username, ['placeholder' => 'ユーザー名',
   'maxlength' => "12", 'required' => true, 'minlength' =>"2"]) !!}
   </div>
   @if($errors->has('username'))
      @foreach ($errors->get('usename') as $error )
      <div class="error-message">{{ $error }}</div>
      @endforeach
   @endif


   <div class="profile-user">
   <p class="title">メールアドレス</p>
   {!! Form::text('mail', $user->mail, ['placeholder' => 'メールアドレス',
   'pattern' => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$',
   'title' =>'正しいメールアドレスを入力してください' ]) !!}
   </div>

   @if($errors->has('mail'))
     @foreach ($errors->get('mail') as $error )
     <div class="error-message">{{ $error }}</div>
     @endforeach
   @endif


   <div class="profile-user">
   <p class="title">パスワード</p>
   {!! Form::password('password',  ['placeholder' => 'パスワード',
   'minlength' => 8,
   'pattern' => '[a-zA-Z0-9]+', 'title' =>'8文字以上20文字以内の英数字を入力してください']) !!}
   </div>

   @if($errors->has('password'))
     @foreach ($errors->get('password') as $error )
     <div class="error-message">{{ $error }}</div>
     @endforeach
   @endif


   <div class="profile-user">
   <p class="title">パスワード確認</p>
   {!! Form::password('password_confirmation',  ['placeholder' => 'パスワード確認',
   'minlength' => 8,
   'pattern' => '[a-zA-Z0-9]+', 'title' =>'8文字以上20文字以内の英数字を入力してください']) !!}
   </div>

   <div class="profile-user">
    <p class="title">自己紹介</p>
   {!! Form::text('bio', null, ['placeholder' => '自己紹介',
   'maxlength' => 150]) !!}
   </div>

   @if($errors->has('bio'))
     @foreach ($errors->get('bio') as $error )
     <div class="error-message">{{ $error }}</div>
     @endforeach
   @endif


   <div class="profile-user">
    <p class="title">アイコン画像</p>
    {!! Form::file('images', ['accept' => 'image/jpeg,image/png,image/bmp,image/gif,image/svg+xml']) !!}
  </div>

  @if($errors->has('images'))
    @foreach ($errors->get('images') as $error )
    <div class="error-message">{{ $error }}</div>
  @endforeach
  @endif


   <div class="profile-user">
   {!! Form::submit('更新') !!}
   </div>

{!! Form::close() !!}
</div>

@endsection
