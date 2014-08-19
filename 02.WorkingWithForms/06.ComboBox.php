<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<script src="scripts/combo.js"></script>
		<title>Combo Box</title>
		<style type="text/css">
			form {
				width: 410px;

			}
			input {
				display: block;
				margin: 10px auto;
				width: 120px;
				height: 30px;
			}
			select {
				width: 180px;
				margin-right: 20px;
				padding: 5px;
				font-size: 12pt;
			}
		</style>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<select name="continent" onchange="fillCombo()" id="continent">
				<option value="" disabled="" selected="" style="display:none;">-Choose Continent-</option>
				<option value="Europe">Europe</option>
				<option value="Asia">Asia</option>
				<option value="NorthAmerica">North America</option>
			</select>
			<select name="combo" id="combo">
			</select>
			<input type="submit" name="submit" value="Go">
			<?php 
				if (isset($_POST['submit'])) {
					if (isset($_POST['continent']) && $_POST['continent'] != "") {
						echo $_POST['continent'] . "<br>";
					}
					if (isset($_POST['combo']) && $_POST['combo'] != "") {
						echo $_POST['combo'];
					}
				}
			?>
		</form>
	</body>
</html>