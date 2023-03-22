@extends('layouts.app')


@section('title', '伊豆諸島一覧')

@section('content')
    <div id="islands-list">
            <div class="col-md-8 mx-auto">
                <h2>伊豆諸島一覧</h2>
            </div>
            <div class="photolist">
                <div class="oshima">
                    <img src="{{ asset('storage/大島.jpg') }}">
                </div>
                <div class="toshima">
                    <img src=" {{ asset('storage/利島.jpg') }}" alt="toshima">
                </div>
                <div class="niijima">
                    <img src="{{ asset('storage/新島.jpg') }}"alt="niijima">
                </div>
                <div class="shikinejima">
                    <img src=" {{ asset('storege/式根島.jpg') }}" alt="shikinejima">
                </div>
                <div class="kouzushima">
                    <img src=" {{ asset('storage/神津島.jpg') }}" alt="kouzushima">
                </div>
                <div class="miyakejima">
                    <img src=" {{ asset('storage/三宅島.jpg') }}" alt="miyakejima">
                </div>
                  <div class="mikurashima">
                    <img src=" {{ asset('storage/御蔵島.jpg') }}" alt="mikurashima">
                </div>
                <div class="hachijojima">
                    <img src=" {{ asset('storage/八丈.jpg') }}" alt="hachijyojima">
                </div>
                 <div class="aogashima">
                    <img src=" {{ asset('storage/青ヶ島.jpg') }}" alt="aogashima">
                </div>
            </div>
        </div>
    </div>
@endsection