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
                <img src="{{ secure_asset('storage/img/' . $photo->island_image) }}" alt="">
                    <p class="explanation">{{ $photo->text }}</p>
            </div>
            <div>
                <a href="{{ route('photo.delete', ['id' => $photo->id]) }}">削除</a>
            </div>
        @endforeach
    @endisset
    </div>
</div>
@endsection