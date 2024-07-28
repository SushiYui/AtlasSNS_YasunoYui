@extends('layouts.login')

@section('content')


{!! Form::open(['url' => '/users/search', 'method' => 'GET']) !!}
   {!! Form::text('keyword', null, ['placeholder' => 'ユーザー名']) !!}
   {!! Form::submit('検索') !!}
{!! Form::close() !!}

<p>{{ $keyword }}</p>

@foreach ($users as $user)
     <li>{{ $user->username }}</li>
     
   @if(auth()->user()->isFollowing($user->id))
     {!! Form::open(['url' => '/users/unfollow', 'method' => 'POST']) !!}
     {!! Form::hidden('id', $user->id) !!}
     {!! Form::hidden('redirect_to' , url()->current()) !!}
     {!! Form::submit('フォロー解除') !!}
   @else
     {!! Form::open(['url' => '/users/follow', 'method' => 'POST']) !!}
     {!! Form::hidden('id', $user->id) !!}
     {!! Form::hidden('redirect_to' , url()->current()) !!}
     {!! Form::submit('フォローする') !!}
   @endif
     {!! Form::close() !!}
@endforeach
     @endsection
