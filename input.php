<?php
$id = $_GET["id"];
$name = $_GET["name"];
$job = $_GET["job"];
$salary = $_GET["salary"];
$departmentID = $_GET["departmentID"];
include "header.php";
//$link = mysqli_connect('localhost','root','','employee');
include "dbconn.php";

$sql = "INSERT INTO `employee` (`employeeID`, `name`, `job`, `salary`, `departmentID`) VALUES('$id', '$name', '$job', '$salary', '$departmentID');";
      //INSERT INTO `employee` (`employeeID`, `name`, `job`, `salary`, `departmentID`) VALUES ('2222', 'joy arunrung', 'sale', '25000', '1111');";
$result = mysqli_query($link, $sql);
mysqli_close($link);
echo $id;
echo $name;
echo $job;
echo $salary;
echo $departmentID;
if($result){
    echo "insert data sucess <a href=select1.php>แสดงข้อมูล</a>";
}else {
    echo "can not insert data to employee";
   // header("location:select1.php");  
}
include "footer.php";
?>