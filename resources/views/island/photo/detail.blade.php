@extends('layouts.app')


@section('title', '写真詳細')

@section('content')
<div id="detail">
    <div class="username">
        <h2>ユーザー名</h2>
    </div>
    
    <br>
    
    <div class="data_container">
        <div class="photo_data">島名</div>
        <div class="photo_data">ジャンル</div>
    </div>
    
    
    <div class="img_container">
            <div class="img_detail">
                <a href="{{ route('photo.show',['id'=>$photo->id]) }}"></a>
                <img src="{{ $photo->img_url}}">
            </div>
        </div>
    <br>
    <div class="text">
        <textarea rows="10" cols="80">コメント</textarea>
        <p>{{ $photo->text }}</p>
    </div>
 
</div>
@endsection