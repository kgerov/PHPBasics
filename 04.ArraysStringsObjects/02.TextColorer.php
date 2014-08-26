<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Text Colorer</title>
		<style type="text/css">
			.red {
				color: red;
			}
			.blue {
				color: blue;
			}
			span {
				margin-right: 10px;
				font-size: 16pt;
			}
			form {
				margin-bottom: 20px;
			}
		</style>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<textarea name="text"></textarea><br>
			<input type="submit" name="submit" value="Color Text">
		</form>
		<?php
			if (isset($_POST['submit'])) {
				if (!empty($_POST['text'])) {
					$text = $_POST['text'];
					preg_match_all('/[^ \t\n]/', $text, $letters, PREG_SET_ORDER);
					
					foreach ($letters as $key => $value) {
						if (ord($value[0])%2 == 0) {
							?><span class="red"><?php echo $value[0]; ?></span><?php
						} else {
							?><span class="blue"><?php echo $value[0]; ?></span><?php
						}
					}
				} else {
					die("Invalid Input");
				}
			}
		?>
	</body>
</html>