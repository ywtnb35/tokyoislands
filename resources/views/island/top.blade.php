@extends('layouts.app')


@section('title', '島個別ページ')

@section('content')
    <section>
    <div class="container">
        <div class="section">
            <div class="col-img">
                <img src="shima">大島
            </div>
        </div>
    </div>
    </section>
    
    <section>
        <div class="btn-top">
            <div class="col-md-8 mx-auto">
            <input type="button" value="公式サイトはこちら">
        </div>
    </section>
    <section>
        <div class="btn-genre-scenery">
           <input type="button" value="風景">
        </div>
        <div class="btn-genre-food">
            <input type="button" value="食べ物">
        </div>
        <div>
             <div class="btn-genre-flora">
            <input type="button" value="動植物">
        </div>
    </section>
    
    <section>
        <img src="">
    </section>
@endsection