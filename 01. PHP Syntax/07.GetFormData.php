<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Forms</title>
		<style type="text/css">
			input {
				display: block;
				margin-bottom: 10px;

			}
			input[type=radio] {
				display: inline-block;
			}
			form {
				margin-bottom: 20px;
			}
			input[type=submit] {
				border : solid 2px #db25db;
				border-radius : 0px 12px 0px 13px ;
				font-size : 20px;
				color : #ffffff;
				padding : 1px 10px;
				background-color : #e332e3;	
				outline: none;
			}
		</style>
	</head>
	<body>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<input type="text" placeholder="Name..." name="name" required="required"/>
			<input type="number" placeholder="Age..." name="age" required="required"/>
			<label for="male">Male</label>
			<input type="radio" name="sex" value="male" id="male" />
			<label for="female">Female</label>
			<input type="radio" name="sex" value="female" id="female" />
			<input type="submit" value="Get Result" name="submit" />
		</form>
		<?php 
			if (isset($_POST['submit'])) {
				$name = $_POST['name'];
				$age = $_POST['age'];
				if (!isset($_POST['sex'])) {
					$sex = "no info";
				} else {
					$sex = $_POST['sex'];
				}
				echo "My name is $name. I am $age years old. ";
				if ($sex != "no info") {
					echo "I am $sex";
				}
			}
		?>
	</body>
</html>