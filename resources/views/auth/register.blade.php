@extends('layouts.logout')

@section('content')

<div class="login-form">

<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register', 'method' => 'post']) !!}

<h2 class="welcome">新規ユーザー登録</h2>

<div class="login-title">
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input',
'maxlength' => "12", 'required' => true, 'minlength' =>"2"]) }}
</div>

<div class="login-title">
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input',
'required' => true, 'minlength' => 5,'maxlength' => 40,
'pattern' => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$',
'title' =>'正しいメールアドレスを入力してください']) }}
</div>

<div class="login-title">
{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input',
'required' => true, 'minlength' => 8, 'maxlength' => 20,
'pattern' => '[a-zA-Z0-9]+', 'title' =>'8文字以上20文字以内の英数字を入力してください']) }}
</div>

<div class="login-title">
{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input',
'required' => true, 'minlength' => 8, 'maxlength' => 20,
'pattern' => '[a-zA-Z0-9]+', 'title' =>'8文字以上20文字以内の英数字を入力してください'
]) }}
</div>

<div class="btn-container">
{{ Form::submit('登録') }}
</div>

<div class="register-btn">
<p><a href="/login" class="text">ログイン画面へ戻る</a></p>
</div>

{!! Form::close() !!}

</div>


@endsection
