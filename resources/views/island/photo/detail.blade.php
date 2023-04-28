@extends('layouts.app')


@section('title', '写真詳細')

@section('content')
<div id="detail">
    <div class="username">
        <h2>ユーザー名</h2>
    </div>
    
    <br>
    
    
    <div class="img_container">
            <div class="img_detail">
                <img src="{{ secure_asset('storage/img/' .$photo->island_image) }}">
            </div>
        </div>
    <br>
    <div class="text">
        <label>＜コメント＞</label>
        <p class="txt_size">{{ $photo->text }}</p>
    </div>
 
</div>
@endsection