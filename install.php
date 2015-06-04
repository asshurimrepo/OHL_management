<?php
require_once("include/web.config.php");
include("include/ez_sql.php");
$success = true;

	//create the Employee table
	if (!$db->tableExists("employee")) {
		$sql = "CREATE TABLE employee ( EmpID bigint(32) NOT NULL auto_increment, "; 
		$sql .= "UserID bigint(32), ";
		$sql .= "Username varchar(50), ";
		$sql .= "DepID bigint(32), ";
		$sql .= "FirstName varchar(100), ";
		$sql .= "LastName varchar(100), ";
		$sql .= "RateID bigint(32), ";
		$sql .= "Gender varchar(10), ";
		$sql .= "Email varchar(100), ";
		$sql .= "ContactNo varchar(30), ";
		$sql .= "DateCreated datetime, ";
		$sql .= "DateModified datetime, ";
		$sql .= "PRIMARY KEY (EmpID) )";
		$db->query($sql);
		echo "Employee table has been created.<br />";
	} else {
		echo "Employee table already exists.<br />";
		$success = false;
	}

	//create the Employee Rates table
	if (!$db->tableExists("employee_rates")) {
		$sql = "CREATE TABLE employee_rates ( RateID bigint(32) NOT NULL auto_increment, "; 
		$sql .= "Rate double(10,2), ";
		$sql .= "PRIMARY KEY (RateID) )";
		$db->query($sql);
		echo "Employee Rates table has been created.<br />";
	} else {
		echo "Employee Rates table already exists.<br />";
		$success = false;
	}

	//create the Attendance table
	if (!$db->tableExists("attendance")) {
		$sql = "CREATE TABLE attendance ( AttendanceID bigint(32) NOT NULL auto_increment, "; 
		$sql .= "EmpID bigint(32) NULL,";
		$sql .= "TimeIn time NULL,";
		$sql .= "TimeOut time NULL,";
		$sql .= "Date date NULL,";
		$sql .= "PRIMARY KEY (AttendanceID) )";
		$db->query($sql);
		echo "Attendance table has been created.<br />";
	} else {
		echo "Attendance table already exists.<br />";
		$success = false;
	}

	//create the Department table
	if (!$db->tableExists("department")) {
		$sql = "CREATE TABLE department ( DepID bigint(32) NOT NULL auto_increment, "; 
		$sql .= "DepName varchar(50), ";
		$sql .= "PRIMARY KEY (DepID) )";
		$db->query($sql);
		echo "Department table has been created.<br />";
	} else {
		echo "Department table already exists.<br />";
		$success = false;
	}

	//create the Benefits table
	if (!$db->tableExists("benefits")) {
		$sql = "CREATE TABLE benefits ( BenID bigint(32) NOT NULL auto_increment, "; 
		$sql .= "EmpID bigint(32) NULL,";
		$sql .= "Amount double(10,2), ";
		$sql .= "Type bigint(32) NULL,";
		$sql .= "isActive int(11) NULL,";
		$sql .= "PRIMARY KEY (BenID) )";
		$db->query($sql);
		echo "Benefits table has been created.<br />";
	} else {
		echo "Benefits table already exists.<br />";
		$success = false;
	}

	//create the Benefit Type table
	if (!$db->tableExists("benefit_type")) {
		$sql = "CREATE TABLE benefit_type ( TypeID bigint(32) NOT NULL auto_increment, "; 
		$sql .= "TypeName varchar(50),";
		$sql .= "PRIMARY KEY (TypeID) )";
		$db->query($sql);
		echo "Benefit Type table has been created.<br />";
	} else {
		echo "Benefit Type table already exists.<br />";
		$success = false;
	}

	//create the Allowances table
	if (!$db->tableExists("allowances")) {
		$sql = "CREATE TABLE allowances ( AllID bigint(32) NOT NULL auto_increment, "; 
		$sql .= "EmpID bigint(32) NULL,";
		$sql .= "Amount double(10,2), ";
		$sql .= "Type bigint(32) NULL,";
		$sql .= "isActive int(11) NULL,";
		$sql .= "PRIMARY KEY (AllID) )";
		$db->query($sql);
		echo "Allowances table has been created.<br />";
	} else {
		echo "Allowances table already exists.<br />";
		$success = false;
	}

	//create the Allowance Type table
	if (!$db->tableExists("allowance_type")) {
		$sql = "CREATE TABLE allowance_type ( TypeID bigint(32) NOT NULL auto_increment, "; 
		$sql .= "TypeName varchar(50),";
		$sql .= "PRIMARY KEY (TypeID) )";
		$db->query($sql);
		echo "Allowance Type table has been created.<br />";
	} else {
		echo "Allowance Type table already exists.<br />";
		$success = false;
	}

	//create the Expenses table
	if (!$db->tableExists("expenses")) {
		$sql = "CREATE TABLE expenses ( ExpID bigint(32) NOT NULL auto_increment, "; 
		$sql .= "EmpID bigint(32) NULL,";
		$sql .= "Amount double(10,2), ";
		$sql .= "Description longtext NULL, ";
		$sql .= "Type bigint(32) NULL,";
		$sql .= "DateCreated datetime, ";
		$sql .= "isActive int(11) NULL,";
		$sql .= "PRIMARY KEY (ExpID) )";
		$db->query($sql);
		echo "Expenses table has been created.<br />";
	} else {
		echo "Expenses table already exists.<br />";
		$success = false;
	}

	//create the Expense Type table
	if (!$db->tableExists("expense_type")) {
		$sql = "CREATE TABLE expense_type ( TypeID bigint(32) NOT NULL auto_increment, "; 
		$sql .= "TypeName varchar(50),";
		$sql .= "PRIMARY KEY (TypeID) )";
		$db->query($sql);
		echo "Expense Type table has been created.<br />";
	} else {
		echo "Expense Type table already exists.<br />";
		$success = false;
	}

	//create the Users table
	if (!$db->tableExists("users")) {
		$sql = "CREATE TABLE users ( UserID int(11) NOT NULL auto_increment, "; 
		$sql .= "Username varchar(50), ";
		$sql .= "Password varchar(50), ";
		$sql .= "isAdmin int(11) NULL, ";
		$sql .= "PRIMARY KEY (UserID) )";
		$db->query($sql);
		$db->query("INSERT INTO users(UserID,Username,Password,isAdmin) VALUES (1,'admin',md5('admin35379'),1)");
		echo "Users table has been created.<br />";
	} else {
		echo "Users table already exists.<br />";
		$success = false;
	}

	if($success){
		echo "<br />Database has been updated.";
	} else {
		echo "<br />No changes have been made to the database.";
	}
	
?>
