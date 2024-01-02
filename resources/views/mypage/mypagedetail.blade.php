@extends('layouts.app')


@section('title', 'マイページ詳細')

@section('content')
<div class="page">
    <div id="detail">
        <div class="profile_img">
            @isset($user)
                @if($user->profile_img == null)
                    <img src="{{ asset('storage/img/default.jpeg') }}">
                @else
                    <img src="{{ asset('storage/img/'.$user->profile_img) }}">
                @endif
            @endisset
            <p><a href="{{ route('mypage.index',['user_id'=>$user_id]) }}">{{ $user_name }}</a></p>
        </div>
        <div>島名：{{ $photo->island_name }}</div>
        <div>ジャンル：{{ $photo->genre }}</div>
        <br>
        
        <div class="img_container">
                <div class="img_detail">
                    <img src="{{ secure_asset('storage/img/' .$photo->island_image) }}">
                </div>
            </div>
        <br>
        <div class="text">
            <label>＜コメント＞</label>
            <p class="txt_size"  style="white-space:pre-wrap;">{{ $photo->text }}</p>
            <br>
        </div>
        

    <!--いいね表示-->
    <div class="like-button">
        @if ($photo->is_liked_by_auth_user() == 1) 
            <button class="liked like" data-photo-id="{{ $photo->id }}">いいね</button>
        @else 
            <button class="like" data-photo-id="{{ $photo->id }}">いいね</button>
        @endif
            <span id="like-count-{{ $photo->id }}">{{ $photo->likes()->count() }}件</span>
    </div> 

       
    <div class="user_comment">
        <div class="comment_list">
            <div class="comment_title"><lavel>＊コメント＊</lavel></div>
            <div class="comment_content">
                @foreach($comments as $comment)
                    <div class="photo_detail_profile">
                        <div class="comment_profile">
                            @if($comment->user->profile_img == null)
                                <img src="{{ asset('storage/img/default.jpeg') }}">
                            @else
                                <img src="{{ asset('storage/img/'.$comment->user->profile_img) }}">
                            @endif
                        </div>
                        <div class="comment_text">
                            <div class="userName">
                                <a href=" {{ route('mypage.index',['id'=> $comment->user->id, 'user_name' => $comment->user->name]) }} ">
                                    {{ $comment->user->name }}
                                </a>
                            </div>
                            <div class="comment_ref">{{ $comment->comment }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
    
        </div>
        <div class="photo_del">
            <a href="{{ route('photo.delete',['id' => $photo->id]) }}">投稿削除</a>
        </div>
    </div>
    <br>
    <br>
    <br>
</div>
@endsection