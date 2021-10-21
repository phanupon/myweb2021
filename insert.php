<html>
	<title>web site project</title>
	<head>
	<meta charset="UTF-8">
	</head>
<body>
<h2>Insert Employee Data</h2>
<?php 

include 'header.php';
session_start();
	if($_SESSION['UserID'] == "")
	{
		echo "Please Login!";
		header('Location: login.php');
		exit();
	}

	if($_SESSION['Status'] != "USER")
	{
		echo "This page for User only!";
		exit();
	}	
?>
<p>เพิ่มข้อมูลพนักงานใหม่</p>
<form method="GET" action="input.php">
<p>Form input data to employee table</p>
<p>employeeID <input type="text" name="id"></p>
<p>name<input type="text" name="name"></p>
<p>job<input type="text" name="job"></p>
<p>salary<input type="text" name="salary"></p>
<p>Department ID<input type="text" name="departmentid"></p>
<input type="submit" name="send" value="Submit">
<input type="reset" name="cancle" value="Reset">

</form>
<?php 
include 'footer.php';
?>

</body>
</html>