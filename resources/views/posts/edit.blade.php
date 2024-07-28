@extends('layouts.login')

@section('content')
<h2>編集機能の実装</h2>

<!-- 主に既存のリソースを編集するためのフォームに使用され、フォームフィールドにモデルの属性値を自動的に設定 -->
<!-- 特定のモデルインスタンスをフォームにバインド(=結合) -->
<!-- 'method' => 'PUT'はリソースの更新操作（上書き保存）を示す -->
{!! Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'POST']) !!}
@method('PUT')
{!! Form::textarea('content', $post->post , ['rows' => 10, 'cols' => 50]) !!}
{!! Form::submit('更新',['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}


@endsection