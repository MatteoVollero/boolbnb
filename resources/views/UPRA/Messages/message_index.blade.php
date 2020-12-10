@extends('UPRA.layouts.app')
@section('title')
    Messages
@endsection
@section('main_content')
    <section class="section_messages">
        <div class="wrapper_messages_index">
            @foreach ($userMessages as $message)
                <div class="elm_messages_list">
                    <h2 class="title_elm_message">{{$message->title}}</h2>
                    <h4 class="accomodation_elm_message">{{$message->address}}</h4>
                    <div class="accomodation_nickname_elm">
                        <h3 class="nickname_elm_message">{{$message->nickname}}</h3>
                        <h4 class="accomodation_elm_message">{{$message->email}}</h4>
                    </div>
                    <p class="text_elm_message">{{$message->text_message}}</p>
                </div>
            @endforeach
        </div>
    </section>
@endsection