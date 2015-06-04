<?php 
session_start();
require_once("include/web.config.php");
require_once("include/ez_sql.php");
require_once("include/parmget.php");
require_once("include/users.php");

$userid = getParm('userid','');
$message = "";

?>
                                <span id="lblErrPass" class="error"></span></div>
                                <div id="alert" style="display:none;"></div>
	                        	<form id="passform" name="passform" method="post">
               						<input type="hidden" id="userid" name="userid" value="<?= $userid ?>" />
                                	<table>
                                    	<tr>
                                        	<td>
                                    			<label class="pull-left">Old Password: </label>
                                            </td>
                                            <td>
                                    			<input id="oldpassword" name="oldpassword" type="password" />
                                            </td>
                                        </tr>
                                        <tr>
                                        	<td>
                                    			<label class="pull-left">New Password: </label>
                                            </td>
                                            <td>
                                   				<input id="newpassword" name="newpassword" type="password" />
                                            </td>
                                        </tr>
                                        <tr>
                                        	<td>
                                    			<label class="pull-left">Confirm Password: </label>
                                            </td>
                                            <td>
                                    			<input id="cnewpassword" name="cnewpassword" type="password" />
                                            </td>
                                        </tr>
                                    </table>
	                            </form>
