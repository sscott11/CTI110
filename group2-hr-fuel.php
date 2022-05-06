<!DOCTYPE html>
<html lang="en">
<head>
    <!--
	Filename: group2-hr-fuel.php
    Class Section: CTI.110.0003
    Group: 2
    Purpose: Calculate and Display Fuel Cost for Trip
	-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EGO CSS Human Resources</title>
    <link rel="stylesheet" href="css/group2-hr-style.css" type="text/css">
</head>
<body>
    <header id="top">  
    <img src="img/projectLogoBanner.jpg" alt="EGO CSS Company Logo">
        <nav>
            <ul>
                <li><a href="group2-hr-portal.html">Home</a></li>
                <li><a href="group2-hr-emp-search.html">Search By Last Name</a></li>
                <li><a href="group2-hr-job-title.html">Search By Job Title</a></li>
                <li><a href="group2-hr-department.html">Search By Department</a></li>
                <li><a href="group2-hr-fuel.html" class="highlightedNav">Fuel Calculator</a></li>
            </ul>
        </nav>
    </header>
    <div class="container" id="container">
        <h1>Fuel Calculator</h1>
        <div class="inputSection">
            <p><b>This program was created to help estimate the cost of fuel for a road trip. You need to know the
                    expected cost of gas per gallon, your car's mpg, and the distance of the trip.</b></p>
            <form id="calculator" action="group2-hr-fuel.php#output" method="post">
                <fieldset id="calculateFuelCost">
                    <legend class="labels">Fuel Cost Calculator</legend>
                    <div style="width: 45%; min-width: 250px;">
                        <label for="fuel">Cost of Gas (Per Gallon)</label><br>
                        <input id="fuel" type="number" step="0.01" name="fuel" min=".01" placeholder="$" required><br>
                        <small>Must be greater than 0. (Max of 2 decimal places.)</small><br>
                        <label for="mpg">Car's MPG</label><br>
                        <input id="mpg" type="number" step="0.01" name="mpg" min="5" required><br>
                        <small>Minimum of 5 MPG. (Max of 2 decimal places.)</small><br>
                        <label for="miles">Trip Distance (Miles)</label><br>
                        <input id="miles" type="number" step="0.01" name="distance" min="1" required><br>
                        <small>Minimum of 1 mile. (Max of 2 decimal places.)</small>
                        <button class="labels" type="submit" form="calculator">Submit</button>
                    </div>
                    <div style="width: 350px;">
                        <img src="img/egoGasGauge.png" alt="Gas gauge image with company logo">
                    </div>
                </fieldset>
            </form>
        </div>
    <?php

    
function calculator($fuel, $mpg, $distance) 
   {
    $result = $distance / $mpg * $fuel;
    
	//New Table Code
	echo "<div class='inputSection'>";
	echo "<table class='searchResults'><caption>Fuel Calculator Results</caption><thead><tr><th colspan=4>Cost of Trip</th></tr></thead>";
	echo "<tr><th>Cost of Gas</th><th>MPG</th><th>Trip Distance</th><th>Total Cost</th></tr>";
	echo "<tbody>";
	echo "<tr><td>$".$fuel."</td><td>".$mpg."</td><td>".$distance." miles</td><td><b>$".number_format($result,2)."</b></td></tr>";
	echo "</tbody></table></div>";


	//Replaced Code
	//echo "<h1>Fuel Calculator Results</h1>";
    //echo "<h1><img src='img/egoGasGauge.png' width='100' height='100' alt='Gas gauge image with company logo'></h1>"; 
    //echo "<p>The total cost of fuel for your trip is <b>$" . number_format($result,2) . "</b>.</p>";
    
 
   }

function numericCheck($fuel, $mpg, $distance)   
  {
      if ((is_numeric($fuel) == 1) && (is_numeric($mpg) == 1) && (is_numeric($distance) == 1)) {
          checkPositiveNum($fuel, $mpg, $distance);
      } else {
          echo "<p>Please Enter a Valid Number:</p>";
          echo "<ul><li><b>- All entries must have numeric values.</b></li></ul>";
      }
  }


function checkPositiveNum($fuel, $mpg, $distance) 
{
     if (($fuel > 0) && ($mpg > 0 ) && ($distance > 0)) {
        calculator($fuel, $mpg, $distance); 
        
     } else {
         echo "<div class='inputSection'>"; 
         echo "<h3>Please Enter a Valid Number:</h3>";
         echo "<ul><li><b>- Entry must be a positive number</b></li><br>";
         echo "<li><b>- \"0\" is not a valid entry</b></li></ul></div>";
     }     
}

if ((isset($_POST["fuel"])) && (isset($_POST["mpg"])) && (isset($_POST["distance"]))) 
    {
        echo "<div id='output'>"; 
		$fuel = $_POST["fuel"];
        $mpg = $_POST["mpg"];
        $distance = $_POST["distance"];
        numericCheck($fuel, $mpg, $distance);  
		echo "</div>";

    }


    ?>
</div>
<footer>
    <a href="group2-hr-portal.html">Return to HR Portal Main Page</a>
</footer>
</body>
</html>
