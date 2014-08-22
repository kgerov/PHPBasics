<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<script src="scripts/addRemove.js"></script>
		<title>Student Sorting</title>
		<style type="text/css">
				html, body {
					margin: 0;
					padding: 0;
				}
				#wrapper {
					width: 960px;
					margin: 0 auto;
					background-color: #E5E4D7;
					padding: 10px;
					font-family: Arial;
				}
				table {
					border-collapse: collapse;
					margin-bottom: 15px;
					border-radius: 2px;
				}
				form {
					width: 800px;
					margin: 0 auto;
				}
				table:nth-child(2) {
					width: 760px;
					margin: 40px auto;
				}
				tr, td {
					border: 1px solid black;
					padding: 8px;
				}
				table tr:nth-child(even) {
					background-color: #F6F6F6;
				}
				table tr:nth-child(odd) {
					background-color: #EDEDED;
				}
				table tr:nth-child(1) {
					background-color: #02AD8B;
					color: white;
					font-weight: bold;
				}
				input {
					width: 170px;
					height: 25px;
					font-size: 13pt;
				}
				.bold {
					font-weight: bold;
				}
				button, input[type=submit] {
					background: none;
					background-color: #01C99A;
					padding: 3px 8px;
					font-size: 13pt;
					color: white;
					text-transform: uppercase;
					border: none;
					border: 1px solid #02AD8B;
					margin-left: 5px;
				}
				select {
					width: 200px;
					height: 30px;
					font-size: 13pt;
				}
				input[type=submit] {
					font-weight: bold;
					padding: 3px 15px;
					margin-left: 13px;
				}
				label {
					font-weight: bold;
				}

		</style>
	</head>
	<body>
		<div id="wrapper">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<table id="studentTable">
					<tr>
						<td>First Name</td>
						<td>Second Name</td>
						<td>Email</td>
						<td>Exam Score</td>
					</tr>
					<script>addStudent();</script>
				</table>
				<button onclick="addStudent(); return false;">+</button>
				<label for="sortType">Sort By:</label>
				<select name="sortType" id="sortType">
					<option value="fname">First Name</option>
					<option value="lname">Second Name</option>
					<option value="email">Email</option>
					<option value="exam">Exam Score</option>
				</select>
				<label for="sortOrder">Order By:</label>
				<select name="sortOrder" id="sortOrder">
					<option value="desc">Descending</option>
					<option value="asc">Ascending</option>
				</select>
				<input type="submit" value="Generate" name="submit">
			</form>
			<?php
				function checkData() {
					for ($i=0; $i < count($_POST['firstname']); $i++) { 
						if ($_POST['firstname'][$i] == "") {
							return false;
						}
					}
					
					for ($i=0; $i < count($_POST['lastname']); $i++) { 
						if ($_POST['lastname'][$i] == "") {
							return false;
						}
					}

					for ($i=0; $i < count($_POST['email']); $i++) { 
						if ($_POST['email'][$i] == "") {
							return false;
						}
					}

					for ($i=0; $i < count($_POST['score']); $i++) { 
						if ($_POST['score'][$i] == "") {
							return false;
						}
					}

					return true;
				}

				function compareString($a, $b) {
					return strcmp($a->email, $b->email);
				}

				function compareFName($a, $b) {
					return strcmp($a->firstname, $b->firstname);
				}

				function compareLName($a, $b) {
					return strcmp($a->lastname, $b->lastname);
				}

				function compareNumber($a, $b) {
					if ($a->examScore == $b->examScore) {
				        return 0;
				    }
				    return ($a->examScore < $b->examScore) ? -1 : 1;
				}

				class Student {
					public static $sum = 0;
					public static $classCounter = 0;

					public $firstname;
					public $lastname;
					public $email;
					public $examScore;

					public function __construct($firstname, $lastname, $email, $examScore) {
						$this->firstname = $firstname;
						$this->lastname = $lastname;
						$this->email = $email;
						$this->examScore = $examScore;

						self::$classCounter++;
						self::$sum+=$examScore;
					}


				    public function average() {
				        return floor(self::$sum / self::$classCounter);
				    }
				}

				$students = array();

				if (isset($_POST['submit'])) {
					if (checkData()) {
						for ($i=0; $i < count($_POST['firstname']); $i++) { 
							$student = new Student($_POST['firstname'][$i], $_POST['lastname'][$i], $_POST['email'][$i], $_POST['score'][$i]);
							$students[] = $student;
						}

					$sortType  = $_POST['sortType'];
					$sortOrder = $_POST['sortOrder'];

					if ($sortType == "exam") {
						usort($students, "compareNumber");
					} else {
						if ($sortType == "fname") {
							usort($students, "compareFName");	
						} else if($sortType == "lname") {
							usort($students, "compareLName");	
						} else {
							usort($students, "compareString");							
						}
					}

					$swing = array();

					if ($sortOrder == "desc") {
						for ($i=count($students)-1; $i >= 0; $i--) { 
							$swing[] = $students[$i];
						}
						
						$students = $swing;
					}

					?>
					<table>
						<tr>
							<td>First Name</td>
							<td>Last Name</td>
							<td>Email</td>
							<td>Exam Score</td>
						</tr>
					<?php

					for ($i=0; $i < count($students); $i++) { 
						?>
						<tr>
							<td><?php echo $students[$i]->firstname; ?></td>
							<td><?php echo $students[$i]->lastname; ?></td>
							<td><?php echo $students[$i]->email; ?></td>
							<td><?php echo $students[$i]->examScore; ?></td>
						</tr> <?php
					}

					?>
					<tr>
						<td colspan="3" class="bold">Average Score</td>
						<td class="bold"><?php echo $students[0]->average(); ?></td>
					</tr>

					</table>
					<?php 
					} else {
						die("Invalid Information");
					}
				}
			?>
		</div>
	</body>
</html>