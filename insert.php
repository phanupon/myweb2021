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

	if($_SESSION['Status'] != "ADMIN")
	{
		echo "This page for User only!";
		exit();
	}	
?>
<?php
include "dbconn.php";
$sql = "select employeeID FROM employee ORDER by employeeID DESC Limit 0,1";
$result = mysqli_query($link,$sql);
$resultID = mysqli_fetch_array($result);
?>
<p><h3>เพิ่มข้อมูลพนักงานใหม่</h3></p>
<!-- <form method="GET" action="input.php"> -->
<form method="post" enctype="multipart/form-data" action="upload.php">	
<p>employeeID <input type="text" name="employeeID" value="<?php echo $resultID[0]+1; ?>"></p>
<p>name<input type="text" name="name"></p>
<p>job<select id= job name="job"><?php 
//set Thai encoding utf-8;
//$link->set_charset("utf8");	 
$sql2 = "select * from job";
$result2 = mysqli_query($link,$sql2);
while($dbarr2 = mysqli_fetch_array($result2)){
echo "<option value=$dbarr2[job_id]>$dbarr2[job_name]</option>";
}
?> </select></p>
<p>salary<input type="text" name="salary"></p>
<p>Department<select id="departmentID" name="departmentID"><?php 
include "dbconnect.php";
$sql3 = "select * from department";
$result3 = mysqli_query($link,$sql3);
while($dbarr3 = mysqli_fetch_array($result3)){
echo "<option value=$dbarr3[departmentID]>$dbarr3[department]</option>";
}
?> </select></p><br>
<label>รูปพนักงาน</label><br>
<input type="file" name="fileToUpload" id="fileToUpload">	<br><br>
<input type=submit name=send value=insert>
</form>
<?php 
include 'footer.php';
?>

</body>
</html>