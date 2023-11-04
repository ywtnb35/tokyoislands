@extends('layouts.app')


@section('title', '写真詳細')

@section('content')
<div class="page">
    <div class="text_username">
        <div class="img_p">
            <div class="profile_img">
                @isset($user)
                    @if($user->profile_img == null)
                        <img src="{{ asset('storage/img/default.jpeg') }}">
                    @else
                        <img src="{{ asset('storage/img/'.$user->profile_img) }}">
                    @endif
                @endisset
    
                <p>{{ $user_name }}</p>
                <h2><a href="{{ route('mypage.index', ['id' => $photo->user->id,'user_name' => $photo->user->name]) }}">{{ $photo->user->name }}</a></h2>
        <br>
            </div>  
        </div>
    </div>
    
    <div class="shima">{{ $photo->island_name }}</div>
    <div class="janru">{{ $photo->genre }}</div>
    <br>
    
    <div class="img_container">
            <div class="img_detail">
                <img src="{{ secure_asset('storage/img/' .$photo->island_image) }}">
            </div>
        </div>
    <br>
    <div class="text">
        <label>＜コメント＞</label>
        <p class="txt_size" style="white-space:pre-wrap;">{{ $photo->text }}</p>
    </div>
<br>

    <div class="user_comment">
    <div class="comment_list">
        <div class="comment_title"><lavel>＊コメント＊</lavel></div>
        <div class="comment_content"></div>
    </div>
    
    <form method="post" action="{{ route('photo.comment') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="photo_id" value="{{ $photo->id }}">
        <textarea class="comment" name="comment" placeholder="コメントを入力"></textarea>
        <input type="submit" class="submit_button" value="コメント投稿">
    </form>
 
</div>
@endsection