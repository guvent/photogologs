<?php 

$url = $_SERVER["HTTP_HOST"];

$indexpath = str_replace("/index.php", "", $_SERVER["SCRIPT_FILENAME"]);

$kelime = "";

preg_match_all(@"/(.*?)([\.])/", $url, $subm);

if(count($subm)>0) {
	if(count($subm[1])>1) {
		$kelime = $subm[1][0];
	}
}

$kelimeler = ["moda", "hairsytle", "cars", "shoes", "bags", "women", "babies", "travels", "foot", "vine"];

if($kelime == "") {
    $kelime = $kelimeler[rand(0,9)];
}

if($kelime == "guven") {
    $kelime = $kelimeler[rand(0,9)];
}

$mainpage = "";

$iscontent = [];

preg_match(@"/(\/content\/?)([0-9]+?).html/", $_SERVER["PATH_INFO"], $iscontent);

switch ($_SERVER["PATH_INFO"]) {
	case "/about":
		$mainpage = "sys/pages/about.php";
		break;
	case "/contact":
		$mainpage = "sys/pages/contact.php";
		break;
	case "/blog":
		$mainpage = "sys/pages/blog.php";
		break;
	case "/privacy":
		$mainpage = "sys/pages/privacy.php";
		break;
	
	default:
		$mainpage = (count($iscontent)>0) ? "sys/pages/content.php" :"sys/pages/home.php";
		break;
}

 ?>