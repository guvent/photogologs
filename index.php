<?php 

$site_title = "Photogologs";
$site_description = "Discovery Photos";

include "sys/init.php";

include "sys/engine/gads.php";

//var_dump($_SERVER);


if($kelime == "") {
	//echo "bos";
	include "sys/pages/layout/layout.php"; 
} elseif ($kelime == "www") {
	//echo "www";
	include "sys/pages/layout/layout.php"; 
} else {
	include "sys/pages/layout/layout.php"; 
}

//var_dump($kelime);
/* */

?>