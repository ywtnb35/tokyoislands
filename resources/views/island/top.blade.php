@extends('layouts.app')


@section('title', '島個別ページ')

@section('content')
<body>
    <div class="main">
        <section>
        <div class="container">
            <div class="section">
                <div class="col-img">
                    <img src="{{ asset('storage/大島.jpg') }}">
                </div>
            </div>
        </div>
        </section>
    
        <section>
            <div class="btn-top">
                <div class="col-md-8 mx-auto">
                <a href="http://www.izu-oshima.or.jp/">公式サイトはこちら</a>
            </div>
        </section>
    
        <section>
            <div class="button">
                <div class="btn-genre-scenery">
                    <input type="button" value="風景">
                </div>
                <div class="btn-genre-food">
                    <input type="button" value="食べ物">
                </div>
                <div>
                    <div class="btn-genre-flora">
                        <input type="button" value="動植物">
                </div>
            </div>
        </section>
    
        <section>
            <img src="">
        </section>
    </div>
</body>
@endsection