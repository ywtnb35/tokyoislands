@extends('layouts.app')


@section('title', '島個別ページ')

@section('content')
<body>
    <div class="main">
        <div class="container">
            <div class="col-img">
                <p>{{ $island_name }}</p>
                <img src="{{ asset('storage/' . $island_img) }}">
            </div>
        </div>
    
        <br>
    
        <div class="col-md-8 mx-auto">
            <div class="island_link">
                <a href="http://www.izu-oshima.or.jp/" class="button">公式サイトはこちら</a>
               </div>
        </div>
        
        <br>
        <br>
        
        <div class="genre_btn">
            <div class="genre_btn_l">風 景</div>
            <div class="genre_btn_l">食べ物</div>
            <div class="genre_btn_l">動植物</div>
        </div>
        
        <div class="float_clr"></div>
        
        <div class="photo-container">
            <div class="island-detail">
                @isset($photos)
                    @foreach($photos as $photo)
                    <div class="photo-item">
                        <img src="{{ secure_asset('storage/img/' . $photo->island_image) }}" alt="">
                        <p>{{ $photo->text }}</p>
                    </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>
</body>
@endsection