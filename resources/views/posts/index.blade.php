@extends('layouts.login')

@section('content')
<div class="new-post">
<!-- Form::openは、新しいフォームを開始し、URLやメソッドなどの基本的な設定を行う。 -->
@if(Auth::user()->images !== 'icon1.png')
<img src="{{ asset('storage/images/' . Auth::user()->images) }}" class="photo-size">
@else
<img src="{{ asset('images/icon1.png') }}" class="photo-size">
@endif

{!! Form::open(['url' => '/index' , 'method' => 'POST' , 'class' => 'tweet'])!!}
{!! Form::textarea('content', null, ['placeholder' => '投稿内容を入力してください' ,
'required' => true, 'minlength' => "1"]) !!}
{!! Form::image(asset('images/post.png'), 'submit', ['class' => 'image-submit']) !!}
{!! Form::close() !!}


@if($errors->has('content'))
@foreach ($errors->get('content') as $error )
<div class="error-message">{{ $error }}</div>
@endforeach
@endif
</div>



    @foreach ($results as $result)
    <div class="post-list">

    <div class="post-content">
        @if( $result->images !== 'icon1.png')
        <img src="{{ asset('storage/images/' . $result->images) }}" class="photo-size">
        @else
        <img src="{{ asset('images/icon1.png') }}" class="photo-size">
        @endif

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
    <a class="delete-box" href="/post/{{ $result->id }}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"></a>
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
        <div class="edit-box">
        {!! Form::image(asset('images/edit.png'), 'submit', ['class' => 'edit-submit']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection

