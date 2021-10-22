<?php
include "header.php";
$id=$_GET['id'];
// $link = mysqli_connect('localhost','root','','employee');
include 'dbconn.php';
//$query = "select e.name, e.job, e.salary, d.department, d.departmentID from employee e, department d where e.departmentID = d.departmentID and e.employeeID='$id'";
$sql = "select employee.employeeID, employee.name, employee.job, employee.salary, department.department, department.departmentID, job.job_id, job.job_name from employee, department, job where employee.departmentID = department.departmentID and job.job_id = employee.job and employee.employeeID='$id'";
$result = mysqli_query($link, $sql);
echo "<form action=update.php?Empno=$id method=get>";
    
$dbarr = mysqli_fetch_row($result);
?>
emploteeID<?php echo"$id";?><br>

name : <input type=text name=Ename value="<?php echo $dbarr[1];?>" ><br>

<p>job <select name="Ejob">
<?php
echo "<option value=$dbarr[2]> $dbarr[7]</option>";
$sql3 = "select * from job;";
$result3 = mysqli_query($link, $sql3);
while ($dbarr3 = mysqli_fetch_array($result3)){
    echo "<option value=$dbarr3[job_id]>$dbarr3[job_name]</option>";
}
echo "</select> </p>";
?>
Salary : <input type=text name=Esalary value="<?php echo $dbarr[3];?>" ><br>
<input type="hidden" name='Empno' value='<?php echo $id; ?>'><br>

<p>Department : <select name='Edepart'> 
<?php 
echo "<option value=$dbarr[5]> $dbarr[4]</option>";
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
