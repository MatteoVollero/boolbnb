{{-- // Searching accomodations page for the UI --}}
@extends('UI.layouts.app')
@section('title')
    Accomodations
@endsection
@section('main_content')
    <section class="section-search">
        <div class="elm-responsive-search">
            @for ($i = 0; $i < 10; $i++)
            <div class="elm-search-list">
                <div class="img-elm-search"></div>
                <div class="testo-elm-search">
                    <div class="testo-elm-search-superiore">
                        <h3 class="title-elm-search">Appartamento</h3>
                        <p class="text-elm-search">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus fugiat eveniet...<a href="#">Read more</a></p>
                        <div class="service-elm-searc">
                            <small class="info-elm-search">3 <i class="fas fa-toilet"></i></small>
                            <small class="info-elm-search">5 <i class="fas fa-bed"></i></small>
                            <small class="info-elm-search"><i class="fas fa-wifi"></i></small>
                        </div>
                    </div>
                    <div class="testo-elm-search-inferiore">
                        <h4 class="price-elm-search">Price</h4>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </section>
@endsection