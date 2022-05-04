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
                <li><a href="calculator.php" class="highlightedNav">Fuel Calculator</a></li>
            </ul>
        </nav>
    </header>
    <div class="container" id="container">
    <h1>Fuel Calculator</h1>    
        <div class="inputSection" id="inputSection">
        <p><b>This program was created to help estimate the cost of fuel for a road trip. You need to know the
                approximate cost of gas, your car's mpg, and the distance the trip.</b></p>

        
            <form id="calculator" action="#output" method="post">
                <fieldset>
                    <legend class="labels">Fuel Cost Calculator</legend>
                        <label for="fuel">Estimated Fuel Cost</label><br>
                        <input id="fuel" type="float" name="fuel" min="0" required><br>

                        <label for="mpg">Car's MPG</label><br>
                        <input id="mpg" type="float" name="mpg" min="5" required><br>

                        <label for="miles">Trip Distance (Miles)</label><br>
                        <input id="miles" type="float" name="distance" min="1" required><br>
                </fieldset>
            </form>

            <button class="labels" type="submit" form="calculator">Submit</button>

        </div>
  <div class="output" id="output"> 
    <?php


    


    
function calculator($fuel, $mpg, $distance) 
   {
     
    echo "<h1>Fuel Calculator Results</h1>";
    echo "<h1><img src='img/egoGasGauge.png' width='100' height='100' alt='Gas gauge image with company logo'></h1>"; 
    $result = $distance / $mpg * $fuel;
    echo "<p>The total cost of fuel for your trip is <b>$" . number_format($result,2) . "</b>.</p>";
    
 
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
         echo "<p>Please Enter a Valid Number:</p>";
         echo "<ul><li><b>- Entry must be a positive number</b></li><br>";
         echo "<li><b>- \"0\" is not a valid entry</b></li></ul>";
     }     
}

if ((isset($_POST["fuel"])) && (isset($_POST["mpg"])) && (isset($_POST["distance"]))) 
    {
        $fuel = $_POST["fuel"];
        $mpg = $_POST["mpg"];
        $distance = $_POST["distance"];
        numericCheck($fuel, $mpg, $distance);
    }


    ?>
  </div>
</div>
<footer>
    <a href="2-hr-portal.html">Return to HR Portal Main Page</a>
</footer>
</body>
</html>
