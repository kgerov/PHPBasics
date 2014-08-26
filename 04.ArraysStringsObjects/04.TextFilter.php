<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Text FIlter</title>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<textarea name="text"></textarea><br>
			<input type="text" name="ban">
			<input type="submit" name="submit" value="Sumbit">
		</form>
		<?php
			function replaceStar($matches) {
				return str_repeat("*", mb_strlen($matches[0]));
			}

			if (isset($_POST['submit'])) {
				if (!empty($_POST['text'])) {
					$text = $_POST['text'];
					$ban = preg_split('/[, ]/', $_POST['ban'], 0, PREG_SPLIT_NO_EMPTY);

					foreach ($ban as $key => $value) {
						$text =  preg_replace_callback('/\b(' . $value . ')\b/', 'replaceStar', $text);
					}

					echo "<p>$text<p/>";
				} else {
					die("Invalid Input");
				}
			}
		?>
	</body>
</html>