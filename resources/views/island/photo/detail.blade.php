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
            <div class="item">島名</div>
            <div class="item">ジャンル</div>
        </div>
    </section>
    
    <section>
        <div class="imgcontainer">
            <img src="">投稿写真表示<br>
        </div>
    </section>
    
    <section>
        <div class="text">
            <textarea rows="10" cols="80">コメント</textarea>
        </div>
    </section>
</div>
@endsection