<?php 
	$dateStr = date("Y-m") . "-01";
	$date = new DateTime($dateStr);
	while($date->format('n') < (date("n")+1)) {
		if ($date->format('w') == 0) { ?>
			<h1>
				<?php echo $date->format('jS F, Y'); ?>
			</h1><?php
		}
		$date->modify('+1 day');
	}
?>