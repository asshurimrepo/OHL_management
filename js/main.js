function doSearchByTextBox(txtusername)
{
	var xmlhttp;
	var returntext="";
	var empid = document.getElementById('empid').value;
	
	if (txtusername.length==0)
	  { 
		  document.getElementById("unamesearchresult").innerHTML="";
		  document.getElementById("unamesearchresult").style.display="none";
		  document.getElementById('lblErrUname').style.display="inline-block";
		  return;
	  }
	  
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		  document.getElementById("unamesearchresult").style.display="inline-block";
		  document.getElementById('lblErrUname').style.display="none";
		  if (txtusername.length<5)
		  { 
			  returntext = "<li class=\"icon-exclamation-sign icon-white\"></li>  <b class=\"warning\">Should be atleast 5 characters.</b>";
			  document.getElementById('unamecheck').value = 1;
		  } else {
			  if (xmlhttp.responseText == 0) {
				  returntext = "<li class=\"icon-ok icon-white\"></li>  <b class=\"success\">Username is available</b>";
			  } else if (xmlhttp.responseText == 1) {
				  returntext = "<li class=\"icon-ban-circle icon-white\"></li>  <b class=\"error\">Username is taken</b>";
			  }
			  document.getElementById('unamecheck').value = xmlhttp.responseText;
		  }
		  document.getElementById("unamesearchresult").innerHTML=returntext;
		}
	  };
	  
	xmlhttp.open("POST","checkusername.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("empid="+empid+"&unamesearch="+txtusername);
	
}

function employeeDepSearch(department)
{
	var xmlhttp;
	var employeename = document.getElementById("employeename").value;

	/*if (msearch.length==0)
	  { 
	  document.getElementById("my_results").innerHTML="";
	  return;
	  }*/
	  
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("searchresult").innerHTML=xmlhttp.responseText;
		} else {
			document.getElementById("searchresult").innerHTML='<div class="progress progress-striped active"><div class="bar" style="width: 100%;"></div></div>';
		}
	  }
	  
	xmlhttp.open("POST","searchEmployee.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("department="+department+"&employeename="+employeename+"&page="+1);
	
}

function employeeSearch(employeename)
{
	var xmlhttp;
	var department = document.getElementById("department").value;

	/*if (msearch.length==0)
	  { 
	  document.getElementById("my_results").innerHTML="";
	  return;
	  }*/
	  
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("searchresult").innerHTML=xmlhttp.responseText;
		} else {
			document.getElementById("searchresult").innerHTML='<div class="progress progress-striped active"><div class="bar" style="width: 100%;"></div></div>';
		}
	  }
	  
	xmlhttp.open("POST","searchEmployee.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("employeename="+employeename+"&department="+department+"&page="+1);
	
}

function employeeSearchRefresh()
{
	var xmlhttp;
	var employeename = document.getElementById("employeename").value;
	var department = document.getElementById("department").value;

	/*if (msearch.length==0)
	  { 
	  document.getElementById("my_results").innerHTML="";
	  return;
	  }*/
	  
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("searchresult").innerHTML=xmlhttp.responseText;
		} else {
			document.getElementById("searchresult").innerHTML='<div class="progress progress-striped active"><div class="bar" style="width: 100%;"></div></div>';
		}
	  }
	  
	xmlhttp.open("POST","searchEmployee.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("employeename="+employeename+"&department="+department+"&page="+1);
	
}

function getEmployee_Name(){
	var employeename = document.getElementById('employeename').value;
	return employeename;
}

function getDepartment(){
	var department = document.getElementById('department').value;
	return department;
}

$(document).ready(function() {
	var isadmin = document.getElementById('isadmin').value;
	
	if (isadmin) {
		employeeSearchOnLoad(getEmployee_Name(),getDepartment());
	}
});

function employeeSearchOnLoad(employeename,department){
	var xmlhttp;

	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("searchresult").innerHTML=xmlhttp.responseText;
		} else {
			document.getElementById("searchresult").innerHTML='<div class="progress progress-striped active"><div class="bar" style="width: 100%;">LOADING. . .</div></div>';
		}
	  }
	  
	xmlhttp.open("POST","searchEmployee.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("employeename="+employeename+"&department="+department+"&page="+1);
	
}

function employeeSearchPager(qstring,page){
	var xmlhttp;

	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("searchresult").innerHTML=xmlhttp.responseText;
		}  else {
			document.getElementById("searchresult").innerHTML='<div class="progress progress-striped active"><div class="bar" style="width: 100%;">LOADING. . .</div></div>';
		}
	  } 
	  
	xmlhttp.open("POST","searchEmployee.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(qstring+"&page="+page);
	
}

function employeeBenSearch(ben_employeename){
	var stored_ben_employeename = document.getElementById("stored_ben_employeename");
		stored_ben_employeename.value = ben_employeename;
	var xmlhttp;

	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("benefit_search_results").innerHTML=xmlhttp.responseText;
		} else {
			document.getElementById("benefit_search_results").innerHTML='<br /><div class="progress progress-striped active"><div class="bar" style="width: 100%;">LOADING. . .</div></div>';
		}
	  }
	  
	xmlhttp.open("POST","searchBenEmployee.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("ben_employeename="+ben_employeename+"&ben_page="+1);
	
}

function employeeBenSearchPager(qstring,page){
	var xmlhttp;

	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("benefit_search_results").innerHTML=xmlhttp.responseText;
		} else {
			document.getElementById("benefit_search_results").innerHTML='<br /><div class="progress progress-striped active"><div class="bar" style="width: 100%;">LOADING. . .</div></div>';
		}
	  }
	  
	xmlhttp.open("POST","searchBenEmployee.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(qstring+"&ben_page="+page);
	
}

function employeeBenSearchRefresh(){
	var stored_ben_employeename = document.getElementById("stored_ben_employeename").value;
	
	var xmlhttp;

	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("benefit_search_results").innerHTML=xmlhttp.responseText;
		} else {
			document.getElementById("benefit_search_results").innerHTML='<br /><div class="progress progress-striped active"><div class="bar" style="width: 100%;">LOADING. . .</div></div>';
		}
	  }
	  
	xmlhttp.open("POST","searchBenEmployee.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("ben_employeename="+stored_ben_employeename+"&page="+1);
	
}

function changeBenModalLabel(name) {
	$("#benefitsModalLabel").text(name+" - Benefit Management");
}

function activateAddButtonbyAmount(amount) {
	var benefit = document.getElementById('txtbenefit').value;
	
	var addButton = document.getElementById('add-button');
	
	if( (amount!=''&&benefit!=0) && (!isNaN(amount)) ) {
		addButton.disabled=false;
	} else {
		addButton.disabled=true;
	}
}

function activateAddButtonbyBenefit(benefit) {
	var amount = document.getElementById('txtamount').value;
	
	var addButton = document.getElementById('add-button');
	
	if( (amount!=''&&benefit!=0) && (!isNaN(amount)) ) {
		addButton.disabled=false;
	} else {
		addButton.disabled=true;
	}
}

function activateUpdateButton(amount) {
	var updateButton = document.getElementById('update-button');
	
	if( (amount!='') && (!isNaN(amount)) ) {
		updateButton.disabled=false;
	} else {
		updateButton.disabled=true;
	}
}

function saveEmployeeBenefit(empid,amount,benefit,useraction)
{
	var xmlhttp;

	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById('add-alert').style.display = "block";
			document.getElementById('add-alert').innerHTML = xmlhttp.responseText;
			refreshExistingBenefits();
			var $alert = $('#add-alert > .my-alert').alert();
			setTimeout(function () {
			  $alert.fadeTo(500, 0).slideUp(500, function(){ $alert.alert('close'); }); 
			}, 2500);
		}
	  }
	  
	xmlhttp.open("POST","save_employee_benefit.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("empid="+empid+"&txtamount="+amount+"&txtbenefit="+benefit+"&useraction="+useraction);
	
}

function saveUpdateEmployeeBenefit(benid,amount,benefit,isactive,markdelete,useraction)
{
	var xmlhttp;

	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			$("#update-alert").css({"display":"block"});
			$("#update-alert").append(xmlhttp.responseText);
			$("#update-button").attr("disabled","disabled");
			refreshExistingBenefits();
			var $alert = $('#update-alert > .my-alert').alert();
			setTimeout(function () {
			  $alert.fadeTo(500, 0).slideUp(500, function(){ $alert.alert('close'); $("#update-alert").html(""); }); 
			}, 2500);
		}
	  }
	  
	xmlhttp.open("POST","save_update_employee_benefit.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("benid="+benid+"&isactive="+isactive+"&txtamount="+amount+"&txtbenefit="+benefit+"&markdelete="+markdelete+"&useraction="+useraction);
	
}

function enableBenRow(benid){
	var markdelete = document.getElementById("markdelete-"+benid);
	var tempisactive_field = document.getElementById("tempisactive-"+benid);
	var isactive_field = document.getElementById("isactive-"+benid);
	var active_rows = $("#existing_benefits > table > tbody > tr");
	var active = false;
	
	if(!$("#row-"+benid).hasClass("active")) {
		
		$("#row-"+benid).addClass("active")
		$("#txtamount-"+benid).removeAttr("disabled");
		$("#temptxtbenefit-"+benid).css({"display":"none"});
		$("#txtbenefit-"+benid).removeAttr("style");
		$("#edit_ben-"+benid+">i").removeClass("icon-white");
		$("#active_ben-"+benid+">i").addClass("icon-white");
		$("#active_ben-"+benid).attr("href","#benefits");
		$("#active_ben-"+benid).click(function(){
			//alert(isactive_field.value);
			if(isactive_field.value==1) {
				isactive_field.value = 0;
				$(this).html('<i class="icon-remove icon-white"></i>');
			} else {
				isactive_field.value = 1;
				$(this).html('<i class="icon-check icon-white"></i>');
			}
		});
		$("#delete_ben-"+benid+">i").addClass("icon-white");
		$("#delete_ben-"+benid).attr("href","#benefits");
		$("#delete_ben-"+benid).click(function(){
			//alert(isactive_field.value);
			if(markdelete.value==1) {
				markdelete.value = 0;
				$(this).css({"background-color":"transparent"});
				$(this).html('<i class="icon-trash icon-white"></i>');

			} else {
				markdelete.value = 1;
				$(this).css({"background-color":"red"});
				$(this).css({"padding":"0px 2px"});
				$(this).css({"-webkit-border-radius":"4px"});
				$(this).css({"-moz-border-radius":"4px"});
				$(this).css({"border-radius":"4px"});
				$(this).html('<i class="icon-ok icon-white"></i>');

				$("#update-alert").css({"display":"block"});	
				$("#update-alert").html("<div class=\"my-alert alert alert-error fade in\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>Warning! Be careful when marking records for deletion. Deleted records cannot be restored.</div>");

				var $alert = $('#update-alert > .my-alert').alert();
				setTimeout(function () {
					$alert.fadeTo(500, 0).slideUp(500, function(){ $alert.alert('close'); $("#update-alert").html(""); }); 
				}, 3000);
				
			}
		});
		
		$("#update-button").removeAttr("disabled");
		
	} else {
		
		$("#row-"+benid).removeClass("active")
		$("#txtamount-"+benid).val($("#temptxtamount-"+benid).val());
		$("#txtamount-"+benid).attr("disabled","disabled");
		$("#temptxtbenefit-"+benid).removeAttr("style");
		$("#txtbenefit-"+benid).val($("#temptxtbenefittype-"+benid).val());
		$("#txtbenefit-"+benid).css({"display":"none"});
		$("#edit_ben-"+benid+">i").addClass("icon-white");
		$("#active_ben-"+benid+">i").removeClass("icon-white");
		$("#active_ben-"+benid).removeAttr("href");
		$("#active_ben-"+benid).unbind("click");
		if(tempisactive_field.value==1) {
			isactive_field.value = tempisactive_field.value;
			$("#active_ben-"+benid).html('<i class="icon-check"></i>');
		} else {
			isactive_field.value = tempisactive_field.value;
			$("#active_ben-"+benid).html('<i class="icon-remove"></i>');
		}
		$("#delete_ben-"+benid+">i").removeClass("icon-white");
		$("#delete_ben-"+benid).removeAttr("href");
		$("#delete_ben-"+benid).unbind("click");
		if(markdelete.value==1) {
			markdelete.value = 0;
			$("#delete_ben-"+benid).css({"background-color":"transparent"});
			$("#delete_ben-"+benid).html('<i class="icon-trash"></i>');
		}
		
		active_rows.map(function(i, r) {
			var active_row = $(r);
			if(active_row.hasClass("active")){
				active = true;
			}
		});
		
		if(active==false){
			$("#update-button").attr("disabled","disabled");
		}
		
	}
}

function refreshExistingBenefits() {
	var empid = document.getElementById("empid").value;
	
	var xmlhttp;

	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("existing_benefits").innerHTML=xmlhttp.responseText;
		} else {
			document.getElementById("existing_benefits").innerHTML='<br /><div class="progress progress-striped active"><div class="bar" style="width: 100%;">LOADING. . .</div></div>';
		}
	  }
	  
	xmlhttp.open("POST","refresh_existing_benefits.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("empid="+empid);
	
}

function activateCreateButton(ben_name){
	if(ben_name!=''){
		$("#create-button").removeAttr("disabled");
	} else {
		$("#create-button").attr("disabled","disabled");
	}
}

/*function getEmployees(pagenum)
{
	var xmlhttp;
	 
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		  document.getElementById('admincontent').innerHTML = xmlhttp.responseText;
		}
	  };
	  
	xmlhttp.open("POST","getemployees.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("page="+pagenum);
	
}*/

function getMyPunchTime(empid)
{
	var xmlhttp;
	 
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		  document.getElementById('user-ajax-info').innerHTML = xmlhttp.responseText;
		}
	  };
	  
	xmlhttp.open("POST","getmypunchtime.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("empid="+empid);
	
}

function getMyProfile(empid)
{
	var xmlhttp;
	 
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		  document.getElementById('user-ajax-info').innerHTML = xmlhttp.responseText;
		}
	  };
	  
	xmlhttp.open("POST","getmyprofile.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("empid="+empid);
	
}

function ProfileRefresh()
{
	var xmlhttp;
	var empid = document.getElementById('empid').value;
	 
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		  document.getElementById('user-ajax-info').innerHTML = xmlhttp.responseText;
		}
	  };
	  
	xmlhttp.open("POST","getmyprofile.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("empid="+empid);
	
}

function setTimeIn(empid)
{
	var xmlhttp;
	 
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		  document.getElementById('time-in').innerHTML=xmlhttp.responseText;
		  document.getElementById('time-in').setAttribute("disabled","disabled");
		  document.getElementById('time-in').removeAttribute("onclick");
		  document.getElementById('time-out').removeAttribute("disabled");
		  document.getElementById('time-out').setAttribute("onclick","setTimeOut("+empid+")");
		  document.getElementById('current-day').className+=(" breadcrumb-present");
		}
	  };
	  
	xmlhttp.open("POST","settimein.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("empid="+empid);
	
}

function setTimeOut(empid)
{
	var xmlhttp;
	 
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		  document.getElementById('time-out').innerHTML=xmlhttp.responseText;
		  document.getElementById('time-out').setAttribute("disabled","disabled");
		  document.getElementById('time-out').removeAttribute("onclick");
		  //document.getElementById('time-in').removeAttribute("disabled");
		  //document.getElementById('time-in').setAttribute("onclick","setTimeIn("+empid+")");
		}
	  };
	  
	xmlhttp.open("POST","settimeout.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("empid="+empid);
	
}

function getReportGenerator(empid)
{
	var xmlhttp;
	var date_one = document.getElementById('date1').value;
	var date_two = document.getElementById('date2').value;
	//document.getElementById('myModal').className=("");
	//document.getElementById('myModal').className+=("modal 1");
	 
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		  document.getElementById('report-modal-body').innerHTML = xmlhttp.responseText;
		}
	  };
	  
	xmlhttp.open("POST","report_generator.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("empid="+empid+"&date_one="+date_one+"&date_two="+date_two);
	
}

function getCalendarGenerator(month,year,empid)
{
	var xmlhttp;
	 
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		  document.getElementById('user-calendar').innerHTML = xmlhttp.responseText;
		}
	  };
	  
	xmlhttp.open("POST","user_calendar_generator.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("month="+month+"&year="+year+"&empid="+empid);
	
}

function getModalCalendarGenerator(month,year,empid)
{
	var xmlhttp;
	 
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		  document.getElementById('calendar-modal-body-'+empid).innerHTML = xmlhttp.responseText;
		}
	  };
	  
	xmlhttp.open("POST","calendar_generator.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("month="+month+"&year="+year+"&empid="+empid);
	
}

/*function getRates()
{
	var xmlhttp;
	 
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		  document.getElementById('admincontent').innerHTML = xmlhttp.responseText;
		}
	  };
	  
	xmlhttp.open("POST","getrates.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send();
	
}*/

function saveEmpRate(empid,txtrate,mode)
{
	var xmlhttp;
	
	 
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById('alert').style.display = "block";
			document.getElementById('alert').innerHTML = xmlhttp.responseText;
			var $alert = $('.my-alert').alert();
			setTimeout(function () {
			  $alert.fadeTo(500, 0).slideUp(500, function(){ $alert.alert('close'); }); 
			}, 2500);
		}
	  };
	  
	xmlhttp.open("POST","save_employee_rate.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("empid="+empid+"&txtrate="+txtrate+"&useraction="+mode);
	
}

function saveAddEmployee(mode,txtusername,txtpassword,txtdepartment,txtfname,txtlname,txtrate,txtgender,txtemail,txtcontactno)
{
	var xmlhttp;
	
	 
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById('alert').style.display = "block";
			document.getElementById('alert').innerHTML = xmlhttp.responseText;
			document.getElementById("unamesearchresult").style.display="none";
			document.getElementById('lblErrUname').style.display="inline-block";
			document.getElementById('regform').reset();
			var $alert = $('.my-alert').alert();
			setTimeout(function () {
			  $alert.fadeTo(500, 0).slideUp(500, function(){ $alert.alert('close'); }); 
			}, 2500);
		}
	  };
	  
	xmlhttp.open("POST","save_employee.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("useraction="+mode+"&txtusername="+txtusername+"&txtpassword="+txtpassword+"&txtdepartment="+txtdepartment+"&txtfname="+txtfname+"&txtlname="+txtlname+"&txtrate="+txtrate+"&txtgender="+txtgender+"&txtemail="+txtemail+"&txtcontactno="+txtcontactno);
	
}

function saveEditEmployee(empid,userid,mode,txtusername,txtdepartment,txtfname,txtlname,txtrate,txtgender,txtemail,txtcontactno)
{
	var xmlhttp;
	
	 
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById('alert').style.display = "block";
			document.getElementById('alert').innerHTML = xmlhttp.responseText;
			var $alert = $('.my-alert').alert();
			setTimeout(function () {
			  $alert.fadeTo(500, 0).slideUp(500, function(){ $alert.alert('close'); }); 
			}, 2500);
		}
	  };
	  
	xmlhttp.open("POST","save_employee.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("empid="+empid+"&userid="+userid+"&useraction="+mode+"&txtusername="+txtusername+"&txtdepartment="+txtdepartment+"&txtfname="+txtfname+"&txtlname="+txtlname+"&txtrate="+txtrate+"&txtgender="+txtgender+"&txtemail="+txtemail+"&txtcontactno="+txtcontactno);
	
}

function savePassword(userid,oldpassword,newpassword,mode)
{
	var xmlhttp;
	
	 
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById('alert').style.display = "block";
			document.getElementById('alert').innerHTML = xmlhttp.responseText;
			var $alert = $('.my-alert').alert();
			setTimeout(function () {
			  $alert.fadeTo(500, 0).slideUp(500, function(){ $alert.alert('close'); }); 
			}, 5000);
		}
	  };
	  
	xmlhttp.open("POST","save_password.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("userid="+userid+"&oldpassword="+oldpassword+"&newpassword="+newpassword+"&useraction="+mode);
	
}

function deleteEmployee(empid,mode)
{
	var xmlhttp;
	
	 
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById('alert').style.display = "block";
			document.getElementById('alert').innerHTML = xmlhttp.responseText;
			$("#del-button").attr('disabled','true');
		}
	  };
	  
	xmlhttp.open("POST","delete.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("empid="+empid+"&useraction="+mode);
	
}

$(function(){
		window.prettyPrint && prettyPrint();
		var currentDate = new Date()
		var day = currentDate.getDate();
		var month = currentDate.getMonth() + 1;
		var year = currentDate.getFullYear();
		var now = year + "-" + month + "-" + day;
			
		$('#dp3').datepicker();
		
		if ($('#dp3').attr('data-date') == "") {
			$('#dp3').datepicker('setValue', now);
		}
		
		$('#dp4').datepicker();
		
		if ($('#dp4').attr('data-date') == "") {
			$('#dp4').datepicker('setValue', now);
		}

		$('#dp5').datepicker();
		
		if ($('#dp5').attr('data-date') == "") {
			$('#dp5').datepicker('setValue', now);
		}
		
		$('#dp6').datepicker();
		
		if ($('#dp6').attr('data-date') == "") {
			$('#dp6').datepicker('setValue', now);
		}

		$('#dp7').datepicker();
		
		if ($('#dp7').attr('data-date') == "") {
			$('#dp7').datepicker('setValue', now);
		}
		
		$('#dp8').datepicker();
		
		if ($('#dp8').attr('data-date') == "") {
			$('#dp8').datepicker('setValue', now);
		}

		$('#dp9').datepicker();
		
		if ($('#dp9').attr('data-date') == "") {
			$('#dp9').datepicker('setValue', now);
		}
		
		$('#timepicker1').timepicker();
		$('#timepicker2').timepicker();
});

function attendanceDatepickerOn(){
		window.prettyPrint && prettyPrint();
		var currentDate = new Date()
		var day = currentDate.getDate();
		var month = currentDate.getMonth() + 1;
		var year = currentDate.getFullYear();
		var now = year + "-" + month + "-" + day;
			
		$('#dp5').datepicker();
		
		if ($('#dp5').attr('data-date') == "") {
			$('#dp5').datepicker('setValue', now);
		}
		
		$('#dp6').datepicker();
		
		if ($('#dp6').attr('data-date') == "") {
			$('#dp6').datepicker('setValue', now);
		}
}

$(function() {
		var $alert = $('.my-alert').alert();
		setTimeout(function () {
		  $alert.fadeTo(500, 0).slideUp(500, function(){ $alert.alert('close'); }); 
		}, 5000);
});

$(function () {
   var activeTab = $('[href=' + location.hash + ']');
   activeTab && activeTab.tab('show');
});

function expand_all() {
		$('.collapse_all').collapse('show');
		$('#expand_all').css({"display":"none"});
		$('#collapse_all').css({"display":"inline-block"});
};

function collapse_all() {
		$('.collapse_all').collapse('hide');
		$('#collapse_all').css({"display":"none"});
		$('#expand_all').css({"display":"inline-block"});
};

function printDiv(divName) {

	document.getElementById("modal-footer").style.visibility = "collapse";
	
	printElement(document.getElementById(divName));
    window.print();

	document.getElementById("modal-footer").style.visibility = "visible";
}

function printCollapseDiv(divName) {

	$(".printButtonCollapse").css({"display":"none"});
	$(".signature_fields").css({"display":"inline-block"});

	printElement(document.getElementById(divName));
    window.print();
	
	$(".printButtonCollapse").css({"display":"inline-block"});
	$(".signature_fields").css({"display":"none"});

	//attendanceDatepickerOn();
		
}

function getStart_Date(){
	var start_date = document.getElementById('start_date').value;
	return start_date;
}

function getEnd_Date(){
	var end_date = document.getElementById('end_date').value;
	return end_date;
}

function getMStart_Date(){
	var start_date = document.getElementById('mstart_date').value;
	return start_date;
}

function getMEnd_Date(){
	var end_date = document.getElementById('mend_date').value;
	return end_date;
}

function getMTimePickerOne(){
	var start_time = document.getElementById('timepicker1').value;
	return start_time;
}

function getMTimePickerTwo(){
	var end_time = document.getElementById('timepicker2').value;
	return end_time;
}

function getAtt_Employee_Name(){
	var att_employeename = document.getElementById('att_employeename').value;
	return att_employeename;
}

function getAtt_Department(){
	var att_department = document.getElementById('att_department').value;
	return att_department;
}

function employeeSearchAttendanceGenerator(start_date,end_date,att_employeename,att_department,page) {
	
	var xmlhttp;
	
	//alert(start_date);
	//alert(end_date);
	//alert(att_employeename);
	//alert(att_department);
	//var start_date = document.getElementById('start_date').value;
	//var end_date = document.getElementById('end_date').value;
	//var employeename = document.getElementById('att_employeename').value;
	//var department = document.getElementById('att_department').value;
	if(page==''||page==0) {
		page = 1;
	}
	
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("generate-attendance-results").innerHTML=xmlhttp.responseText;
		} else {
			document.getElementById("generate-attendance-results").innerHTML='<div class="progress progress-striped active"><div class="bar" style="width: 100%;">LOADING. . .</div></div>';
		}
	  }
	  
	xmlhttp.open("POST","employeeSearchAttendanceGenerator.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("start_date="+start_date+"&end_date="+end_date+"&att_employeename="+att_employeename+"&att_department="+att_department+"&attendance_page="+page);
	
}

function employeeSearchAttendanceGeneratorPager(qstring,page) {
	
	var xmlhttp;
	
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("generate-attendance-results").innerHTML=xmlhttp.responseText;
		} else {
			document.getElementById("generate-attendance-results").innerHTML='<div class="progress progress-striped active"><div class="bar" style="width: 100%;"></div></div>';
		}
	  }
	  
	xmlhttp.open("POST","employeeSearchAttendanceGenerator.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(qstring+"&attendance_page="+page);
	
}

// OHL ajax

function queryCustomers(mode,customerid)
{
	var xmlhttp;
	var returntext="";
	
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			$('#cust_address').val(xmlhttp.responseText);
		}
	  }
	  
	xmlhttp.open("POST","queryCustomers.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("mode="+mode+"&customerid="+customerid);
	
}

function processInvoiceDR()
{
	var xmlhttp,
	row_ctr = $('#row_ctr').val(),
	txtcustid = $('#txtcustid').val(),
	txtdate = $('#txtdate').val(),
	cust_address = $('#cust_address').val(),
	txtrecordnumber = $('#txtrecordnumber').val(),
	status = $("#status").val(),
	is_not_master = $('#is_not_master').is(':checked') ? 1 : 0;
	
	var row_quantity = new Array(),row_unit = new Array(),row_items = new Array(),row_price = new Array(),row_total = new Array();
	row_quantity = $('#receipt_rows input[name=row_quantity]').map(function(){ if($(this).val()) { return $(this).val();} }).get();
	row_unit = $('#receipt_rows input[name=row_unit]').map(function(){ if($(this).val()) { return $(this).val();} }).get();
	row_items = $('#receipt_rows input[name=row_items]').map(function(){ if($(this).val()) { return $(this).val();} }).get();
	row_price = $('#receipt_rows input[name=row_price]').map(function(){ if($(this).val()) { return $(this).val();} }).get();
	row_total = $('#receipt_rows input[name=row_total]').map(function(){ if($(this).val()) { return $(this).val();} }).get();
	
	//alert("Quantity: "+row_quantity.length+"\n"+"Unit: "+row_unit.length+"\n"+"Items: "+row_items.length+"\n"+"Price: "+row_price.length+"\n"+"Total: "+row_total.length);
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			$('#invoice-modal-body').html(xmlhttp.responseText);
			var $alert = $('#invoice-modal-body > .my-alert').alert();
			setTimeout(function () {
			  $alert.fadeTo(500, 0).slideUp(500, function(){ $alert.alert('close'); }); 
			}, 2500);
		} else {
			$('#invoice-modal-body').html('<div class="progress progress-striped active"><div class="bar" style="width: 100%;"></div></div>');
		}
	  }
	  
	xmlhttp.open("POST","processInvoiceDR.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("row_ctr="+row_ctr+"&txtcustid="+txtcustid+"&txtdate="+txtdate+"&cust_address="+cust_address+"&txtrecordnumber="+txtrecordnumber+"&row_quantity="+row_quantity+"&row_unit="+row_unit+"&row_items="+row_items+"&row_price="+row_price+"&row_total="+row_total+"&status="+status+"&is_not_master="+is_not_master);
	
}

function addReceiptRow()
{
	var xmlhttp;
	row_ctr = parseInt($('#row_ctr').val());
	if($('#txtquantity').val()){
		txtquantity = parseFloat($('#txtquantity').val());
	} else {
		txtquantity = 0;
	}
	txtunit = $('#txtunit').val();
	txtitems = $('#txtitems').val();
	if($('#txtprice').val()){
		txtprice = parseFloat($('#txtprice').val());
	} else {
		txtprice = 0;
	}
	txttotal = parseFloat($('#txttotal').val());
	
		row = '<tr id="row_'+row_ctr+'" class="receipt_row">';
		row += '<td>'+txtquantity+'<input name="row_quantity" type="hidden" value="'+txtquantity+'" /></td>';
		row += '<td>'+txtunit+'<input name="row_unit" type="hidden" value="'+txtunit+'" /></td>';
		row += '<td>'+txtitems+'<input name="row_items" type="hidden" value="'+txtitems+'" /></td>';
		row += '<td>Php '+addCommas(txtprice.toFixed(2))+'<input name="row_price" type="hidden" value="'+txtprice+'" /></td>';
		row += '<td>Php '+addCommas(txttotal.toFixed(2))+'<input name="row_total" type="hidden" value="'+txttotal+'" /></td>';
		row += '<td><a style="line-height: 20pt; cursor:pointer;" onclick="deleteReceiptRow(\'row_'+row_ctr+'\')"><i class="icon-trash icon-white"></i></a></td>';
		row += '</tr>';
		
		$("#receipt_rows").append(row);
		
		getTotalNumerofItems();
		getGrandTotal();
	
		row_ctr += 1;
		$('#row_ctr').val(row_ctr);

		if($(".receipt_row").length==10) {
			$("#RowsReachedAlert").css({"display":"block"});
			$("#AddButton").css({"display":"none"});
			$("#DisabledAddButton").css({"display":"block"});
			var $alert = $('#RowsReachedAlert').alert();
			setTimeout(function () {
			  $alert.fadeTo(1000, 0).slideUp(1000, function(){ $alert.alert('close'); }); 
			}, 2500);
		}
		
		if($(".receipt_row").length>0) {
			$("#process-invoice-button").removeAttr("disabled");
		} else {
			$("#process-invoice-button").attr("disabled","disabled");
		}
}

function deleteReceiptRow(row) {
	row_ctr = parseInt($('#row_ctr').val());
	//alert(row);
	$("#"+row).live('click', function() {
		$(this).remove();
		row_ctr -= 1;
		$('#row_ctr').val(row_ctr);
		getTotalNumerofItems();
		getGrandTotal();
		if($(".receipt_row").length<=0) {
			$("#process-invoice-button").attr("disabled","disabled");
		}
	} );
}

function getTotalNumerofItems() {
	total = 0;
	$('#receipt_rows input[name=row_quantity]').each( function () { 
		total += parseFloat($(this).val());
	});
	$("#total_items").html(total);
	//alert(total);
}

function getGrandTotal() {
	total = 0;
	$('#receipt_rows input[name=row_total]').each( function () { 
		total += parseFloat($(this).val());
	});
	$("#grand_total").html(addCommas(total.toFixed(2)));
	//alert(total);
}

$(function() {
	computeTotal()
});
	
function computeTotal()
{
	
	quantity = parseFloat($('#txtquantity').val());
	price = parseFloat($('#txtprice').val());
	total = quantity*price;
	
	if(isNaN(total)) {
		total = 0;
	}
	
	$('#txttotal').val(total);
	$('#display_txttotal').html(addCommas(total.toFixed(2)));
}

function addCommas(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function printReceiptDiv(divName) {

	$("#"+divName+" h3").css({"color":"#000","text-shadow":"none"});
	$("#"+divName+" h4").css({"color":"#000","text-shadow":"none"});
	$("#"+divName+" table td").css({"color":"#000"});
	$("#"+divName+" table th").css({"color":"#000"});
	$("#"+divName+" #row_table").removeClass("table-condensed");

	printElement(document.getElementById(divName));
    window.print();

	$("#"+divName+" h3").css({"color":"#757C82","text-shadow":"-1px -1px 0 rgba(0, 0, 0, 0.3)"});
	$("#"+divName+" h4").css({"color":"#757C82","text-shadow":"-1px -1px 0 rgba(0, 0, 0, 0.3)"});
	$("#"+divName+" table td").css({"color":"#757C82"});
	$("#"+divName+" table th").css({"color":"#757C82"});
	$("#"+divName+" #row_table").addClass(" table-condensed");
	
}

function printMasterlist(divName) {

	$("#"+divName+" h3").css({"color":"#000","text-shadow":"none"});
	$("#"+divName+" h4").css({"color":"#000","text-shadow":"none"});
	$("#"+divName+" table td").css({"color":"#000"});
	$("#"+divName+" table th").css({"color":"#000"});
	$("#"+divName+" #masterlist_row_table").removeClass("table-condensed");

	printElement(document.getElementById(divName));
    window.print();

	$("#"+divName+" h3").css({"color":"#757C82","text-shadow":"-1px -1px 0 rgba(0, 0, 0, 0.3)"});
	$("#"+divName+" h4").css({"color":"#757C82","text-shadow":"-1px -1px 0 rgba(0, 0, 0, 0.3)"});
	$("#"+divName+" table td").css({"color":"#757C82"});
	$("#"+divName+" table th").css({"color":"#757C82"});
	$("#"+divName+" #masterlist_row_table").addClass(" table-condensed");
	
}

function resetPage() {
	$("#invoiceModal").on("hidden", function() { location.reload(); });
}

function generateMasterList(start_date,end_date,start_time,end_time) {
	//alert("Start Date: "+start_date+"\n"+"End Date: "+end_date+"\n"+"Start Time: "+start_time+"\n"+"End Time: "+end_time);
	
	var xmlhttp;
	
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			var response = xmlhttp.responseText;
			
			if(response.length==1) {
				$("#view-masterlist-results").html(response);
				$("#printmasterlist_button").attr("disabled","disabled");
			} else {
				$("#view-masterlist-results").html(response);
				$("#printmasterlist_button").removeAttr("disabled");
			}
		} else {
			$("#view-masterlist-results").html('<div class="progress progress-striped active"><div class="bar" style="width: 100%;">LOADING. . .</div></div>');
		}
	  }
	  
	xmlhttp.open("POST","MasterlistGenerator.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("start_date="+start_date+"&end_date="+end_date+"&start_time="+start_time+"&end_time="+end_time);
	
}