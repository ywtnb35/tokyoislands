@extends('layouts.app')


@section('title', '検索結果')

@section('content')
<h3>検索結果</h3>
<P>島名：{{ $island_name }} </P>
<p>ジャンル：{{ $genre }}</p>

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

@endsection