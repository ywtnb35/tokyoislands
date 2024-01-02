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
    
    <div class="photo-container">
            <div class="island-detail">
                @isset($photos)
                    @foreach($photos as $photo)
                    
                    <div class="photo-item">
                        <a href="{{ route('photo.show',['id'=>$photo->id]) }}" ><img src="{{ secure_asset('storage/img/' . $photo->island_image) }}" alt=""></a>
                    <div class="like-button">
                        @if ($photo->is_liked_by_auth_user() == 1) 
                            <button class="liked like" data-photo-id="{{ $photo->id }}">いいね</button>
                        @else 
                            <button class="like" data-photo-id="{{ $photo->id }}">いいね</button>
                        @endif
                            <span id="like-count-{{ $photo->id }}">{{ $photo->likes()->count() }}件</span>
                    </div> 
                    </div>
                    @endforeach
                @endisset
            </div>
        </div>

</div>
@endsection