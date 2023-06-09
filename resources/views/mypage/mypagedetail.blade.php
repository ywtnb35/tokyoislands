@extends('layouts.app')


@section('title', 'マイページ詳細')

@section('content')

<div id="detail">
    <div class="username">
        <p>{{ $user_name }}</p>
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
    </div>
    <div>
        <a href="{{ route('photo.delete',['id' => $photo->id]) }}">削除</a>
    </div>
</div>
@endsection