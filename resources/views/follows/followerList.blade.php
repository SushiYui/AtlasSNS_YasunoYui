@extends('layouts.login')

@section('content')

<div class="followList">
    <h1 class="followTitle">フォロワーリスト</h1>

    <ul>
        @foreach($followedList as $followed)
        <li><a href="{{  url('/users/' . $followed->id . '/friendProfile') }}" id="{{ $followed->id }}"><img src="{{ asset('storage/images/' . $followed->images) }}" class= "photo-size"></a></li>
        @endforeach
    </ul>
</div>


@foreach($posts as $post)
<div class="post-list">
    <div class="post-content">
        <div class="post-img"><img src="{{ asset('storage/images/' . $post->user->images) }}" class= "photo-size"></div>
        <div class="post-box">
        <p class="username">{{ $post->user->username }}</p>
        <p class="post-time">{{ \Carbon\Carbon::parse($post->created_at)->format('Y-m-d H:i') }}</p>
        <p class="post">{{ $post->post }}</p>
        </div>
    </div>
</div>
@endforeach

@endsection
