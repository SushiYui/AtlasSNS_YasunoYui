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

<div class="tweet-list">
    @foreach($posts as $post)
    <ul>
        <li><img src="{{ asset('storage/images/' . $post->user->images) }}" class= "photo-size"></li>
        <li>{{ $post->user->username }}</li>
        <li>{{ $post->post }}</li>
    </ul>
    @endforeach
</div>

@endsection