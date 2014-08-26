<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Sentence Extractor</title>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<textarea name="text"></textarea><br>
			<input type="text" name="word">
			<input type="submit" name="submit" value="Sumbit">
		</form>
		<?php
			if (isset($_POST['submit'])) {
				if (!empty($_POST['text'])) {
					$text = $_POST['text'];
					$word = $_POST['word'];
					$sentences = preg_split('/(?<=[.?!])\s+/', $text, 0, PREG_SPLIT_NO_EMPTY);

			        foreach ($sentences as $sentence) {
			            if (preg_match('/\b'. $word .'\b(.*)[.?!]/', $sentence)) {
			                echo "<p>$sentence</p>";
			            }
			        }
				} else {
					die("Invalid Input");
				}
			}
		?>
	</body>
</html>