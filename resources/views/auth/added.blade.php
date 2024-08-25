@extends('layouts.logout')

@section('content')

<div class="login-form">
  <p class="welcome">{{$username}}さん</p>
  <p class="welcome">ようこそ！AtlasSNSへ！</p>

  <div class="welcome-box">
  <p class="welcome-text">ユーザー登録が完了しました。</p>
  <p class="welcome-text">早速ログインをしてみましょう。</p>
  </div>

  <div class="register-btn">
    <p><a href="/login" class="btn">ログイン画面へ</a></p>
  </div>

</div>


@endsection
