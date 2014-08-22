<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Sum of Digits</title>
		<style type="text/css">
			#wrapper {
				width: 460px;
				margin: 0 auto;
			}
			form {
				width: 400px;
				margin: 0 auto;
			}
			table {
				border-collapse: collapse;
				margin-top: 20px;
				text-align: center;
				width: 250px;
				margin: 20px auto;
			}
			tr td {
				border: 1px solid black;
				padding: 10px;
				margin-right: 5px;
			}
			tr:nth-child(even) {
				background-color: lightblue;
			}
			tr:nth-child(odd) {
				background-color: lightgrey;
			}
		</style>
	</head>
	<body>
		<div id="wrapper">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<label>Input String</label>
				<input type="text" name="nums">
				<input type="submit" value="Generate Table" name="submit">
			</form>
			<?php
				if (isset($_POST['submit'])) {
					if (!empty($_POST['nums'])) {
						$subject = $_POST['nums'];
						$pattern = '/[, ]+/';
						$group = preg_split($pattern, $subject);

						$sums = array();
						foreach ($group as $key => $value) {
							$sum = 0;
							for ($i=0; $i < strlen($value); $i++) {
								if(!preg_match('/[0-9]+/', $value)) {
									$sum = -1;
									break;
								}
								$sum += intval($value[$i]);
							}

							$sums[$value] = $sum;
						}
						?> <table> <?php
						foreach ($sums as $key => $value) {
							?> 
								<tr>
									<td><?php echo "$key"; ?></td>
									<td><?php if($value == -1) {echo "I cannot sum that";} else {echo "$value";} ?></td>
								</tr>
							<?php 
						}
						?> </table> <?php
					} else {
						echo "Invalid Input";
					}
				}
			?>
		</div>
	</body>
</html>