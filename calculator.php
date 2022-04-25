<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=width-device initial-scale=1.0">
  <title>Trip Calculator</title>
  <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<h1><img src="projectLogoBanner.jpg" height="300"></h1>
  
  <section>
    <nav>
      <a class="nav" href="landing.html">Home</a>
      <a class="nav" href="">Search by Last Name</a>
      <a class="nav" href="">Search by Job Title</a>
      <a class="nav" href="fuel_calculator.html">Trip Calculator</a>
    </nav>

<?php


    $fuel = $_POST["fuel"];
    $mpg = $_POST["mpg"];
    $distance = $_POST["distance"];

function calculator($fuel, $mpg, $distance) {
    
    $result = $distance / $mpg * $fuel;
    echo "<p>The total cost for your trip is $" . number_format($result,2) . ".</p>";
    echo "<p>Click the link to calculate another trip.</p>";
    echo "<button type='button' name='reset'><a id='return' href='fuel_calculator.html'>Return to Fuel Calculator</a></button>";

}

calculator($fuel, $mpg, $distance);

?>
</body>
</html>