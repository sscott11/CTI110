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
    <img src="img\projectLogoBanner.jpg" alt="EGO CSS Company Logo">
        <nav>
            <ul>
                <li><a href="2-hr-portal.html">Home</a></li>
                <li><a href="searchByLastName.php">Search By Last Name</a></li>
                <li><a href="searchByJobTitle.php">Search By Job Title</a></li>
                <li><a href="searchByDepartment.php">Search By Department</a></li>
                <li><a href="fuel_calculator.html" class="highlightedNav">Fuel Calculator</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
    <h1>Fuel Calculator Results</h1>

    <?php


    $fuel = $_POST["fuel"];
    $mpg = $_POST["mpg"];
    $distance = $_POST["distance"];

function calculator($fuel, $mpg, $distance) 
   {
    
    $result = $distance / $mpg * $fuel;
    echo "<p>The total cost for your trip is <b>$" . number_format($result,2) . "</b>.</p>";
    echo "<p>Click the link to calculate another trip.</p>";
    echo "<button type='button' name='reset'><a id='return' href='fuel_calculator.html'>Return to Fuel Calculator</a></button>";

   }

calculator($fuel, $mpg, $distance);

?>
</div>
<footer>
    <a href="2-hr-portal.html">Return to HR Portal Main Page</a>
</footer>
</body>
</html>
