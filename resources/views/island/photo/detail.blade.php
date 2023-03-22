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
            <div class="islandname">島名</div>
            <div class="gnere">ジャンル</div>
        </div>
    </section>
    
    <section>
        <div class="imgcontainer">
            <img src="">
        </div>
    </section>
    
    <section>
        <div class="text">
            <textarea>コメント</textarea>
        </div>
    </section>
</div>
@endsection