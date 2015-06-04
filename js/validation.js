function requiredFieldValidator() {
	
	var unamecheck  = document.getElementById('unamecheck');
	var txtusername  = document.getElementById('txtusername');
	var txtpassword  = document.getElementById('txtpassword');
	var txtfname = document.getElementById('txtfname');
	var txtlname = document.getElementById('txtlname');
	var txtdepartment = document.getElementById('txtdepartment');
	var txtgender  = document.getElementById('txtgender');
	var txtemail = document.getElementById('txtemail');
	var txtcontactno = document.getElementById('txtcontactno');
	
	var reEmail = new RegExp('[\\w\\.-]+(\\+[\\w-]*)?@([\\w-]+\\.)+[\\w-]+');
	var valid = true;
	
	if (unamecheck.value == 1) {
		valid = false;
	}
	
	if (txtusername.value == '') {
		document.getElementById('lblErrUname').innerHTML = ' Username is required.';
		valid = false;
	} else 
		document.getElementById('lblErrUname').innerHTML = '';

	if (txtpassword.value == '') {
		document.getElementById('lblErrPword').innerHTML = ' Password is required.';
		valid = false;
	} else 
		document.getElementById('lblErrPword').innerHTML = '';

	if (txtdepartment.value == '') {
		document.getElementById('lblErrDep').innerHTML = ' Department is required.';
		valid = false;
	} else 
		document.getElementById('lblErrDep').innerHTML = '';

	if (txtfname.value == '') {
		document.getElementById('lblErrFName').innerHTML = ' Firstname is required.';
		valid = false;
	} else 
		document.getElementById('lblErrFName').innerHTML = '';

	if (txtlname.value == '') {
		document.getElementById('lblErrLName').innerHTML = ' Lastname is required.';
		valid = false;
	} else 
		document.getElementById('lblErrLName').innerHTML = '';

	if (txtgender.value == '') {
		document.getElementById('lblErrGender').innerHTML = ' Gender is required.';
		valid = false;
	} else 
		document.getElementById('lblErrGender').innerHTML = '';

	if (txtemail.value == '') {
		document.getElementById('lblErrEmail').innerHTML = ' Email is required.';
		valid = false;
	} else {
		document.getElementById('lblErrEmail').innerHTML = '';
		var txtemailvalue = txtemail.value;	
		if (!txtemailvalue.match(reEmail)){
			valid = false;
			document.getElementById('lblErrEmail').innerHTML = ' Email must be valid.';
		}
	}
		
	if (txtcontactno.value == '') {
		document.getElementById('lblErrContact').innerHTML = ' Contact number is required.';
		valid = false;
	} else 
		document.getElementById('lblErrContact').innerHTML = '';

	return valid;
}

function requiredRateValidator() {
	
	var txtrate = document.getElementById('txtrate');
	
	var valid = true;
	
	if (txtrate.value == '') {
		document.getElementById('lblErrRate').innerHTML = "<div class=\"well well-small\"> Please select a rate.</div>";
		valid = false;
	} else 
		document.getElementById('lblErrRate').innerHTML = "";

	return valid;
}

function requiredChangePasswordValidator() {
	
	var oldpassword = document.getElementById('oldpassword').value;
	var newpassword = document.getElementById('newpassword').value;
	var cnewpassword = document.getElementById('cnewpassword').value;
	
	var valid = true;
	
	if (oldpassword == ''||newpassword == ''||cnewpassword == '') {
		document.getElementById('lblErrPass').innerHTML = "<div class=\"well well-small\"> Please Fill in all the fields.</div>";
		valid = false;
	} else if(newpassword!=cnewpassword) {
		document.getElementById('lblErrPass').innerHTML = "<div class=\"well well-small\"> Confirmation Password doesn't match.</div>";
		valid = false;
	} else {
		document.getElementById('lblErrPass').innerHTML = "";
	}
	
	return valid;
}

function requiredEditFieldValidator() {
	
	var unamecheck  = document.getElementById('unamecheck');
	var txtusername  = document.getElementById('txtusername');
	var txtfname = document.getElementById('txtfname');
	var txtlname = document.getElementById('txtlname');
	var txtdepartment = document.getElementById('txtdepartment');
	var txtgender  = document.getElementById('txtgender');
	var txtemail = document.getElementById('txtemail');
	var txtcontactno = document.getElementById('txtcontactno');
	
	var reEmail = new RegExp('[\\w\\.-]+(\\+[\\w-]*)?@([\\w-]+\\.)+[\\w-]+');
	var valid = true;
	
	if (unamecheck.value == 1) {
		valid = false;
	}
	
	if (txtusername.value == '') {
		document.getElementById('lblErrUname').innerHTML = ' Username is required.';
		valid = false;
	} else 
		document.getElementById('lblErrUname').innerHTML = '';

	if (txtdepartment.value == '') {
		document.getElementById('lblErrDep').innerHTML = ' Department is required.';
		valid = false;
	} else 
		document.getElementById('lblErrDep').innerHTML = '';

	if (txtfname.value == '') {
		document.getElementById('lblErrFName').innerHTML = ' Firstname is required.';
		valid = false;
	} else 
		document.getElementById('lblErrFName').innerHTML = '';

	if (txtlname.value == '') {
		document.getElementById('lblErrLName').innerHTML = ' Lastname is required.';
		valid = false;
	} else 
		document.getElementById('lblErrLName').innerHTML = '';

	if (txtgender.value == '') {
		document.getElementById('lblErrGender').innerHTML = ' Gender is required.';
		valid = false;
	} else 
		document.getElementById('lblErrGender').innerHTML = '';

	if (txtemail.value == '') {
		document.getElementById('lblErrEmail').innerHTML = ' Email is required.';
		valid = false;
	} else {
		document.getElementById('lblErrEmail').innerHTML = '';
		var txtemailvalue = txtemail.value;	
		if (!txtemailvalue.match(reEmail)){
			valid = false;
			document.getElementById('lblErrEmail').innerHTML = ' Email must be valid.';
		}
	}
		
	if (txtcontactno.value == '') {
		document.getElementById('lblErrContact').innerHTML = ' Contact number is required.';
		valid = false;
	} else 
		document.getElementById('lblErrContact').innerHTML = '';

	return valid;
}

function setUserAction(mode,second_mode) {
	
	var loginform = document.getElementById('loginform');
	var frmuser = document.getElementById('frmuser');
	var regform = document.getElementById('regform');
	var useraction = document.getElementById('useraction');
	var rateform = document.getElementById('rateform');
	var datepickerform = document.getElementById('datepicker-form');

	switch (mode) {

		case 'login':

			useraction.value = mode;
			loginform.submit();
			
			break;
			
		case 'register':

			if(requiredFieldValidator()){
				useraction.value = mode;
				regform.submit();
			}
			break;
			
		case 'cancel':

			useraction.value = mode;
			regform.submit();
			//loginform.reset();

			break;
			
		case 'saverate':

			if(requiredRateValidator()){
				var empid = document.getElementById('empid').value;
				var txtrate = document.getElementById('txtrate').value;
				saveEmpRate(empid,txtrate,mode);
			}
			break;
			
		case 'save_pass':

			if(requiredChangePasswordValidator()){
				var userid = document.getElementById('userid').value;
				var oldpassword = document.getElementById('oldpassword').value;
				var newpassword = document.getElementById('newpassword').value;
				savePassword(userid,oldpassword,newpassword,mode);
			}
			break;
			
		case 'delete_emp':

			var empid = document.getElementById('empid').value;
			deleteEmployee(empid,mode);

			break;
			
		case 'add_emp':

			if(requiredFieldValidator()){
				var txtusername = document.getElementById('txtusername').value;
				var txtpassword = document.getElementById('txtpassword').value;
				var txtdepartment = document.getElementById('txtdepartment').value;
				var txtfname = document.getElementById('txtfname').value;
				var txtlname = document.getElementById('txtlname').value;
				var txtrate = document.getElementById('txtrate').value;
				var txtgender  = document.getElementById('txtgender').value;
				var txtemail = document.getElementById('txtemail').value;
				var txtcontactno = document.getElementById('txtcontactno').value;
				saveAddEmployee(mode,txtusername,txtpassword,txtdepartment,txtfname,txtlname,txtrate,txtgender,txtemail,txtcontactno);
			}
			break;
			
		case 'edit_emp':

			if(requiredEditFieldValidator()){
				var empid = document.getElementById('empid').value;
				var userid = document.getElementById('userid').value;
				var txtusername = document.getElementById('txtusername').value;
				var txtdepartment = document.getElementById('txtdepartment').value;
				var txtfname = document.getElementById('txtfname').value;
				var txtlname = document.getElementById('txtlname').value;
				var txtrate = document.getElementById('txtrate').value;
				var txtgender  = document.getElementById('txtgender').value;
				var txtemail = document.getElementById('txtemail').value;
				var txtcontactno = document.getElementById('txtcontactno').value;
				//var txtisadmin = document.getElementById('txtisadmin').value;
				saveEditEmployee(empid,userid,mode,txtusername,txtdepartment,txtfname,txtlname,txtrate,txtgender,txtemail,txtcontactno);
			}
			break;
			
		case 'add_emp_benefit':
		
			var empid = document.getElementById('empid').value;
			var amount = document.getElementById('txtamount').value;
			var benefit = document.getElementById('txtbenefit').value;

			saveEmployeeBenefit(empid,amount,benefit,mode);
			break;
			
		case 'update_emp_benefit':
		
			for(var i=0;i<second_mode.length;i++) {
				//alert(i);
				if($("#row-"+second_mode[i]).hasClass("active")){
					var benid = document.getElementById('benid-'+second_mode[i]).value;
					var markdelete = document.getElementById("markdelete-"+second_mode[i]).value;
					var isactive = document.getElementById('isactive-'+second_mode[i]).value;
					var amount = document.getElementById('txtamount-'+second_mode[i]).value;
					var benefit = document.getElementById('txtbenefit-'+second_mode[i]).value;
		
					saveUpdateEmployeeBenefit(benid,amount,benefit,isactive,markdelete,mode);
				}
			}

			break;
			
		case 'closeRefresh':

			$("#addRateModal,#addModal,#editModal,#deleteModal").on("hidden",function() {
				employeeSearchRefresh();
			});

			break;
			
		case 'closeUserRefresh':

			ProfileRefresh();

			break;
			
		case 'closeRefreshBenefits':

			$("#benefitsModal").on("hidden",function() {
				employeeBenSearchRefresh();
			});
			break;
			
		case 'logout':

			useraction.value = mode;
			frmuser.submit();

			break;
			
	}
	
	return false;

}