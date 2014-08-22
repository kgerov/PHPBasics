<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Primes in Range</title>
		<style type="text/css">
			table {
				border-collapse: collapse;
				margin-top: 20px;
			}
			tr,  td {
				border: 1px solid black;
				padding: 10px;
			}
			tr:nth-child(odd) {
				background-color: lightyellow;
			}
			tr:nth-child(1) {
				font-weight: bold;
				background-color: #6AC62E;
			}
			tr:nth-child(even) {
				background-color: #48BEEF;
			}
		</style>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label>Enter cars: </label>
			<input type="text" name="cars">
			<input type="submit" name="submit" value="Show Result">
		</form>
		<?php
			function getRandColor() {
				$r = rand(0, 7);
				$colors = array("red", "white", "yellow", "blue", "aqua", "gold", "orange", "green");
				return $colors[$r];
			}
			function getRandNum() {
				return rand(1, 30);
			}

			if (isset($_POST['submit'])) {
				if (!empty($_POST['cars'])) {
					$cars = preg_split('[, ]', $_POST['cars']);
					?>
					<table>
						<tr>
							<td>Car</td>
							<td>Color</td>
							<td>Count</td>
						</tr>
					<?php 
					for ($i=0; $i < count($cars); $i++) { 
						?> 
							<tr>
								<td><?php echo $cars[$i]; ?></td>
								<td><?php echo getRandColor(); ?></td>
								<td><?php echo getRandNum(); ?></td>
							</tr>
						<?php
					}
					?></table><?php
				} else {
					echo "Invalid input";
				}
			}
		?>
	</body>
</html>