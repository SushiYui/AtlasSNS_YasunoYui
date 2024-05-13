@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/search', 'method' => 'GET']) !!}
   {!! Form::text('query', null, ['placeholder' => 'ユーザー名']) !!}
   {!! Form::submit('検索') !!}
{!! Form::close() !!}

<!-- <form action="/search" method="GET">
     <input type="text" name="query" placeholder="検索...">
    <button type="submit">検索</button>
 </form> -->

@endsection