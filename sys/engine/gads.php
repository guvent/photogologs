<?php 

$gads_enable = false;

$adsensejs = "";
$adsensecss = "";
$analytics = "";
$adsense1 = "";
$adsense2 = "";
$adsense3 = "";
$adsense4 = "";

$adspath = $indexpath . "/sys/engine/gads/" . $_SERVER["HTTP_HOST"] . ".php";

if (file_exists($adspath)) {
	include $adspath;
}

 ?>