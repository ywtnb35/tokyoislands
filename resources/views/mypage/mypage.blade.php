@extends('layouts.app')


@section('title', 'マイページ')

@section('content')

<div class="page">
    <div class="text_username">
        <p>{{ $user_id }}</p>
        <br>
    </div>
    <hr>
    <div class="photolist">
    @foreach ($photos as $photo)
    <img src="{{ asset('public/storage/img' . $photo->island_img) }}" alt="">
    @endforeach
    </div>
</div>
@endsection