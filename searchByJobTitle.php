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
                <li><a href="searchByJobTitle.php" class="highlightedNav">Search By Job Title</a></li>
                <li><a href="searchByDepartment.php">Search By Department</a></li>
                <li><a href="fuel_calculator.html">Fuel Calculator</a></li>
            </ul>
        </nav>
    </header>
	<?php
		$mysql = new mysqli("localhost","cti110","wtcc","hr");
		$query = "SELECT job_id, job_title FROM jobs";
		$result = $mysql->query($query);
	?>	
    <div class="container" id="container">
        <h1>Search by Job Title</h1>
        <div class="inputSection">
		
            <fieldset>
                <legend class="labels">Employee Job Title</legend>
				<form id="jobTitleForm" action="#container" method="post">
					<label for="jobTitle">Select Job Title: </label><br>
					<select name="jobTitles" class="jobTitles">
					<?php
						foreach ($result as $row)
						{
							echo "<option class='dynList' value='".$row['job_id']."'>".$row['job_title']."</option>";
						}
					?>
					</select>
				</fieldset>
            <button type="submit">Search</button>
				</form>
        </div>
			
		<?php
			if(isset($_POST['jobTitles'])){
				$jobTitles = $_POST['jobTitles'];
				$queryNames = "SELECT first_name,last_name,email,phone_number FROM employees WHERE job_id = ".$jobTitles;
				$queryJobs = "SELECT job_title FROM jobs WHERE job_id = ".$jobTitles;
				$queryAvg = "SELECT ROUND(AVG(salary),2) FROM employees WHERE job_id = ".$jobTitles;
				$displayResult = $mysql->query($queryNames);
				$jobsResult = $mysql->query($queryJobs);
				$avgResult = $mysql->query($queryAvg);
				$avgRow = $avgResult->fetch_array(MYSQLI_NUM);
				echo "<div class='inputSection'>";
				echo "<table class='searchResults'><caption>Search Results</caption><thead><tr><th colspan=4>";
				foreach ($jobsResult as $topper) 
				{
					echo $topper['job_title'];
					echo " - $";
					echo $avgRow[0];
					echo " Average Salary";
				}
				echo "</th></tr></thead>";
				echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone Number</th></tr>";
				echo "<tbody>";
			
				foreach ($displayResult as $nameRow)
				{
					echo "<tr>";
					echo "<td>";
					echo $nameRow['first_name'];
					echo "</td>";
					echo "<td>";
					echo $nameRow['last_name'];
					echo "</td>";
					echo "<td>";
					echo $nameRow['email'];
					echo "</td>";
					echo "<td>";
					echo $nameRow['phone_number'];
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