<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Primes in Range</title>
		<style type="text/css">
			.bold {
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label>Starting Index: </label>
			<input type="number" name="start">
			<label>End: </label>
			<input type="number" name="end">
			<input type="submit" name="submit">
		</form>
		<?php
			function isPrime($num) {
				for ($i=2; $i <= sqrt($num); $i++) { 
					if ($num % $i == 0) {
							return false;
						}	
				}

				return true;
			}

			if (isset($_POST['submit'])) {
				if ((!empty($_POST['start'])) && (!empty($_POST['end']))) {
					$start = $_POST['start'];
					$end = $_POST['end'];
					?><p><?php
					for ($i=$start; $i <= $end; $i++) { 
						if (isPrime($i)) {
							?><span class="bold"><?php echo "$i, "; ?></span><?php		
						} else {
							?><span><?php echo "$i, "; ?></span><?php
						}
					}

					?></p><?php
				} else {
					echo "Invalid input";
				}
			}
		?>
	</body>
</html>