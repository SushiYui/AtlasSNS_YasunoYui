@extends('layouts.login')

@section('content')

<div class="search-box">
{!! Form::open(['url' => '/users/search', 'method' => 'GET']) !!}
   {!! Form::text('keyword', null, ['placeholder' => 'ユーザー名']) !!}
   {!! Form::image(asset('images/search.png'), 'submit', ['class' => 'search-submit']) !!}
   {!! Form::close() !!}

<p>{{ $keyword }}</p>

</div>

<div class="search-list">
@foreach ($users as $user)
    <div class="search-user">
    <img src="{{ asset('storage/images/' . $user->images) }}" class= "photo-size">
    <p>{{ $user->username }}</p>


   @if(auth()->user()->isFollowing($user->id))
     {!! Form::open(['url' => '/users/unfollow', 'method' => 'POST']) !!}
     {!! Form::hidden('id', $user->id) !!}
     {!! Form::hidden('redirect_to' , url()->current()) !!}
     <div class="search-btn">
     {!! Form::submit('フォロー解除') !!}
     </div>
   @else
     {!! Form::open(['url' => '/users/follow', 'method' => 'POST']) !!}
     {!! Form::hidden('id', $user->id) !!}
     {!! Form::hidden('redirect_to' , url()->current()) !!}
     <div class="search-btn">
     {!! Form::submit('フォローする') !!}
    </div>
    @endif
     {!! Form::close() !!}
    </div>

@endforeach
</div>

     @endsection
