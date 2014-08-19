<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Most Frequent Tags</title>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<label for="names">Enter Tags: </label></br>
			<input type="text" name="names" id="names"/>
			<input type="submit" value="Submit" name="submit"/>
		</form></br>
		<?php 
			if (isset($_POST['submit'])) {
				$arrNames = $_POST['names'];
				$names = explode(", ", $arrNames);
				$names = array_filter($names);
				$frequency = array();
				if (empty($names)) {
					die("No input");
				}
				foreach ($names as $key => $value) {
					if (array_key_exists($value, $frequency)) {
						$frequency[$value] ++;
					} else {
						$frequency[$value] = 1;
					}
				}
				arsort($frequency);

				$iter = 0; //ALPHABETICAL SORT FOR VALUES WITH SAME KEY
				$k = 0;
				$result = array();
				foreach ($frequency as $key => $value) {
					if ($iter == 0 || $currTag != $value) {
						$currTag = $value;
						$result[$k] = [];
						$k++;
					}

					$result[$k-1][] = $key;

					$iter++;
				}

				for ($i=0; $i < count($result); $i++) { 
					natcasesort($result[$i]);
				}

				for ($i=0; $i < count($result); $i++) { 
					foreach ($result[$i] as $key => $value) {
						echo "$value : $frequency[$value] times<br>";
					}
				}

				echo "<br>Most Frequent Tag: " . array_values($result[0])[0];;
			}
		?>
	</body>
</html>