@extends('layouts.app')


@section('title', '伊豆諸島一覧')

@section('content')
    <div id="islands-list">
            <div class="col-md-8 mx-auto">
                <h2>伊豆諸島一覧</h2>
            </div>
            <div class="photolist">
                <div class="oshima">
                    <img src=" {{ asset('') }}" alt="oshima">
                </div>
                <div class="toshima">
                    <img src=" {{ asset('') }}" alt="toshima">
                </div>
                <div class="niijima">
                    <img src=" {{ asset('') }}" alt="niijima">
                </div>
                <div class="shikinejima">
                    <img src=" {{ asset('') }}" alt="shikinejima">
                </div>
                <div class="kouzushima">
                    <img src=" {{ asset('') }}" alt="kouzushima">
                </div>
                <div class="miyakejima">
                    <img src=" {{ asset('') }}" alt="miyakejima">
                </div>
                  <div class="mikurashima">
                    <img src=" {{ asset('') }}" alt="mikurashima">
                </div>
                <div class="hachijojima">
                    <img src=" {{ asset('') }}" alt="hachijyojima">
                </div>
                 <div class="aogashima">
                    <img src=" {{ asset('') }}" alt="aogashima">
                </div>
            </div>
        </div>
    </div>
@endsection