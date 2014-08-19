<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Print Tags</title>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label for="names">Enter Tags: </label><br>
			<input type="text" name="names" id="names"/>
			<input type="submit" value="Submit" name="submit"/>
		</form>
		<?php 
			if (isset($_POST['submit'])) {
				$arrNames = $_POST['names'];
				$names = explode(", ", $arrNames);
				$names = array_filter($names);
				foreach ($names as $key => $value) {
					echo "$key  : $value<br>";
				}
			}
		?>
	</body>
</html>