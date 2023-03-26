@extends('layouts.app')


@section('title', '島個別ページ')

@section('content')
<body>
    <div class="main">
        <section>
        <div class="container">
            <div class="col-img">
                <img src="{{ asset('storage/大島.jpg') }}">
            </div>
        </div>
        </section>
    
        <section>
            <div class="col-md-8 mx-auto">
                <div class="island-link">
                    <a href="http://www.izu-oshima.or.jp/" class="button">公式サイトはこちら</a>
                </div>
            </div>
        </section>
    
        <section>
            <div class="genre-container">
                <div class="genre">
                    <input type="button" value="風景">
                    <input type="button" value="食べ物">
                    <input type="button" value="動植物">
                </div>
            </div>
        </section>
    
        <section>
            <div class="photo-container"></div>
                <div class="island-detail">
                    <img src="">
                </div>
            </div>
        </section>
    </div>
</body>
@endsection