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
                <a href="https://www.toshimamura.org/" alt="toshima"></a>
                <a href="https://niijima-info.jp/" alt="niijima"></a>
                <a href="https://shikinejima.tokyo/" alt="shikinejima"></a>
                <a href="https://kozushima.com/" alt="kozu"></a>
                <a href="https://www.miyakejima.gr.jp/#" alt="miyake"></a>
                <a href="https://mikura-isle.com/" alt="mikura"></a>
                <a href="https://www.hachijo.gr.jp/" alt="hachijo"></a>
                <a href="https://www.vill.aogashima.tokyo.jp/top.html" alt="aogashima"></a>
               </div>
        </div>
        
        <br>
        <br>
        
        <div class="genre_btn">
            <a href="/island/top?name={{ $island_name }}&genre=風景" class="genre_btn_l">風景</a>
            <a href="/island/top?name={{ $island_name }}&genre=食べ物" class="genre_btn_l">食べ物</a>
            <a href="/island/top?name={{ $island_name }}&genre=動植物" class="genre_btn_l">動植物</a>

        </div>
        
        <div class="float_clr"></div>
        
        <div class="photo-container">
            <div class="island-detail">
                @isset($photos)
                    @foreach($photos as $photo)
                    <div class="photo-item">
                        <a href="{{ route('photo.show',['id'=>$photo->id]) }}" ><img src="{{ secure_asset('storage/img/' . $photo->island_image) }}" alt=""></a>
                    </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>
</body>
@endsection