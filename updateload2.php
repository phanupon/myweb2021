<?php 

//include 'header.php';
session_start();
	if($_SESSION['UserID'] == "")
	{
		echo "Please Login!";
		header('Location: login.php');
		exit();
	}

	if($_SESSION['Status'] != "ADMIN")
	{
		echo "This page for Admin only!";
		exit();
	}	
?>
<?php
include "header.php";
$id=$_GET['id'];
// $link = mysqli_connect('localhost','root','','employee');
include 'dbconn.php';
//$query = "select e.name, e.job, e.salary, d.department, d.departmentID from employee e, department d where e.departmentID = d.departmentID and e.employeeID='$id'";
$sql = "select employee.employeeID, employee.picture, employee.name, employee.job, employee.salary, department.department, department.departmentID, job.job_id, job.job_name from employee, department, job where employee.departmentID = department.departmentID and job.job_id = employee.job and employee.employeeID='$id'";
$result = mysqli_query($link, $sql);
//picture employee
$dbarr = mysqli_fetch_row($result);
echo "<br><img src=uploads/".$dbarr[1]. "><br>";
echo "แก้ไขภาพพนักงาน";
?>

<!-- form uppicture -->
<form method="post" enctype="multipart/form-data" action="uploadpicture.php">
<input type="hidden" name="id" value="<?php echo "$id"; ?>">
<input type="file" name="fileToUpload" id="fileToUpload">
<input type=submit name=send value=insert>
</form>	
<?php echo "<form action=update.php?Empno=$id method=get>";  ?>
<p>แก้ไขข้อมูลพนักงาน</p>
emploteeID<?php echo"$id";?><br>
name : <input type=text name=Ename value="<?php echo $dbarr[2];?>" ><br>

<p>job <select name="Ejob">
<?php
echo "<option value=$dbarr[3]> $dbarr[5]</option>";
$sql3 = "select * from job;";
$result3 = mysqli_query($link, $sql3);
while ($dbarr3 = mysqli_fetch_array($result3)){
    echo "<option value=$dbarr3[job_id]>$dbarr3[job_name]</option>";
}
echo "</select> </p>";
?>
Salary : <input type=text name=Esalary value="<?php echo $dbarr[4];?>" ><br>
<input type="hidden" name='Empno' value='<?php echo $id; ?>'><br>

<p>Department : <select name='Edepart'> 
<?php 
echo "<option value=$dbarr[6]> $dbarr[5]</option>";
$sql2 = "select * from department;";

$result2 = mysqli_query($link, $sql2);
while ($dbarr2 = mysqli_fetch_array($result2))
{ echo "<option value=$dbarr2[departmentID]>$dbarr2[department]</option>";}
echo "</select><p>";
echo "<input type=submit name=submit value=submit>";
echo "<input type=reset name=reset value=Cancel>";
echo "</form>";
mysqli_close($link);

?>
