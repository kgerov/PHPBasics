<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Calculate Interest</title>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label for="amount">Enter Amount</label>
			<input type="text" name="amount" id="amount"/></br>
			<label for="usd">USD</label>
			<input type="radio" name="currency" value="usd" id="usd"/>
			<label for="eur">EUR</label>
			<input type="radio" name="currency" value="eur" id="eur"/>
			<label for="bgn">BGN</label>
			<input type="radio" name="currency" value="bgn" id="bgn"/></br>
			<label for="interest">Compound Interest Amount</label>
			<input type="text" name="interest" id="interest"/></br>
			<select name="time">
			  <option value="0.5">6 Months</option>
			  <option value="1">1 Year</option>
			  <option value="2">2 Years</option>
			  <option value="5">5 Years</option>
			</select>
			<input type="submit" value="Calculate" name="submit"/>
		</form>
		<?php 
			if (isset($_POST['submit'])) {
				$isError = false;
				$errorM = "";
				if (!empty($_POST['amount'])) {
					$amount = $_POST['amount'];
				}  else {
					$isError = true;
					$errorM .= "-No Amount Entered<br>";
				}
				if(isset($_POST['currency'])) {
					$currency = $_POST['currency'];
				} else {
					$isError = true;
					$errorM .= "-No Currency Selected<br>";
				}
				if (!empty($_POST['interest'])) {
					$interest = $_POST['interest'];
				} else {
					$isError = true;
					$errorM .= "-No Coumpound Interest Rate selected<br>";
				}
				$time = $_POST['time'];
				if ($isError) {
					echo "$errorM";
				} else {
					$finalM = (double)$amount*pow((1+((double)$interest/1200)), (double)$time*12);
					switch ($currency) {
						case 'usd':
							echo "$ ";
							break;
						case 'eur':
							echo "€ ";
							break;
						case 'bgn':
							echo "Leva ";
							break;
					}
					echo round($finalM, 2);
				}
			}
		?>
	</body>
</html>