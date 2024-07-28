@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>

<!-- Form::openは、新しいフォームを開始し、URLやメソッドなどの基本的な設定を行う。 -->
{!! Form::open(['url' => '/index' , 'method' => 'POST' , 'class' => 'tweet'])!!}
{!! Form::textarea('content', null, ['placeholder' => '投稿内容を入力してください' , 'rows' => 10, 'cols' => 50]) !!}
{!! Form::image(asset('images/post.png'), 'submit', ['class' => 'image-submit']) !!}
{!! Form::close() !!}

<div class="content">
<img src="{{ asset('images/icon1.png') }}" alt="User Icon">
    <p>{{ Auth::user()->username }}</p>
    <div class="edit_box"></div>
    @foreach ($results as $result)
    <p class="username">{{ $result->username }}</p>
    <p class="post">{{ $result->post }}</p>
    <!-- 自分の投稿のみ表示されるように制限をかける -->
    @if(Auth::user()->id === $result->user_id)
    <!-- 編集ボタン -->
    <a href="{{ route('post.edit', ['post'=> $result->id]) }}"><img src="{{ asset('images/edit.png') }}" alt="edit Icon" class="hover-image"></a>
    <!-- 削除ボタン -->
    <a class="btn_delete" href="/post/{$post->id}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか。')"><img src="{{ asset('images/trash.png') }}" alt="trash Icon" ></a>
    @endif
    @endforeach
</div>

@endsection