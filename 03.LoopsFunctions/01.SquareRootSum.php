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
				background-color: #6890DB;
			}
			tr:nth-child(1) {
				font-weight: bold;
				background-color: #0D7DD4;
			}
			tr:nth-child(even) {
				background-color: #DBE2F0;
			}
			#bold {
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<table>
			<tr>
				<td>Number</td>
				<td>Square</td>
			</tr>
		<?php
			$sum = 0;
			for ($i=0; $i <= 100; $i+=2) { 
				$sum += round(sqrt($i), 2);
				?>
					<tr>
						<td><?php echo "$i"; ?></td>
						<td><?php echo round(sqrt($i), 2); ?></td>
					</tr>
				<?php
			}
		?>
			<tr>
				<td id="bold">Total: </td>
				<td><?php echo "$sum"; ?></td>
			</tr>
		</table>
	</body>
</html> 