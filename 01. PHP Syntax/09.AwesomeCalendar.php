<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Awesome Calendar</title>
		<style type="text/css">
			html {
				background-color: #B52735;
			}
			form {
				width: 400px;
				margin: 150px auto;
			}
			input[type=submit] {
				display: block;
				width: 350px;
				background: none;
				border: none;
				border: 3px solid #F5F1D8;
				background-color: #5B9CA2;
				height: 40px;
				color: #F5F1D8;
				font-family: Arial;
				font-weight: bold;
				font-size: 14pt;
				margin-top: 20px;
			}
			input[type=submit]:hover {
				background-color: #F5F1D8;
				color: #5B9CA2;
			}
			input[type=number] {
				width: 225px;
				background: none;
				border: none;
				border: 3px solid #F5F1D8;
				background-color: #5B9CA2;
				height: 25px;
				color: #F5F1D8;
				font-family: Arial;
				font-weight: bold;
				font-size: 14pt;
				margin-top: 20px;
				text-align: center;
			}
			label {
				color: #F5F1D8;
				font-family: Arial;
				font-weight: bold;
				font-size: 14pt;
				margin-top: 20px;
				margin-right: 10px;
			}
		</style>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label for="year">Enter Year: </label>
			<input type="number" name="year" required="required" id="year"/>
			<input type="submit" value="Print Calendar" name="submit"/>
		</form>
		<?php
			session_start();
			if (isset($_POST['submit'])) {
				if (isset($_POST['year'])) {
					$year = (int)$_POST['year'];
					if (is_int($year) && ($year > 1900 && $year < 2030)) { //INCREASE RANGE!
						$_SESSION['year'] = $year;
						header('Location: 09.AwesomeCalendar2.php');
					} else {
						echo "<script>alert('Invalid Year. Valid range 1900-2030')</script>";
					}
				}
			}
		?>
	</body>
</html>