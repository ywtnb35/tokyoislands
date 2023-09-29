@extends('layouts.app')


@section('title', 'プロフィール画像設定')

@section('content')
<script src="{{ asset('public/js/change.js') }}"></script>

<div class="profile">
        <p>プロフィール画像を設定</p>
        <br>
        
    </div>
    <hr>
    <div class="profile_img">
        @isset($user)
        <form action="{{ route('mypage.upload') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if($user->profile_img == null)
                <img class="profile_img" src="{{ asset('storage/img/default.jpeg') }}" id="profile_img">
            @else
                <img class="profile_img" src="{{ asset('storage/img/'.$user->profile_img) }}" id="profile_img">
            @endif
            <input type="file" name="profile_img" id="input_pi">
        <br>
        <button type="submit">写真を設定</button>
        <br>
        
    </div>
    
    <div>
        <a href="{{ route('mypage.delete') }}">削除</a>
    </div>
    </form>
    </div>
    @endisset
</div>
@endsection