@extends('layouts.login')

@section('content')

<div class="search-box">
{!! Form::open(['url' => '/users/search', 'method' => 'GET']) !!}
   {!! Form::text('keyword', null, ['placeholder' => 'ユーザー名']) !!}
   {!! Form::image(asset('images/search.png'), 'submit', ['class' => 'search-submit']) !!}
   {!! Form::close() !!}

   {{-- $keywordが空ではない時に表示させるようにする。 --}}
@if(!empty($keyword))
<p>検索ワード：{{ $keyword }}</p>
@endif

</div>

<div class="search-list">
@foreach ($users as $user)
{{-- ログインユーザー以外のユーザーを一覧表示したい --}}
@if(auth()->user()->id !== $user->id)
    <div class="search-user">
        @if( $user->images !== 'icon1.png')
        <img src="{{ asset('storage/images/' . $user->images) }}" class="photo-size">
        @else
        <img src="{{ asset('images/icon1.png') }}" class="photo-size">
        @endif
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

@endif
@endforeach
</div>

     @endsection
