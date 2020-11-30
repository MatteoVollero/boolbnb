
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  <h1>RESEARCH PAGE</h1>

    <div>
      <label for="destination">DESTINATION:</label>
      <input id="input-destination" type="text" name="destination">
    </div><br><br>

    <h3>RESEARCH TOM TOM RESULTS</h3>
    <p id="place_id"></p>

    <div>
      <label for="lat">LAT:</label>
      <input id="input-lat" type="text" name="lat">
    </div>

    <div>
      <label for="lon">LON:</label>
      <input id="input-lon" type="text" name="lon">
    </div> <br><br>

    <div>
      <label for="beds">BEDS:</label>
      <input id="input-beds" type="text" name="beds">
    </div> <br><br>

    <div>
      <label for="radius">KM RADIUS:</label>
      <input id="input-radius" type="text" name="radius">
    </div> <br><br>

    <div>
      <label for="lon">TOILETS:</label>
      <input id="input-toilets" type="text" name="toilets">
    </div> <br><br>

    <div>
      <label for="rooms">ROOMS:</label>
      <input id="input-rooms" type="text" name="rooms">
    </div> <br><br>

    <div class="form-check form-check-inline">
        <input class="form-check-input" name="services[]" type="checkbox" id="service-1" value="1">
        <label class="form-check-label" for="service-1"> wi-fi </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" name="services[]" type="checkbox" id="service-2" value="2">
        <label class="form-check-label" for="service-2"> parking </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" name="services[]" type="checkbox" id="service-3" value="3">
        <label class="form-check-label" for="service-3"> pool </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" name="services[]" type="checkbox" id="service-4" value="4">
        <label class="form-check-label" for="service-4"> reception </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" name="services[]" type="checkbox" id="service-5" value="5">
        <label class="form-check-label" for="service-5"> sauna </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" name="services[]" type="checkbox" id="service-6" value="6">
        <label class="form-check-label" for="service-6"> sea-view </label>
    </div>

    <button id="btn-search"> RICERCA ACCOMODATIONS</button>

    <h3>RESEARCH API LARAVEL RESULTS</h3>
    <p id="accomodations_id"></p>


  <script src={{asset('/js/app.js')}}></script>


</body>
</html>
