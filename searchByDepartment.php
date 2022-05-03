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
                <li><a href="searchByLastName.php">Search By Last Name</a></li>
                <li><a href="searchByJobTitle.php">Search By Job Title</a></li>
                <li><a href="searchByDepartment.php" class="highlightedNav">Search By Department</a></li>
                <li><a href="fuel_calculator.html">Fuel Calculator</a></li>
            </ul>
        </nav>
    </header>
	<?php
		$mysql = new mysqli("localhost","cti110","wtcc","hr");
		$query = "SELECT department_name, department_id FROM departments";
		$result = $mysql->query($query);
	?>
	<div class="container" id="container">
        <h1>Search By Department</h1>
		<div class="inputSection">
        <div class="search">
			<form id="departmentForm" action="#container" method="post">
			<fieldset>
				<legend>Employee Department</legend>
				<label for="department">Select Department: </label><br>
				<select name="departmentName" class="departmentName">
					<?php
						foreach ($result as $row)
						{
							echo "<option class='dynList' value='".$row['department_id']."'>".$row['department_name']."</option>";
						}
					?>				
				</select>
					<button type="submit">Search</button>
			</fieldset>
			</form>

        </div>
		</div>

		<?php
			if(isset($_POST['departmentName'])){
				$departmentName = $_POST['departmentName'];
				$queryNames = "SELECT employees.employee_id,employees.first_name,employees.last_name,employees.job_id, jobs.job_title, employees.salary FROM employees INNER JOIN jobs ON employees.job_id = jobs.job_id WHERE employees.department_id = '".$departmentName."'";
				$queryDept = "SELECT department_name FROM departments WHERE department_id = ".$departmentName;
				$displayResult = $mysql->query($queryNames);
				$departmentResult = $mysql->query($queryDept);
				echo "<div class='inputSection'>";
				echo "<table class='searchResults'><caption>Search Results</caption><thead><tr><th colspan=6>";
				foreach ($departmentResult as $topper) echo $topper['department_name'];
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
