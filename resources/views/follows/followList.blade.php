@extends('layouts.login')

@section('content')

<div class="followList">
    <h1 class="followTitle">フォローリスト</h1>

    <div class="followUser">
    @foreach($followingList as $following)
    <a href="{{ url('/users/' . $following->id . '/friendProfile' ) }}" id = "{{$following->id}}" class="icon-list"><img src="{{ asset('storage/images/' . $following->images) }}" class= "photo-size"></a>
    @endforeach
    </div>

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
