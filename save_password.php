<?php 
session_start();
require_once("include/web.config.php");
require_once("include/ez_sql.php");
require_once("include/parmget.php");
require_once("include/users.php");

$userid = getParm('userid','');
$oldpassword = getParm('oldpassword','');
$newpassword = getParm('newpassword','');
$useraction = getParm('useraction','');

$objuser = new users($db);
$success = 0;

switch($useraction) {
	
	case "save_pass":
		
		$dbpassword = $objuser->getuser($userid)->Password;
		$oldpassword = md5($oldpassword);
		
		if($oldpassword==$dbpassword) {
			$success = $objuser->resetPassword($userid,$newpassword);
		}		
}
//echo "Your Employee ID is: ".$empid." and your rate is: ".$txtrate." and your useraction is: ".$useraction;
?>
                                    
<?php if ($success) { ?>
	<div class="my-alert alert alert-success fade in">
    	<button type="button" class="close" data-dismiss="alert">×</button>
		Your Password has been successfully changed.
    </div>
<?php } else { ?>
	<div class="my-alert alert alert-error fade in">
    	<button type="button" class="close" data-dismiss="alert">×</button>
    	Password change failed. Invalid Password.
    </div>
<?php } ?>