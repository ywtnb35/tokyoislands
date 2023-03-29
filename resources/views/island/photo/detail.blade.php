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
                <img src="">投稿写真表示<br>
            </div>
        </div>

    <div class="text">
        <textarea rows="10" cols="80">コメント</textarea>
    </div>
 
</div>
@endsection