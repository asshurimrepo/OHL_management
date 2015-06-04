<?php 
session_start();
require_once("include/web.config.php");
require_once("include/ez_sql.php");
require_once("include/parmget.php");
require_once("include/authentication.php");
require_once("include/users.php");
/*require_once("include/employees.php");
require_once("include/rates.php");
require_once("include/departments.php");
require_once("include/attendance.php");*/

date_default_timezone_set("Asia/Singapore");

$useraction = getParm('useraction','');
switch($useraction) {
	
	case "logout":
		LogOut();	
		header("location: login.php");	

}

$isadmin = 0;

if(isLoggedIn()) {
	$users = new users($db);
	//$employees = new employees($db);
	$user = $users->getuser(getCurrentUserID());
	$userid = $user->UserID;
	$username = $user->Username;
	$isadmin = $user->isAdmin;
	if($isadmin){
		$firstname = $username;
	} /*else {
		$employee = $employees->getemployeebyusername($username);
		$firstname = $employee->FirstName; //this is just for display
		$empid = $employee->EmpID;
		$userid = $employee->UserID;
		$username = $employee->Username;
		$depid = $employee->DepID;
		$fname = urlencode($employee->FirstName);
		$lname = urlencode($employee->LastName);
		$rateid = $employee->RateID;
		$gender = $employee->Gender;
		$email = $employee->Email;
		$contact = $employee->ContactNo;
	}*/

} else {
	header("location:login.php");
}

$jd=cal_to_jd(CAL_GREGORIAN,date("m"),date("d"),date("Y"));
$monthname = jdmonthname($jd,1);
$dayname = jddayofweek($jd,2);
$completedatename = $dayname.", ".$monthname." ".date('d').", ".date('Y');

?>
<?php include("include/header.php"); ?>

		<form id="frmuser" name="frmuser" method="post" action="index.php">
			<input type="hidden" id="useraction" name="useraction" value="<?= @$useraction ?>" />
			<input type="hidden" id="isadmin" name="isadmin" value="<?= @$isadmin ?>" />
		</form>
		<div class="alert alert-info" style="margin-top:20px;">
			Welcome <?= $firstname ?>. <span class="pull-right"><?=$completedatename?></span>
		</div>

		<div class="alert notif" style="display:none;">Notification Area</div>

		<?php include 'include/db_func.php'; alerts(); ?>

        <?php if($isadmin){ 

			include("admincontent.php");
		
		} else {

			/*include("usercontent.php");*/
		
		} ?>
 

<!-- Added by Ash.. Dynamic Delete Modal -->
<div class="modal hide fade" id="deleteConfirm" style="margin-top: -205px;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Delete Confirmation</h3>
    </div> 

    <div style="padding:10px;">
    	<div class="alert"><i class="icon-question-sign icon-white"></i> Are you sure you want to delete this record?<br>
        <i class="icon-exclamation-sign icon-white"></i> This action cannot be undone.</div>
    </div>
    
    <div class="modal-footer">
        <a type="submit" class="btn btn-inverse del-link">Delete</a>
        <input type="button" class="btn btn-inverse" data-dismiss="modal" value="Close"/>
    </div>
</div>

<?php include("include/footer.php"); ?>