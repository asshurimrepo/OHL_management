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

$txtusername = getParm('txtusername','');
$txtpassword = getParm('txtpassword','');
$useraction = getParm('useraction','');
$reg_success = getParm('reg_success','');
$reg_message = "";
if($reg_success){
	$reg_message = "You're Registration was successful. Please Login below.";
}
$errormessage = "";

$users = new users($db);

switch($useraction) {
	
	case "login":
		if (($txtusername=="")||($txtpassword=="")) {
			$errormessage = "Invalid Username/Password.";
		} else if((!LogIn($txtusername,$txtpassword))) {
			$errormessage = "Invalid Username/Password.";
		} else {
			LogIn($txtusername,$txtpassword);
			$user = $users->getuser(getCurrentUserID());
			$userid = $user->UserID;
			$username = $user->Username;
			$isadmin = $user->isAdmin;
			header("location:index.php");

            break;
		}

        case "cancel":

        //echo "Cancecelled";
        $txtusername = "";
        $txtpassword = "";


}

    




   


if(isLoggedIn()) {
			//$user = $users->getuser(getCurrentUserID());
			//$userid = $user->UserID;
			//$username = $user->Username;
			//$isadmin = $user->isAdmin;
			header("location:index.php");
}

?>
<?php include("include/header.php"); ?>

		<?php if ($reg_message) { ?>
            <div class="my-alert alert fade in">
            	<button type="button" class="close" data-dismiss="alert">×</button>
                <h4>Congratulations! <?= $reg_message ?></h4>
            </div>
        <?php } ?>
        <div id="content">
            <div class="well login">
                <form id="loginform" name="loginform" method="post">
                    <input type="hidden" id="useraction" name="useraction" value="<?= @$useraction ?>" />
                    <table>
                        <tr>
                            <td>
                                <?php if ($errormessage) { ?>
                                <span style="color:red;"><?= $errormessage ?></span><br />
                                <?php } ?>
                                <label>Username: </label>
                                <input id="txtusername" name="txtusername"  type="text" placeholder="username" value="<?= @$txtusername ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Password: </label>
                                <input id="txtpassword" name="txtpassword" type="password" placeholder="password" value="<?= @$txtpassword ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                            	<br />
                                <input class="btn btn-large btn-block" id="submit_button" name="submit_button" type="submit" value="LOGIN" onClick="return setUserAction('login');">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    
<?php include("include/footer.php"); ?>