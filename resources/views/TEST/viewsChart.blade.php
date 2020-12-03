<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <button id="api" type="" name="button">API</button>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
  </body>
  <script type="text/javascript">

  $("#api").click(function(){
    console.log('Sono nel click');
    $.ajax
    ({
            // take the url from the DB
        "url": "http://localhost:8000/api/views/",
        "data" : {
          'id' : 8
        },
        "method" : "GET",
        "success" : function (data) {
              console.log(data['date']);
              console.log(data['views']);
              console.log(data['viewsTotal']);  
        },
        "error" : function (err,data) {
          console.log("--------------------[DEBUG]--------->[ERROR:" + err + "]: " + data);
        }
    });

  });

  </script>
</html>
