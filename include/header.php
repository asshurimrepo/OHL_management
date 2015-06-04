<?php include("include/head.html.php"); ?>
<body>
	<div id="container" class="container">
		<div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<h3 class="align-left" style=" margin-left: 285px; "><center>OHL TRADING INCORPORATED</center></h3>
                <?php if(isLoggedIn()) { ?>
                <div class="nav-collapse subnav-collapse">
                    <ul class="nav pull-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding:20px;"><i class="icon-user icon-white"></i> <?= $firstname ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <?php if ((isUserAdmin()&&$username!='admin')||$isadmin==0) { ?>
                                <li><a href="edit_employee.php?empid=<?=$empid?>&userid=<?=$userid?>&txtusername=<?=$username?>&txtdepartment=<?=$depid?>&txtfname=<?=$fname?>&txtlname=<?=$lname?>&txtrate=<?=$rateid?>&txtgender=<?=$gender?>&txtemail=<?=$email?>&txtcontactno=<?=$contact?>" data-toggle="modal" data-target="#editModal"><i class="icon-pencil"></i> Edit Profile</a></li>
                                <?php } ?>
                                <li><a href="edit_password.php?userid=<?=$userid?>" data-toggle="modal" data-target="#editPassModal"><i class="icon-lock"></i> Change Password</a></li>
                                <li class="divider"></li>
                                <li><a href="#" onClick="return setUserAction('logout');"><i class="icon-ban-circle"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?php } ?>
			</div>
		</div>
