@extends('layouts.login')

@section('content')

<div class="followList">
    <h1 class="followTitle">フォローリスト</h1>

    @foreach($followingList as $following)
    <a href="{{ url('/users/' . $following->id . '/friendProfile' ) }}" id = "{{$following->id}}" ><img src="{{ asset('storage/images/' . $following->images) }}" class= "photo-size"></a>
    @endforeach

</div>

<div class="tweet-list">
    <ul>
        @foreach($posts as $post)
        <li><img src="{{ asset('storage/images/' . $post->user->images) }}" class= "photo-size"></li>
        <li>{{ $post->user->username }}</li>
        <li>{{ $post->post }}</li>
        @endforeach

    </ul>
</div>

@endsection
