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
            
            <div class="comment_ref">
                <div style="display: inline-block; background: #b0c4de; padding: 3px 10px; color: #000000;"><strong>＊コメント＊</strong></div>
                <div style="padding: 100px; border: 2px solid #b0c4de;"></div>
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