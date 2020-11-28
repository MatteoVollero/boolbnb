<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

<h3>TIPOLOGIE (accomodation_types)</h3>
@foreach ($types as $type)
  <p>ID: {{$type->id}} - {{$type->name}}</p>
@endforeach

<h3>SPONSORIZZATE (accomodations / 10 record)</h3>
{{-- @php
    dd($sponsoredAccomodations);
@endphp --}}

@foreach ($sponsoredAccomodations as $sponsored)
  <p>ID: {{$sponsored->id}} CITY: {{$sponsored->city}} TITLE: {{$sponsored->title}} USER: {{$sponsored->user->name}}</p>
@endforeach

<h3>SCROLL HR 1 (accomodations / 20 record)</h3>
@foreach ($normalAccomodationsScroll1 as $normalAcc)
  <p>
    ID: {{$normalAcc->id}} CITY: {{$normalAcc->city}} TITLE: {{$normalAcc->title}}
  </p>
@endforeach

<h3>SCROLL HR 2 (accomodations / 20 record)</h3>
@foreach ($normalAccomodationsScroll2 as $normalAcc)
  <p>ID: {{$normalAcc->id}} CITY: {{$normalAcc->city}} TITLE: {{$normalAcc->title}}</p>
@endforeach


{{-- @php
  echo '  type: '.$types ?? ''[0]->name;
  echo '  scroll1: '.$normalAccomodationsScroll1[0]->id;
  echo '  scroll2: '.$normalAccomodationsScroll2[0]->id;
  echo '  sponsorizzata: '.$sponsoredAccomodations[0]->id;
@endphp --}}



</body>
</html>
