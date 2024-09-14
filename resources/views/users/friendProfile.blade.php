@extends('layouts.login')

@section('content')

<div class="followList">
    @if($user->images !== 'icon1.png')
    <img src="{{ asset('storage/images/' . $user->images) }}" class="photo-size">
    @else
    <img src="{{ asset('images/icon1.png') }}" class="photo-size">
    @endif
<div class="friend-content">
<div class="friend-box">
    <p>ユーザー名</p>
    <p class="friend-text">{{ $user->username }}</p>
</div>
<div class="friend-box">
    <p>自己紹介</p>
    <p class="friend-text">{{ $user->bio }}</p>
</div>
</div>


<!-- フォローボタンの作成 -->
<!-- ⇒もしログインユーザーがフォロー中なら、フォロー解除ボタンを表示する。（フォロー前ならフォローするボタンを表示する。） -->
<div class="friend-follow">
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
</div>

</div>


@foreach($posts as $post)
<div class="post-list">
    <div class="post-content">
        <div class="post-img">
            @if( $post->user->images !== 'icon1.png')
            <img src="{{ asset('storage/images/' . $post->user->images) }}" class="photo-size">
            @else
            <img src="{{ asset('images/icon1.png') }}" class="photo-size">
            @endif
        </div>
        <div class="post-box">
        <p class="username">{{ $post->user->username }}</p>
        <p class="post-time">{{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d H:i') }}</p>
        <p class="post">{{ $post->post }}</p>
        </div>
    </div>
</div>
@endforeach

@endsection
