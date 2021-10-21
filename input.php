<?php
$id = $_GET["id"];
$name = $_GET["name"];
$job = $_GET["job"];
$salary = $_GET["salary"];
$departmentid = $_GET["departmentid"];

// connectdata base

//$link = mysqli_connect('localhost','root','','employee');
include 'dbconn.php';
$query = "use myweb";
$result = mysqli_query($link, $query);

$sql = "INSERT INTO `employee` (`employeeID`, `name`, `job`, `salary`, `departmentID`) VALUES('$id','$name','$job','$salary','$departmentid');";
         //INSERT INTO `employee` (`employeeID`, `name`, `job`, `salary`, `departmentID`) VALUES ('2222', 'joy arunrung', 'sale', '25000', '1111');";
$result = mysqli_query($link, $sql);
//mysqli_close($link);
//echo $id;
//echo $name;

if($result){
    echo "insert data sucess <a href=select1.php>แสดงข้อมูล</a>";
}else {
    echo "can not insert data to employee";
   
}

?>