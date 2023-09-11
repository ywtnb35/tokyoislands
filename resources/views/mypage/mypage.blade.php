@extends('layouts.app')


@section('title', 'マイページ')

@section('content')

<div class="page">
    <div class="text_username">
        <p><a href="{{ route('mypage.change',['user_id'=>$user_id]) }}">{{ $user_name }}</a></p>
        <br>
        
    </div>
 
    <hr>
    <div class="photolist">
    @isset($photos)
        @foreach($photos as $photo)
            <div class="photo-item">
                <a href="{{ route('mypage.detail',['id'=>$photo->id]) }}" ><img src="{{ secure_asset('storage/img/' . $photo->island_image) }}" alt=""></a>
                <p class="text_size" style="white-space:pre-wrap;">{{ $photo->text }}</p>
            </div>
        @endforeach
    @endisset
    </div>
</div>
@endsection