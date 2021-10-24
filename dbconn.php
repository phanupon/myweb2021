<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myweb";
//$link = mysqli_connect('sql211.unaux.com','unaux_28496335','94innzexrrl','unaux_28496335_employee');
$link = mysqli_connect($servername, $username, $password, $dbname);
if ($link->connect_errno){
    die("connection failed: ".$link->connect_error);
}
echo "Connected Successfully";
$link->set_charset("utf8");	
?>