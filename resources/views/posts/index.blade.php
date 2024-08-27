@extends('layouts.login')

@section('content')
<div class="new-post">
<!-- Form::openは、新しいフォームを開始し、URLやメソッドなどの基本的な設定を行う。 -->
<img src="{{ asset('storage/images/' . Auth::user()->images) }}" class= "photo-size">
{!! Form::open(['url' => '/index' , 'method' => 'POST' , 'class' => 'tweet'])!!}
{!! Form::textarea('content', null, ['placeholder' => '投稿内容を入力してください' , 'maxlength'=>"200"]) !!}
{!! Form::image(asset('images/post.png'), 'submit', ['class' => 'image-submit']) !!}
{!! Form::close() !!}
</div>


    @foreach ($results as $result)
    <div class="post-list">

    <div class="post-content">
       <div class="post-img"><img src="{{ asset('storage/images/' . $result->images) }}" class= "photo-size"></div>
       <div class="post-box">
       <p class="username">{{ $result->username }}</p>
       <p class="post-time">{{ \Carbon\Carbon::parse($result->created_at)->format('Y-m-d H:i') }}</p>
       <p class="post">{{ $result->post }}</p>
       </div>
    </div>

    <!-- 自分の投稿のみ表示されるように制限をかける -->
    @if(Auth::user()->id === $result->user_id)
    <div class="post-btn">
    <!-- 編集ボタン -->
       <a data-id ="{{ $result->id }}" data-content="{{ $result->post }}" class="edit-btn">
       <img src="{{ asset('images/edit.png') }}" alt="edit Icon" class="hover-image">
       </a>
    <!-- 削除ボタン -->
       <a href="/post/{$post->id}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか。')"><img src="{{ asset('images/trash.png') }}" alt="trash Icon" class="btn_delete"></a>
    </div>

    @endif
    </div>

    @endforeach


<div id="edit-modal">
    <div class="modal-content">
        {!! Form::open(['id'=>'edit-form' , 'method'=>'POST' ]) !!}
        @csrf
        {{-- 投稿の更新（編集）を示す --}}
        @method('PUT')
        {!! Form::textarea('content', null, ['rows' => 10, 'cols' => 50, 'id'=>'content'] ) !!}
        {!! Form::submit('保存') !!}
        {!! Form::submit('キャンセル') !!}
        {!! Form::close() !!}
    </div>
</div>

@endsection

