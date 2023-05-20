@extends('layouts.app')


@section('title', 'マイページ')

@section('content')

<div class="page">
    <div class="text_username">
        <p>{{ $user_name }}</p>
        <br>
    </div>
 
    <hr>
    <div class="photolist">
    @isset($photos)
        @foreach($photos as $photo)
            <div class="photo-item">
                <a href="{{ route('mypage.detail',['id'=>$photo->id]) }}" ><img src="{{ secure_asset('storage/img/' . $photo->island_image) }}" alt=""></a>
                <p class="explanation">{{ $photo->text }}</p>
            </div>
        @endforeach
    @endisset
    </div>
</div>
@endsection