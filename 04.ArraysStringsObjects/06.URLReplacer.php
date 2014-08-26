<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="">
		<title>URL Replacer</title>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<textarea name="htmlDoc"></textarea><br>
			<input type="submit" name="submit" value="Sumbit">
		</form>
		<?php 
			if (isset($_POST['submit'])) {
				if (!empty($_POST['htmlDoc'])) {
					$htmlDoc = $_POST['htmlDoc'];
					$patterns[0] = '/<\/a>/';
					$replacements[0] = '[/URL]';
					$htmlDoc = preg_replace($patterns, $replacements, $htmlDoc);

					$pattern = '/<a\s+href\s*="(.+?)">(.+?)\[\/URL\]/';
					$replacement = '[URL=\1]\2[/URL]';
					echo htmlentities(preg_replace($pattern, $replacement, $htmlDoc));
				} else {
					die("Invalid Input");
				}
			}
		?>
	</body>
</html>