
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
      <label for="lon">TOILETS:</label>
      <input id="input-toilets" type="text" name="toilets">
    </div> <br><br>

    <button id="btn-search"> RICERCA</button>

    <h3>RESEARCH API LARAVEL RESULTS</h3>
    <p id="accomodations_id"></p>

      
  <script src="http://localhost:8000/js/app.js"></script>

  
</body>
</html>
