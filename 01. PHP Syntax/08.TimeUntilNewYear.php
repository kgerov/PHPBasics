<?php
$url=$_SERVER['REQUEST_URI'];
header("Refresh: 1; URL=$url");

$currDate1 = date("d-m-Y G:i:s");
$newYear = "2015-01-01 00:00:00";

$diff = abs(strtotime($newYear) - strtotime($currDate1));
$diff -= 3600; //SUMMER TIME

echo "Hours until  new year : " . (floor($diff/3600)) . "<br>";
echo "Minutes until  new year : " . (floor($diff/60)) . "<br>";
echo "Seconds until  new year : " . (floor($diff)) . "<br>";
$days = floor($diff/(3600*24));
$hours = floor(($diff - $days*3600*24) / 3600);
$minutes = floor(($diff - ($days*3600*24) - ($hours*3600))/60);
$seconds = floor(($diff - ($days*3600*24) - ($hours*3600) - $minutes*60));
echo "Days:Hours:Minutes:Seconds : $days:". str_pad($hours, 2, '0', STR_PAD_LEFT) . ":" . str_pad($minutes, 2, '0', STR_PAD_LEFT) . ":" . str_pad($seconds, 2, '0', STR_PAD_LEFT);
?>