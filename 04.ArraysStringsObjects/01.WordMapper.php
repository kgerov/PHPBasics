<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>World Mapper</title>
		<style type="text/css">
			form {
				margin-bottom: 20px;
			}
			table {
				border-collapse: collapse;
				font-family: Arial;
				font-size: 14pt;
			}
			tr, td {
				border: 1px solid black;
				background-color: lightyellow;
				padding: 15px;
			}
		</style>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<textarea name="text"></textarea><br>
			<input type="submit" name="submit" value="Count Words">
		</form>
		<?php
			if (isset($_POST['submit'])) {
				if (!empty($_POST['text'])) {
					$text = strtolower($_POST['text']);
					preg_match_all('/\b\w+\b/', $text, $words, PREG_SET_ORDER);
					$wordCount = array();
					foreach ($words as $key => $value) {
						if (array_key_exists($value[0], $wordCount)) {
							$wordCount[$value[0]] ++;
						} else {
							$wordCount[$value[0]] = 1;
						}
					}
					?>
					<table>
						<?php 
							foreach ($wordCount as $key => $value) {
								?> 
									<tr>
										<td><?php echo "$key"; ?></td>
										<td><?php echo "$value"; ?></td>
									</tr>
								<?php
							}
						?>
					</table>
					<?php
				} else {
					die("Invalid Input");
				}
			}
		?>
	</body>
</html>