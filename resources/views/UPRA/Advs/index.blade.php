{{-- // List of all advertising of the UPRA --}}
@extends('UPRA.layouts.app')
@section('title')
    Advertising index
@endsection
@section('main_content')
    <section class="index_background">
        <div class="index_wrapper">
            <div class="adv_property_item">
                <span>Advertising price</span>
                <span>accomodation name</span>
                <span>starting date</span>
                <span>ending date</span>
            </div>
            @foreach ($advs as $adv)
                <div class="adv_property_item">
                    <span>{{$adv['price']}} &euro;</span>
                    <span>{{$adv['accomodation']->title}}</span>
                    <span>{{$adv['start_adv']}}</span>
                    <span>{{$adv['end_adv']}}</span>
                </div>
            @endforeach
            <div class="total_paid">
                <span>Sub Total: {{$total_paid}} &euro;</span>
            </div>
        </div>
    </section>
@endsection