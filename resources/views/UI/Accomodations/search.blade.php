{{-- // Searching accomodations page for the UI --}}
@extends('UI.layouts.app')
@section('title')
    Accomodations research
@endsection
@section('main_content')
{{-- section search  --}}
    <section class="section_search">
        {{-- elm responsive search  --}}
        <div class="elm_responsive_search">
            @for ($i = 0; $i < 10; $i++)
            {{-- elm search list  --}}
            <div class="elm_search_list">
                {{-- img elm search  --}}
                <div class="img_elm_search"></div>
                {{-- title elm search  --}}
                <div class="title_elm_search">
                    {{-- title elm searc higher  --}}
                    <div class="title_elm_search_higher">
                        {{-- title elm search  --}}
                        <h3 class="title-elm-search">Accomodation</h3>
                        {{-- text elm search  --}}
                        <p class="text_elm_search">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus fugiat eveniet...<a href="#">Read more</a></p>
                        {{-- service elm search  --}}
                        <div class="service_elm_search">
                            {{-- info elm search  --}}
                            <small class="info_elm_search">3 <i class="fas fa-toilet"></i></small>
                            <small class="info_elm_search">5 <i class="fas fa-bed"></i></small>
                            <small class="info_elm_search"><i class="fas fa-wifi"></i></small>
                        </div>
                    </div>
                    {{-- text elm search lower  --}}
                    <div class="text_elm_search_lower">
                        {{-- price elm search  --}}
                        <h4 class="price_elm_search">Price</h4>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </section>
@endsection