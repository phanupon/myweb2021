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
    echo "This page for Admin only!";
    exit();
}	
//$link = mysqli_connect('localhost','root','','employee');
include 'dbconn.php';
//$sql1 = "use myweb";
//$result = mysqli_query($link,$sql1);

//$sql = 'SELECT * FROM employee';
$sql = "select employee.employeeID, employee.picture, employee.name, 
employee.salary, job.job_name, department.department 
FROM employee LEFT JOIN department ON employee.departmentID = department.departmentID 
LEFT JOIN job ON employee.job = job.job_id ORDER BY employee.employeeID DESC";
$result = mysqli_query($link,$sql);
//echo table
echo "<h2>Show data From Employee</h2>";
//include 'header.php';
echo "<table border=0>";
echo "<tr>";
echo "<td>employeeID</td>";
echo "<td>picture</td>";
echo "<td>name</td>";
echo "<td>job</td>";
echo "<td>salary</td>";
echo "<td>DepartmentID</td>";
echo "</tr>";
//loop data
while ($dbarr = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>$dbarr[0]</td>";
    echo "<td><img size style=width:50px;height:50px src=uploads/".$dbarr[1]." ". "alt="."".$dbarr[2]."" . "></td>";
    echo "<td>$dbarr[2]</td>";
    echo "<td>$dbarr[4]</td>";
    echo "<td>".number_format($dbarr[3],2)."</td>";
    echo "<td>$dbarr[5]</td>";
    echo "<td><a href=delete.php?id=$dbarr[employeeID]>Delete</a> <a href=updateload2.php?id=$dbarr[employeeID]>Edit</a></td>";
    echo "</tr>";
}

echo "</table>";
mysqli_close($link);
include 'footer.php';

?>
