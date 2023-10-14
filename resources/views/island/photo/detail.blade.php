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
        <div class="comment_ref">
            <div style="display: inline-block; background: #b0c4de; padding: 3px 10px; color: #000000;"><strong>＊コメント＊</strong></div>
            <div style="padding: 100px; border: 2px solid #b0c4de;"></div>
        </div>
        <br>
        <br>
        <form method="post" action="sample.cgi">
        <textarea name="comment" rows="4" cols="80">コメント入力</textarea><br>
        <input type="submit" value="コメント投稿">
        </form>
    </div>
<br>
</div>
@endsection