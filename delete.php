<?php
$id = $_GET['id'];
include 'dbconn.php';
//$link = mysqli_connect('localhost','root','','employee');
$sql = "delete from employee where employeeID = '$id'";
$result = mysqli_query($link, $sql);

if ($result) {
    echo "Delete data sucess <a href=select1.php>Show Data</a>";
    header('Location: select1.php');	
}else {
    echo "can not delete data <a href=select1.php>Show data</a>";
}

?>