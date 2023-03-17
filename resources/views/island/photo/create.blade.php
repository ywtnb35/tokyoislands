@extends('layouts.app')


@section('title', '新規作成')

@section('content')
<section>
<form action="#" method="post">

  <p>島名<label><br>
    <select name="islands" multiple> 
        <option value="">下記の中から選択してください</option>
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
  </label></p>
</form>
</section>
@endsection
