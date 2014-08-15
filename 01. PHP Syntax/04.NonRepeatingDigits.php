<?php
	function isNonRepating($i) {
		$digits = array();
		while($i > 0) {
			$digits[] = $i%10;
			$i = (int)($i / 10);
		}

		for ($j=0; $j < count($digits); $j++) { 
			for ($k=$j+1; $k < count($digits); $k++) {
				if ($digits[$j] == $digits[$k]) {
					return false; 
				}
			}
		}

		return true;
	}

	function printAllNonRepeating($N) {
		if ($N >= 1000) {
			$max = 999;
		} else {
			$max = $N;
		}

		$noSuch = true;

		$nonRepating = array();

		for ($i=100; $i <= $max; $i++) { 
			if (isNonRepating($i)) {
				$nonRepating[] = $i;
				$noSuch = false;
			}
		}

		if ($noSuch) {
			echo "no";
		} else {
			foreach ($nonRepating as $key => $value) {
				if ($key != 0) {
					echo ", ";
				}

				echo "$value";
			}
		}
	}

	printAllNonRepeating(1234); echo "<br>"; echo "<br>";
	printAllNonRepeating(145); echo "<br>"; echo "<br>";
	printAllNonRepeating(15); echo "<br>"; echo "<br>"; 
	printAllNonRepeating(247); echo "<br>"; echo "<br>";
?>