@extends('layouts.app')


@section('title', '新規作成')

@section('content')
<div class="page">
  <div class="new_post">
    <form action="{{ route('photo.create') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="selection">
        <h3>新規作成</h3>
        <br>
        <br>
        <div class="name">
          <label for="username">ユーザー名</label>
          <input type="text" name="username" value="{{ Auth::user()->name }}" disabled>
        </div> 
        <br>
        <div class="shima_name">
          <label>島</label>
          <br>
            <select name="islands_name"> 
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
        </div>
        
        <div class="genre_name">
          <label>ジャンル</label>
          <br>
            <select name="genre">
              <option value="風景">風景</option>
              <option value="食べ物">食べ物</option>
              <option value="動植物">動植物</option>
            </select>
        </div>
      </div>
      
      <br>
      <br>
      
      <div class="img_post">
        <label for="img">画像</label>
        <input type="file" name="img" id="img" accept="image/*">
      
      <br>
      <br>
      
      <div class="describe">
        <textarea rows="10" cols="80" placeholder="テキスト" name="text"></textarea>
      </div>
      
      <br>
      
      <button type="submit">投稿</button>
    </form>
  </div>
  <br>
  <br>
  <br>
  <br>
</div>
@endsection
