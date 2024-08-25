@extends('layouts.logout')

@section('content')

<div class="login-form">

<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}

<h2 class="welcome">新規ユーザー登録</h2>

<div class="login-title">
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}
</div>

<div class="login-title">
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
</div>

<div class="login-title">
{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}
</div>

<div class="login-title">
{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,['class' => 'input']) }}
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
