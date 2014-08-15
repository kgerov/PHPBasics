<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Awesome Calendar</title>
		<style type="text/css">
			html {
				background-color: #B52735;
				color: #F5F1D8;
			}
			#wrapper {
				width: 965px;
				margin: 0 auto;
			}
			table {
				margin-right: 40px;
				margin-bottom: 40px;
				font-size: 16pt;
				display: inline-block;
				vertical-align: top;
			}
			table tr:nth-child(1) {
				text-align: center;
				font-weight: bold;
				font-family: Arial;
			}
			table tr:nth-child(2) td{
				border-bottom: 1px solid #F5F1D8;
			}
			table tr:nth-child(1) td {
				border-bottom: 1px solid #F5F1D8;
			}
			section h1 {
				text-align: center;
				font-size: 28pt;
				font-family: Arial;
			}
			#sunday {
				color: #5B9CA2;
			}
		</style>
	</head>
	<body>
		<?php 
			session_start();
			$year = $_SESSION['year'];
		?>
		<div id="wrapper">
			<section>
				<h1><?php echo $year; ?></h1>
			</section>
			<section>
				<?php 
					for ($i=1; $i <= 12; $i++) {
						$dateStr = $year . "-" . str_pad($i, 2, '0', STR_PAD_LEFT) . "-01";
						$date = new DateTime($dateStr);
						$maxDay = $date->format('t');
						$currDay = 1;
						$currWeekDay = 1;
						$dayOneWeekPos = $date->format('w');
						if ($dayOneWeekPos == 0) {
							$dayOneWeekPos = 7;
						}
						$isStart = false;
						$iters = 0;

						if ($i == 1 || $i == 5 || $i == 9) {
							?><div id="box"> <?php
						}
						?>
						<table>
							<tr>
								<td colspan="7"><?php echo $date->format('F'); ?></td>
							</tr>
							<tr>
								<td>Mo</td>
								<td>Tu</td>
								<td>We</td>
								<td>Th</td>
								<td>Fr</td>
								<td>Sa</td>
								<td id="sunday">Su</td>
							</tr>
						<?php
						while ($currDay <= $maxDay) {
							if ($iters % 7 == 0) {
								?> 
								<tr>
								<?php
							}
							if ($isStart == true || $currWeekDay == $dayOneWeekPos) {
								$isStart = true;
								?> 
								<td><?php echo $currDay; ?></td>
								<?php
								$currDay++;
							} else {
								$currWeekDay++;
								?>
								<td></td>
								<?php
							}
							if ($iters == 6 || $iters == 13 || $iters == 20 || $iters == 27 || $iters == 34) {
								?> 
								</tr>
								<?php
							}
							$iters++;
						}
						?> 
						</table>
						<?php
						if ($i % 4 == 0) {
							?> </div> <?php
						}
					}
				?>
			</section>
		</div>
	</body>
</html>