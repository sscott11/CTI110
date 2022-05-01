<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=width-device initial-scale=1.0">
    <title>EGO CSS Human Resources</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>
<body>
    <header id="top">  
        <img src="img/projectLogoBanner.jpg" height="300">
        <nav class="navMenu">
            <a href="2-hr-portal.html">Home</a>
            <a href="searchByLastName.html">Search by Last Name</a>
            <a href="searchByJobTitle.html">Search by Job Title</a>
            <a href="fuel_calculator.html" class="highlightedNav">Fuel Calculator</a>
        </nav>
    </header>   

    <?php


    $fuel = $_POST["fuel"];
    $mpg = $_POST["mpg"];
    $distance = $_POST["distance"];

function calculator($fuel, $mpg, $distance) 
   {
    
    $result = $distance / $mpg * $fuel;
    echo "<p>The total cost for your trip is $" . number_format($result,2) . ".</p>";
    echo "<p>Click the link to calculate another trip.</p>";
    echo "<button type='button' name='reset'><a id='return' href='fuel_calculator.html'>Return to Fuel Calculator</a></button>";

   }

calculator($fuel, $mpg, $distance);

?>
</body>
</html>
