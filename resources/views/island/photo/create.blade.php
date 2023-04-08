@extends('layouts.app')


@section('title', '新規作成')

@section('content')
<div class="new_post">
  <form action="#" method="post" enctype="multipart/form-data">
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
              <option value="oshima">大島</option>
              <option value="toshima">利島</option>
              <option value="niijima">新島</option>
              <option value="shikinejima">式根島</option>
              <option value="kouzushima">神津島</option>
              <option value="miyakejima">三宅島</option>
              <option value="mikurashima">御蔵島</option>
              <option value="hachijojima">八丈島</option>
              <option value="aogashima">青ヶ島</option>
          </select>
      </div>
      
      <div class="genre_name">
        <label>ジャンル</label>
        <br>
          <select name="genre">
            <option value="huukei">風景</option>
            <option value="food">食べ物</option>
            <option value="creature">動植物</option>
          </select>
      </div>
      
      <div class="img_kins">
        <label>画像種類</label>
        <br>
          <select name="img_kins">
            <option value="jpg">.jpg</option>
            <option value="png">.png</option>
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
@endsection
