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
        <img src="img/projectLogoBanner.jpg" alt="EGO CSS Company Logo">
        <nav>
            <ul>
                <li><a href="2-hr-portal.html">Home</a></li>
                <li><a href="searchByLastName.php" class="highlightedNav">Search By Last Name</a></li>
                <li><a href="searchByJobTitle.php">Search By Job Title</a></li>
                <li><a href="searchByDepartment.php">Search By Department</a></li>
                <li><a href="calculator.php">Fuel Calculator</a></li>
            </ul>
        </nav>
    </header>
    <div class="container" id="container">
        <h1>Search By Last Name</h1>
        <div class="inputSection">
        <form id="employeeDatabase" action="#container" method="post">
            <fieldset>
                <legend class="labels">Employee Last Name</legend>
                <label for="lastName">Enter Last Name:</label><br>
                <input type="text" id="lastName" name="lastName" required />
				<button class="labels" type="submit" form="employeeDatabase">Search</button>
            </fieldset>
        </form>
    </div>
	
			<?php
			$mysql = new mysqli("localhost","cti110","wtcc","hr");
			if(isset($_POST['lastName'])){
				$lastName = $_POST['lastName'];
				$queryNames = "SELECT employees.employee_id,employees.first_name,employees.last_name,employees.job_id, jobs.job_title, employees.salary FROM employees INNER JOIN jobs ON employees.job_id = jobs.job_id WHERE employees.last_name = '".$lastName."'";
				$displayResult = $mysql->query($queryNames);
				echo "<div class='inputSection'>";
				echo "<table class='searchResults'><caption>Search Results</caption>";
				if (mysqli_num_rows($displayResult) != 0)
				{
					
					echo "<tr><th>Employee ID</th><th>First Name</th><th>Last Name</th><th>Job ID</th><th>Job Title</th><th>Salary</th></tr>";
					echo "<tbody>";
				
					foreach ($displayResult as $nameRow)
					{
						echo "<tr>";
						echo "<td>";
						echo $nameRow['employee_id'];
						echo "</td>";
						echo "<td>";
						echo $nameRow['first_name'];
						echo "</td>";
						echo "<td>";
						echo $nameRow['last_name'];
						echo "</td>";
						echo "<td>";
						echo $nameRow['job_id'];
						echo "</td>";
						echo "<td>";
						echo $nameRow['job_title'];
						echo "</td>";
						echo "<td>";
						echo $nameRow['salary'];
						echo "</td>";
						echo "</tr>";
					}
					echo "</tbody>";
				} else {
					echo "<tr><td colspan='6'>*No Results Found.</td></tr>";
				}
				echo "</table></div>";
		
			}
		?>
		
    </div>
    <footer>
        <a href="2-hr-portal.html">Return to HR Portal Main Page</a>
    </footer>
</body>

</html>
