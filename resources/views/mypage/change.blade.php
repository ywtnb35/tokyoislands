@extends('layouts.app')


@section('title', 'プロフィール画像設定')

@section('content')

<div class="profile">
        <p>プロフィール画像を設定</p>
        <br>
        
    </div>
    <hr>
    
    @isset($user)
    <form action="{{ route('mypage.upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <img src="{{ asset('storage/img/'.$user->profile_img) }}">
        
        <input type="file" name="profile_img">
        <br>
        <button type="submit">写真を設定</button>
        <br>
        <div>
            <a href="{{ route('mypage.delete') }}">削除</a>
        </div>
        </be>
    </form>
    </div>
    @endisset
</div>
@endsection