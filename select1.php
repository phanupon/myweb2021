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

$sql = 'SELECT * FROM employee';
$result = mysqli_query($link,$sql);
//echo table
echo "<h2>Show data From Employee</h2>";
//include 'header.php';
echo "<table border=1>";
echo "<tr>";
echo "<td>employeeID</td>";
echo "<td>name</td>";
echo "<td>job</td>";
echo "<td>salary</td>";
echo "<td>DepartmentID</td>";
echo "</tr>";
//loop data
while ($dbarr = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>$dbarr[employeeID]</td>";
    echo "<td>$dbarr[name]</td>";
    echo "<td>$dbarr[job]</td>";
    echo "<td>$dbarr[salary]</td>";
    echo "<td>$dbarr[departmentID]</td>";
    echo "<td><a href=delete.php?id=$dbarr[employeeID]>Delete</a> <a href=updateload2.php?id=$dbarr[employeeID]>Edit</a></td>";
    echo "</tr>";
}

echo "</table>";
mysqli_close($link);
include 'footer.php';

?>