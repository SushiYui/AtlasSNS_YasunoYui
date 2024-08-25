@extends('layouts.logout')

@section('content')

<div class="login-form">

<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/login']) !!}

<p class="welcome">AtlasSNSへようこそ</p>

<div class="login-title">
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
</div>

<div class="login-title">
{{ Form::label('パスワード') }}
{{ Form::password('password',['class' => 'input']) }}
</div>

<div class="btn-container">
{{ Form::submit('ログイン'),['class' => 'btn']}}
</div>

<div class="register-btn">
<p><a href="/register" class="text">新規ユーザーの方はこちら</a></p>
</div>

{!! Form::close() !!}

</div>

@endsection
