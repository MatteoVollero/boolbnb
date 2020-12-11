{{-- // List of all advertising of the UPRA --}}
@extends('UPRA.layouts.app')
@section('title')
    Advertising index
@endsection
@section('main_content')
    <section class="index_background">
        <div class="index_wrapper">
            <div class="adv_property_item">
                <span>advertising</span>
                <span>accomodation name</span>
                <span>price</span>
                <span>starting date</span>
                <span>ending date</span>
                <span class="last_span">Remaining hours</span>
            </div>
            @foreach ($userAccomodation->advs as $accomodation)
            <div class="adv_property_item">
                @dd($accomodation);
                <span>{{$accomodation->label}}</span>
                <span>{{$accomodation->hours}}</span>
                <span>{{$accomodation->start_adv}}</span>
                <span>{{$accomodation->end_adv}}</span>
                <span>{{$accomodation->title}}</span>
                <span>{{$accomodation->price_paid}}</span>
            </div>
            @endforeach
        </div>
    </section>
@endsection