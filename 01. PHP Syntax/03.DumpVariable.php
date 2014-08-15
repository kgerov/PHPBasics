<?php 
	$var = "hello";
	if (is_numeric($var) == "integer") {
		var_dump($var);		
	} else {
		echo gettype($var);
	}
	echo "<br>";

	$var = 15;
	if (is_numeric($var) == "integer") {
		var_dump($var);		
	} else {
		echo gettype($var);
	}
	echo "<br>";

	$var = 1.234;
	if (is_numeric($var) == "integer") {
		var_dump($var);		
	} else {
		echo gettype($var);
	}
	echo "<br>";

	$var = array(1,2,3);
	if (is_numeric($var) == "integer") {
		var_dump($var);		
	} else {
		echo gettype($var);
	}
	echo "<br>";
	
	$var = (object)[2,34];
	if (is_numeric($var) == "integer") {
		var_dump($var);		
	} else {
		echo gettype($var);
	}
	echo "<br>";
?>