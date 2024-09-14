@extends('layouts.login')

@section('content')

<div class="followList">
    <h1 class="followTitle">フォロワーリスト</h1>

    <div class="followUser">
        @foreach($followedList as $followed)
        @if(auth()->user()->id !== $followed->id)
        <a href="{{  url('/users/' . $followed->id . '/friendProfile') }}" id="{{ $followed->id }}">
            @if( $followed->images !== 'icon1.png')
            <img src="{{ asset('storage/images/' . $followed->images) }}" class="photo-size">
            @else
            <img src="{{ asset('images/icon1.png') }}" class="photo-size">
            @endif
            </a>
        @endif
        @endforeach
    </div>
</div>


@foreach($posts as $post)
@if(auth()->user()->id !== $post->user->id)
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
@endif
@endforeach

@endsection
