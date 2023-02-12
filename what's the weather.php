<!-- 
hum is video mai janenge ki kese hum weather carreper bana sakte hai 
hum is video mai weater forrecate webiste ko islye cun rahe hai kyuki ismai humko jo bhihum chate hai wo url mai aa jata hai


hum ismai bas summary ko extract karna bhi sikhne wale ahi ye muskil hone wala hai 

ab weather forecast.com ka url change ho chuka ahi toh ab humko ye website jo banana sikha raha ahi uske website se data lina hoga
website name====>
http://completewebdevelopercourse.com/locations/London
-->
<?php
$weather = "";
$error = "";

if ($_GET['city']) {
  $urlcontents =   file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$_GET['city']."&appid=723883bccccf9018ad0107686baf9981");

  $weatherarray = json_decode($urlcontents,true);
  if ($weatherarray['cod'] == 200) {
    $weather = "<br><p> the weater in  ".urlencode($_GET['city'])." is currently'"  .$weatherarray['weather']{0}['description']."'.</p>";
  $tempincelcius = intval($weatherarray['main']['temp'] - 273);
  $weather .= "the temp in ".$tempincelcius."&deg;c";
  $windspeed = $weatherarray['wind']['speed'];
  $weather .= "<br>the spped is'.$windspeed.'";



   
  }else{
    $error .= "plese try again";
  }

  
}
	
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>weather scapper</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style type="text/css">

    	html { 
  background: url(sky.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
body{
	background: none;
	font-family: sans-serif;
}
.container{
	text-align: center;
	margin-top: 200px;
	width: 400px;
}
#city{
	height: 50px;
	border-radius: 50px;
}
input{
	margin: 20px 0px;
}
.weather{
  text-align: center;
  background-color: white;
  color: green;
  border-radius: 2px;
  width: 500px;
  margin: 0px auto;
  padding-bottom: 20px;
}

     </style>

  </head>
  <body>
  	<div class="container">
  	<h2>Find Your City Weather!</h2>
 
  	<form method="get">
  <div class="mb-3">
    <label for="city" class="form-label">Enter The City Name</label>
    <input type="text" placeholder="Eg. London,Paris" class="form-control" id="city" name="city" aria-describedby="emailHelp">
   
  </div>
  <button type="submit" class="btn btn-danger">Submit</button>
</form>

  	</div>
  	<div class="weather">
      <?php  
      echo $weather;
      echo $error;
       ?>

  	</div>
  	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  </body>
</html>