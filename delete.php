<?php
$id = $_GET['id'];
include 'dbconn.php';
//$link = mysqli_connect('localhost','root','','employee');
$sql = "delete from employee where employeeID = '$id'";
$result = mysqli_query($link, $sql);

if ($result) {
    echo "Delete data sucess <a href=select1.php>Show Data</a>";
}else {
    echo "can't delete data <a href=select1.php>Show data</a>";
}

?>