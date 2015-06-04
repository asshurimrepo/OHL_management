<?php 
session_start();
require_once("include/web.config.php");
require_once("include/ez_sql.php");
require_once("include/parmget.php");
require_once("include/users.php");
require_once("include/employees.php");

$empid = getParm('empid','');
$unamesearch = getParm('unamesearch','');
$count = 0;

$objuser = new users($db);
$objemployee = new employees($db);

if($empid){
	$is_used = $objemployee->checkemployee_username($empid,$unamesearch);
	if($is_used) {
		$count = 1;
	} else {
		$is_current = $objemployee->getemployee($empid);
		if(($is_current)&&($is_current->Username==$unamesearch)){
			$count = 2;
		}
	}
} elseif($unamesearch!=""){
	$count = count($objuser->getuserbyusername($unamesearch));
}
?>
<?=$count?>