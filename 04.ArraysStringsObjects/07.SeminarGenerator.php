<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>SoftUni Seminars</title>
		<style type="text/css">
			textarea {
				width: 900px;
				height: 500px;
			}
			table {
				font-family: Calibri;
				font-size: 14pt;
				border-collapse: collapse;
			}
			tr, td {
				border: 1px solid #F3F3F3;
				padding: 5px 15px;
			}
			tr td:nth-child(1){
				text-decoration: underline;
			}
			tr:nth-child(1) td:nth-child(1){
				text-decoration: none;
			}
			tr:nth-child(1) {
				background-color: #234465;
				color: white;
				font-weight: bold;
				text-decoration: none;
			}
			tr:nth-child(even) {
				background-color: #E2E2E2;
			}
			.pop-up {
				position: absolute;
				width: 250px;
				background-color: white;
				border: 1px solid #2C2C2C;
				padding: 3px;
				font-size: 12pt;
				font-family: Calibri;
				visibility: hidden;
			}
			.pop-up span {
				text-decoration: underline;
				font-weight: bold;
			}
			button {
				background: none;
				background-color: #FF9C00;
				border: 1px solid #422300;
				color: white;
				font-family: Helvetica;
				font-size: 12pt;
				padding: 5px;
				text-align: center;
				font-weight: bold;
			}
			tr td:nth-child(1):hover {
				color: red;
			}
			tr:nth-child(1) td:nth-child(1):hover {
				color: white;
			}
		</style>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="form">
			<textarea name="seminarInfo"></textarea><br>
			<label>Sort By: </label>
			<select name="sort">
				<option value="name">Name</option>
				<option value="date">Date</option>
			</select>
			<label>Order By: </label>
			<select name="order">
				<option value="asc">Ascending</option>
				<option value="desc">Descending</option>
			</select>
			<input type="submit" name="submit" value="Sumbit">
		</form>
		<?php
			function compareName($a, $b) {
				return strcmp($a->semName, $b->semName);
			}

			function compareDate($a, $b) {
				if ($a->date == $b->date) {
				        return 0;
				    }
				    return (strtotime($a->date) < strtotime($b->date)) ? -1 : 1;
			}

			class Seminar
			{
				public $semName;
				public $lecturer;
				public $date;
				public $description;

				public function __construct($semName, $lecturer, $date, $description)
				{
					$this->semName = $semName;
					$this->lecturer = $lecturer;
					$this->date = $date;
					$this->description = $description;
				}
			}
			if (isset($_POST['submit'])) {
				if (!empty($_POST['seminarInfo'])) {
					$seminarInfo = nl2br($_POST['seminarInfo']);
					$sort = $_POST['sort'];
					$order = $_POST['order'];
					?><script type="text/javascript">document.getElementById('form').style.display = "none";</script><?php

					$seminarLine = preg_split('/\n/', $seminarInfo);
					$seminars = array();
					foreach ($seminarLine as $key => $value) {
						$semName = "";
						$lecturer = "";
						$date = "";
						$description = "";
						$i=0;
						for (; $i < strlen($value); $i++) { 
							if ($value[$i] == "-") {
								$i++;
								break;
							}
							$semName .= $value[$i];
						}

						for (; $i < strlen($value); $i++) { 
							if ($value[$i] == "-") {
								$i++;
								break;
							}
							$lecturer .= $value[$i];
						}

						for (; $i < strlen($value); $i++) { 
							if (!preg_match('/[ 0-9:-]+/', $value[$i])) {
								break;
							}
							$date .= $value[$i];
						}

						for (; $i < strlen($value); $i++) { 
							if ($value[$i] == "<" && $value[$i+1] == "b" && $value[$i+2] == "r") {
								break;
							}
							$description .= $value[$i];
						}

						$currSem = new Seminar($semName, $lecturer, $date, $description);
						if ($currSem->semName != "") {
							$seminars[] = $currSem;
						}
					}
					if ($sort == "date") {
						usort($seminars, "compareDate");
					} else {
						usort($seminars, "compareName");
					}

					if ($order == "desc") {
						$seminars = array_reverse($seminars);
					}
					?>
					<table>
						<tr>
							<td>Seminar name</td>
							<td>Date</td>
							<td>Participate</td>
						</tr>
					<?php
					$idCount = 0;
					foreach ($seminars as $key => $value) {
						$idCount++;
						?>
							<tr onmouseover="show(this)" onmouseout="hide(this)" id="<?php echo $idCount; ?>">
								<td><?php echo $value->semName; ?></td>
								<td><?php echo $value->date; ?></td>
								<td><button onclick="semSelection()">SIGN UP</button></td>
								<div class="pop-up" id="<?php echo $idCount; ?>"><span>Lecturer:</span><?php echo " " . $value->lecturer; ?><br><span>Details:</span><?php echo " " . $value->description; ?></div>
							</tr>
						<?php
					}
					?></table><?php
				} else {
					echo "Invalid input";
				}
			}
		?>
		<script type="text/javascript">
			function show(x) {
				var y = x.id;
				document.getElementById(y).style.visibility = "visible";
			}

			function hide(x) {
				var y = x.id;
				document.getElementById(y).style.visibility = "hidden";
			}

			function semSelection() {
				alert('You signed up');
			}

			var rows = document.querySelectorAll("body > table > tbody > tr");
			var divs = document.querySelectorAll("body div");

			for (var i = 0; i < rows.length; i++) {
				var rect = rows[i].getBoundingClientRect();
				var tops = rect.bottom + 55;
				var left = rect.right - 380;
				divs[i].style.left = left + "px";
				divs[i].style.top = tops + "px";
			}
		</script>
	</body>
</html>