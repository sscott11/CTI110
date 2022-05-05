<!DOCTYPE html>
<html lang="en">

<head>
	<!--
	Filename: searchByJobTitle.php
    Class Section: CTI.110.0003
    Group: 2
    Purpose: Search for and Display Employees by Job Title
	-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EGO CSS Human Resources</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>

<body>
    <header id="top">
        <img src="img/projectLogoBanner.jpg" alt="EGO CSS Company Logo">
        <nav>
            <ul>
                <li><a href="2-hr-portal.html">Home</a></li>
                <li><a href="searchByLastName.html">Search By Last Name</a></li>
                <li><a href="searchByJobTitle.html" class="highlightedNav">Search By Job Title</a></li>
                <li><a href="searchByDepartment.html">Search By Department</a></li>
                <li><a href="calculator.html">Fuel Calculator</a></li>
            </ul>
        </nav>
    </header>
	<?php
		$mysql = new mysqli("localhost","cti110","wtcc","hr");
		$query = "SELECT job_id, job_title FROM jobs ORDER BY job_title";
		$result = $mysql->query($query);
	?>	
    <div class="container" id="container">
        <h1>Search by Job Title</h1>
        <div class="inputSection">
			<form id="jobTitleForm" action="#container" method="post">
				<fieldset>
					<legend class="labels">Employee Job Title</legend>
					<label for="jobTitle">Select Job Title: </label><br>
					<select name="jobTitles" class="jobTitles" id="jobTitle">
						<?php
							foreach ($result as $row)
							{
								echo "<option class='dynList' value='".$row['job_id']."'>".$row['job_title']."</option>";
							}
						?>
					</select>
					<button type="submit">Search</button>
				</fieldset>
			</form>
        </div>
			
		<?php
			if(isset($_POST['jobTitles'])){
				$jobTitles = $_POST['jobTitles'];
				$queryNames = "SELECT employees.employee_id,employees.first_name,employees.last_name,employees.job_id, jobs.job_title, employees.salary FROM employees INNER JOIN jobs ON employees.job_id = jobs.job_id WHERE employees.job_id = '".$jobTitles."'";
				$queryAvg = "SELECT ROUND(AVG(salary),2) FROM employees WHERE job_id = ".$jobTitles;
				$displayResult = $mysql->query($queryNames);
				$avgResult = $mysql->query($queryAvg);
				$avgRow = $avgResult->fetch_array(MYSQLI_NUM);
				$topper = $displayResult->fetch_array(MYSQLI_ASSOC);
				echo "<div class='inputSection'>";
				echo "<table class='searchResults'><caption>Search Results</caption><thead><tr><th colspan=6>";
					
				echo $topper['job_title'];
				echo " - $";
				echo $avgRow[0];
				echo " Average Salary";
					
				echo "</th></tr></thead>";
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
				echo "</tbody></table></div>";
	
			}
		?>
				
    </div>
		
    <footer>
        <a href="2-hr-portal.html">Return to HR Portal Main Page</a>
    </footer>
</body>

</html>
