@extends('layouts.app')


@section('title', '写真詳細')

@section('content')
<div id="detail">
    <section>
        <div class="username">
            <h2>ユーザー名</h2>
        </div>
    </section>
    <section>
        <div class="select">
            <ul>
                <li>島名</li>
                <li>ジャンル</li>
            </ul>
        </div>
    </section>
    
    <section>
        <div class="imgcontainer">
            <div class="imgdetail">
                <img src="">投稿写真表示<br>
            </div>
        </div>
    </section>
    
    <section>
        <div class="text">
            <textarea rows="10" cols="80">コメント</textarea>
        </div>
    </section>
</div>
@endsection