<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Primes in Range</title>
		<style type="text/css">
			table {
				border-collapse: collapse;
				margin-top: 40px;
				text-align: center;
			}
			tr, td {
				border: 1px solid black;
				padding: 10px;
				margin-right: 4px;
			}
			tr:nth-child(odd) {
				background-color: lightyellow;
			}
			tr:nth-child(1) {
				font-weight: bold;
				background-color: #EE8B27;
			}
			tr:nth-child(even) {
				background-color: lightyellow;
			}
		</style>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label>Enter number of years: </label>
			<input type="number" name="years">
			<input type="submit" name="submit" value="Show Costs">
		</form>
		<?php
			if (isset($_POST['submit'])) {
				if (preg_match('/[0-9]+/', $_POST['years'])) {
					?> 
					<table>
						<tr>
							<td>Year</td>
							<td>January</td>
							<td>February</td>
							<td>March</td>
							<td>April</td>
							<td>May</td>
							<td>June</td>
							<td>July</td>
							<td>August</td>
							<td>September</td>
							<td>October</td>
							<td>November</td>
							<td>December</td>
							<td>Total:</td>
						</tr>
					<?php
					$pastYear = $_POST['years'];
					$currYear = date("Y");
					for ($i=$currYear; $i > $currYear-$pastYear; $i--) { 
						$total = 0;
						?> 
							<tr>
								<td><?php echo "$i"; ?></td>
								<?php 
									for ($j=0; $j < 12; $j++) { 
										?><td><?php $r = rand(0, 999); $total += $r; echo "$r"; ?></td><?php
									}
								?>
								<td><?php echo "$total"; ?></td>
							</tr>
						<?php
					}
					?> </table> <?php
				} else {
					echo "<p>Invalid Input</p>";
				}
			}
		?>
	</body>
</html>