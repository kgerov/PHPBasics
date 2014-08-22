<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="">
		<title>Modify String</title>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<input type="text" name="string"/>
			<input type="radio" name="strMod" value="palindrome">
			<label>Check Palindrome</label>
			<input type="radio" name="strMod" value="reverse">
			<label>Reverse String</label>
			<input type="radio" name="strMod" value="split">
			<label>Split</label>
			<input type="radio" name="strMod" value="hash">
			<label>Hash String</label>
			<input type="radio" name="strMod" value="shuffle">
			<label>Shuffle String</label>
			<input type="submit" name="submit">
		</form>
		<?php 
			if (isset($_POST['submit'])) {
				if ((!empty($_POST['string'])) && isset($_POST['strMod'])) {
					$string = $_POST['string'];
					$strMod = $_POST['strMod'];

					if ($strMod == "palindrome") {
						$string1 = strtolower(preg_replace("/[^A-Za-z0-9]/","",$string));
						$chars = preg_split('//', $string1, -1, PREG_SPLIT_NO_EMPTY);
						$chars = array_reverse($chars);
						$chars = implode("", $chars);
						if ($chars == $string1) {
							echo "$string is a Palindrome";
						} else {
							echo "$string is not a Palindrome";
						}

					} else if($strMod == "reverse") {
						echo strrev($string);

					} else if($strMod == "split") {
						$chars = preg_split('//', $string, -1, PREG_SPLIT_NO_EMPTY);
						foreach ($chars as $key => $value) {
							echo "$value ";
						}
						
					} else if($strMod == "hash") {
						echo crypt($string);
					} else {
						echo str_shuffle($string);
					}

				} else {
					die("Invalid Input");
				}
			}
		?>
	</body>
</html>