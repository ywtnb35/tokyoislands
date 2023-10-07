@extends('layouts.app')


@section('title', 'マイページ')

@section('content')

<div class="page">
    
    <div class="text_username">
        <div class="img_p">
            <div class="profile_img">
                @isset($user)
                    @if($user->profile_img == null)
                        <img src="{{ asset('storage/img/default.jpeg') }}">
                    @else
                        <img src="{{ asset('storage/img/'.$user->profile_img) }}">
                    @endif
                @endisset
            </div>
        <p><a href="{{ route('mypage.change',['user_id'=>$user_id]) }}">{{ $user_name }}</a></p>
        <br>
        </div>  
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