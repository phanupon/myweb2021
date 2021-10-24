<?php
$Ename = $_GET["Ename"];
$Ejob = $_GET["Ejob"];
$Esalary = $_GET["Esalary"];
$Empno = $_GET["Empno"];
$Edepart = $_GET["Edepart"];

//$link = mysqli_connect('localhost','root','','employee');
include 'dbconn.php';
$query = "update employee set name='$Ename',job='$Ejob', salary='$Esalary', departmentID='$Edepart' where employeeID='$Empno' ";

$result = mysqli_query($link, $query);

if($result){
    include 'header.php';
    echo "Edit data sucess full <a href='select1.php'>Show data</a>";
    header('Location: select1.php');
}else {
    echo "Can not Edit data in Data base";
    
}

?>