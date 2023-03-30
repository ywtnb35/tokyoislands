@extends('layouts.app')


@section('title', '伊豆諸島一覧')

@section('content')
        <div class="islands-list">
            <div class="col-md-8 mx-auto">
                <h2>伊豆諸島一覧</h2>
            </div>
            <section class="island-menu">
                <div class="w-container">
                    <div class="island-container">
                        <div class="island">
                            <p>大島</p>
                            <a href="" class="island-link"><img src="{{ asset('storage/大島.jpg') }}" alt="oshima"></a>
                        </div>
                        <div class="island">
                            <p>利島</p>
                            <a href= class="island-link"><img src=" {{ asset('storage/利島.jpg') }}" alt="toshima"></a>
                        </div>
                        <div class="island">
                            <p>新島</p>
                            <a href="" class="island-link"><img src="{{ asset('storage/新島.jpg') }}"alt="niijima"></a>
                        </div>
                        <div class="island">
                            <p>式根島</p>
                            <a href="" class="island-link"><img src=" {{ asset('storage/式根島.jpg') }}" alt="shikinejima"></a>
                        </div>
                        <div class="island">
                            <P>神津島</P>
                            <a href="" class="island-link"><img src=" {{ asset('storage/神津島.jpg') }}" alt="kouzushima"></a>
                        </div>
                        <div class="island">
                            <p>三宅島</p>
                            <a href="" class="island-link"><img src=" {{ asset('storage/三宅島.jpg') }}" alt="miyakejima"></a>
                        </div>
                          <div class="island">
                              <P>御蔵島</P>
                            <a href="" class="island-link"><img src=" {{ asset('storage/御蔵島.jpg') }}" alt="mikurashima"></a>
                        </div>
                        <div class="island">
                            <P>八丈島</P>
                            <a href="" class="island-link"><img src=" {{ asset('storage/八丈.jpg') }}" alt="hachijyojima"></a>
                        </div>
                         <div class="island">
                             <P>青ヶ島</P>
                            <a href="" class="island-link"><img src=" {{ asset('storage/青ヶ島.jpg') }}" alt="aogashima"></a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection