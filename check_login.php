<?php
    include "header.php";
	session_start();
    //$username = $_GET["textUsername"];
    $txtUsernamr = $_POST["txtUsername"];
    $txtPassword = $_POST["txtPassword"];
    
  //$id = $_GET["id"];
    //$password = $_GET["txtPassword"];
/*	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myweb";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    */
    include 'dbconn.php';
    if(!$link){
        die ("Failed to connect to MySQL". mysqli_connect_error());
    }
    $username = mysqli_real_escape_string($link,$txtUsernamr);
    $password = mysqli_real_escape_string($link,$txtPassword);
    $password = md5($txtPassword);
    $sql = "SELECT * FROM member WHERE Username = '$username' and Password = '$password';";
	//$sql = "SELECT * FROM member WHERE Username='$username' and Password='$password';";
    $result = mysqli_query($link,$sql);
	$objResult = mysqli_fetch_array($result);
 	if(!$objResult)
	{
			echo "Username and Password Incorrect!";
	}
	else
	{	
        $_SESSION["UserID"] = $objResult["UserID"];
			$_SESSION["Status"] = $objResult["Status"];

			session_write_close();
			
			if($objResult["Status"] == "ADMIN")
			{
				header("location:admin_page.php");
			}
			else
			{
				header("location:user_page.php");
			}
	}
    mysqli_close($link);
?>