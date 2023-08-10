@extends('layouts.app')


@section('title', '検索')

@section('content')

<div class="search">
    <form action="{{ route('photo.search') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="selection">
            <h3>検索</h3>
             <div class="shima_name">
                <label>島</label>
                <br>
                <select name="island_name">
                <option value="">すべての島</option>
                <option value="大島">大島</option>
                <option value="利島">利島</option>
                <option value="新島">新島</option>
                <option value="式根島">式根島</option>
                <option value="神津島">神津島</option>
                <option value="三宅島">三宅島</option>
                <option value="御蔵島">御蔵島</option>
                <option value="八丈島">八丈島</option>
                <option value="青ヶ島">青ヶ島</option>
          </select>
          
          
          <div class="genre_name">
        <label>ジャンル</label>
        <br>
          <select name="genre">
            <option value="">すべてのジャンル</option>
            <option value="風景">風景</option>
            <option value="食べ物">食べ物</option>
            <option value="動植物">動植物</option>
          </select>
      </div>
    </div>
      </div>
      </div>
      
      <button type="submit">検索</button>
      
</div>
    

@endsection