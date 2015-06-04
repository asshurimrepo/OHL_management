<?php


function getParm($parmname,$default="") {
  $retval = $default;
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  	if (isset($_POST[$parmname]))
	   $retval = $_POST[$parmname];
	else if (isset($_GET[$parmname]))
		$retval = $_GET[$parmname];
  } else {
    if (isset($_GET[$parmname]))
	   $retval = $_GET[$parmname];
  }
  return $retval;
}

function getAllParm(){
$retval = "";
if (!isset($_GET["returl"])){
	foreach ($_GET as $key=>$value)
		$retval .= "&" . $key . "=" . $value;
}
else
	$retval = $_GET["returl"];
return $retval;
}

function getArrayParm($parmname,$default="") {
  $retval = $default;
  $i = 0;
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  	if (isset($_POST[$parmname][$i]))
		do {
		//$_POST[][$i];
		$retarrayval[] = $_POST[$parmname][$i];
		$i++;
		} while ($_POST[$parmname][$i]<>"");
  		   
	else if (isset($_GET[$parmname][$i]))
		do {
		//$_POST[][$i];
		$retval = $_GET[$parmname][$i];
		$i++;
		} while ($_GET[$parmname][$i]<>"");
  		   
  } else {
    if (isset($_GET[$parmname][$i]))
		do {
		//$_POST[][$i];
		$retarrayval[] = $_GET[$parmname][$i];
		$i++;
		} while ($_GET[$parmname][$i]<>"");
  }
  return $retarrayval;
}


?>