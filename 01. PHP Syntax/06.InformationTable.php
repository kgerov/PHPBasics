<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>HTML Tables</title>
		<style type="text/css">
			tr, td {
				border: 1px solid black;
				padding: 20px;
			}
			table {
				border-collapse: collapse;
				font-size: 16pt;
				font-family: Arial;
			}
			table tr:nth-child(1) {
				background: orange;
				font-weight: bold;
			}
		</style>
	</head>
	<body>
		<?php
			class Person {
				public $name;
				public $phone;
				public $age;
				public $address;

				public function __construct($name, $phone, $age, $address) {
					$this->name = $name;
					$this->phone = $phone;
					$this->age = $age;
					$this->address = $address;
				}
			}

			$gosho = new Person("Gosho", "0882-321-423", 24, "Hadji Dimitar");
			$pesho = new Person("Pesho", "0884-888-888", 67, "Suhata Reka");
			$info = array($gosho, $pesho); ?>
			<table>
				<tr>
					<td>Name</td>
					<td>Phone Number</td>
					<td>Age</td>
					<td>Address</td>
				</tr>
			<?php

			for ($i=0; $i < count($info); $i++) { 
				?><tr><?php
				foreach ($info[$i] as $key => $value) {
					?><td><?php echo $value; ?></td><?php
				}
				?></tr><?php
			}
		?>
		</table>
	</body>
</html>