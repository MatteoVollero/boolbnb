{{-- // List of all accomodations of the UPRA --}}
@extends('UPRA.layouts.app')
@section('title')
    Accomodations
@endsection

@section('main_content')
<section class="section-list">
    <div class="elm-responsive-list">
        @for ($i = 0; $i < 11; $i++)
        <div class="elm-list-list">
            <div class="img-elm-list"></div>
            <div class="testo-elm-list">
                <div class="testo-elm-list-superiore">
                    <div class="row-title-elm-list">
                        <h3 class="title-elm-list">Appartamento</h3>
                        <h5 class="sponsor-elm-list">Sponsorized</h5>
                    </div>
                    <h5 class="visible-elm-list">Visible</h5>
                    <p class="text-elm-list">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus fugiat eveniet...<a href="#">Read more</a></p>
                    <div class="service-elm-searc">
                        <small class="info-elm-list">3 <i class="fas fa-toilet"></i></small>
                        <small class="info-elm-list">5 <i class="fas fa-bed"></i></small>
                        <small class="info-elm-list"><i class="fas fa-wifi"></i></small>
                    </div>
                </div>
                <div class="testo-elm-list-inferiore">
                    <h4 class="price-elm-list">Price</h4>
                </div>
            </div>
        </div>
        @endfor
    </div>
</section>
@endsection