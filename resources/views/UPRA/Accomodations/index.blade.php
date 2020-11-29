{{-- // List of all accomodations of the UPRA --}}
@extends('UPRA.layouts.app')
@section('title')
    Admin Accomodations
@endsection
@section('main_content')
{{-- section list --}}
<section class="section_list">
    {{-- elm responsive list  --}}
    <div class="elm_responsive_list">
        @for ($i = 0; $i < 11; $i++)
            {{-- elm search list  --}}
            <div class="elm_search_list">
                {{-- img elm search  --}}
                <div class="img_elm_list"></div>
                {{-- title elm list  --}}
                <div class="title_elm_list">
                    {{-- title elm list higher  --}}
                    <div class="title_elm_list_higher">
                        {{-- title elm list  --}}
                        <div class="row_title_elm_list">
                            {{-- title elm list  --}}
                            <h3 class="title_elm_list">Accomodation</h3>
                            <h5 class="sponsor_elm_list">Sponsorized</h5>
                        </div>
                        {{-- visible elm list  --}}
                        <h5 class="visible_elm_list">Visible</h5>
                        <p class="text_elm_list">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus fugiat eveniet...<a href="#">Read more</a></p>
                        {{-- service elm list  --}}
                        <div class="service_elm_list">
                            {{-- info elm list  --}}
                            <small class="info_elm_list">3 <i class="fas fa-toilet"></i></small>
                            <small class="info_elm_list">5 <i class="fas fa-bed"></i></small>
                            <small class="info_elm_list"><i class="fas fa-wifi"></i></small>
                        </div>
                    </div>
                    {{-- text elm list list lower  --}}
                    <div class="text_elm_list_lower">
                        {{-- price elm list  --}}
                        <h4 class="price_elm_list">Price</h4>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</section>
@endsection

