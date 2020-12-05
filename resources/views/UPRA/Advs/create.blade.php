{{-- // Create a submit form advertising for the UPRA --}}
@extends('UPRA.layouts.app')
@section('title')
    create advertisment
@endsection
@section('main_content')
{{-- form background  --}}
<div class="form_background">
    {{-- form wrapper  --}}
    <div class="form_wrapper">
        {{-- form text  --}}
        <div class="form_text">
          <h1>Make an advertisment for : {{$accomodation->title}}</h1>
        </div>
   <form action="{{route('admin.accomodations.adv_store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        {{-- id input --}}
        <div class="form_group">
            <input type="hidden" class="form_input" id="user_id" name="user_id" required>
          </div>
        {{-- city input  --}}
        <div class="form_group">
            <label for="credit card">Credit Card</label>
            <input type="number" class="form_input" id="credit card" name="credit card" required min="14" maxlength="16" placeholder="Insert the credit card number" value="{{old("credit card")}}">
        </div>
        {{-- square meters input  --}}
        <div class="form_group">
            <label for="cvc">Cvc</label>
            <input type="number" class="form_input" id="cvc" name="cvc" required min="3" max="3" placeholder="Cvc" value="{{old("cvc")}}">
        </div>

        <div class="form_group">
            <label for="advertisment">advertisment typology</label>
            {{-- selecting type informations  --}}
            <select class="form_type" name="checklist" id="advertisment">
                <option value="accomodation">&euro; 2.99 Bronze</option>
                <option value="room">&euro; 5.99 Silver</option>
                <option value="mansion">&euro; 9.99 Gold</option>
            </select>
          </div>
          {{-- form button  --}}
        <button type="submit" class="form_btn">Pay</button>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
</div>
@endsection
