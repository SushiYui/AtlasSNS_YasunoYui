@extends('layouts.login')

@section('content')

<div class="followList">
    <p>相手のprofile表示</p>
    <img src="{{ asset('storage/images/' . $user->images) }}" class= "photo-size">
    <p>{{ $user->username }}</p>
    <p>{{ $user->bio }}</p>
</div>

<!-- フォローボタンの作成 -->
<!-- ⇒もしログインユーザーがフォロー中なら、フォロー解除ボタンを表示する。（フォロー前ならフォローするボタンを表示する。） -->
@if(auth()->user()->isFollowing($user->id))
   {!! Form::open(['url' => '/users/unfollow' , 'method' => 'POST']) !!}
   {!! Form::hidden('id', $user->id) !!}
   {!! Form::hidden('redirect_to', url()->current()) !!}
   {!! Form::submit('フォロー解除')!!}
@else
   {!! Form::open(['url' =>'/users/follow' , 'method' => 'POST']) !!}
   {!! Form::hidden('id', $user->id) !!}
   {!! Form::hidden('redirect_to' , url()->current()) !!}
   {!! Form::submit('フォローする') !!}
@endif
   {!! Form::close() !!}


@endsection