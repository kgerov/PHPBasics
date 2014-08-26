<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Sidebar Builder</title>
		<style type="text/css">
			.box {
				width: 250px;
				background-color: lightblue;
				padding: 20px;
				margin-bottom: 20px;
				text-align: center;
				border-radius: 15px;
			}
			.inner-box ul {
				text-align: left;
				font-size: 13pt;
			}
			form {
				margin-bottom: 20px;
			}
		</style>
	</head>
	<body>
		<form action="03.SidebarBuilder.php" method="post">
			<label>Categories:</label>
			<input type="text" name="categ"><br>
			<label>Tags:</label>
			<input type="text" name="tag"><br>
			<label>Months:</label>
			<input type="text" name="month"><br>
			<input type="submit" name="submit">
		</form>
		<?php
			function createBox($boxName, $arr) {
				?> 
					<div class="box">
						<div class="inner-box">
							<h2><?php echo "$boxName"; ?></h2>
							<hr>
						</div>
						<div class="inner-box">
							<ul>
							<?php 
								foreach ($arr as $key => $value) {
									?> 
										<li><?php echo "$value"; ?></li>
									<?php
								}
							?>
							</ul>
						</div>
					</div>
					<?php
			}

			if (isset($_POST['submit'])) {
				if ((!empty($_POST['categ'])) && (!empty($_POST['tag'])) && (!empty($_POST['month']))) {
					$categories = preg_split('/[, ]+/', $_POST['categ'],  0, PREG_SPLIT_NO_EMPTY);
					$tags = preg_split('/[, ]+/', $_POST['tag'],  0, PREG_SPLIT_NO_EMPTY);
					$months = preg_split('/[, ]+/', $_POST['month'],  0, PREG_SPLIT_NO_EMPTY);
					createBox("Categories", $categories);
					createBox("Tags", $tags);
					createBox("Months", $months);
				}
			}
		?>
	</body>
</html>