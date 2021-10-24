<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="phanupon" content="empolyee, job">
<link rel="stylesheet" href="css/mystyle.css">
</head>
<body>
<?php
include "header.php";
//$email = $_GET["email"];
//$psw = $_GET["psw"];
//$username = $_GET["username"];
//$name = $_GET["name"];

//if(empty($_GET["register"])){
?>    
<br><br><br>
<!-- <form method="GET" action="<?php //echo ($_SERVER["PHP_SELF"]); ?>"> -->
<form method="GET" action="addmember.php"> 
  <div class="container">
    <h1>สมัครสมาชิก</h1>
    <p>กรุณากรอกข้อมูลให้ครบ.</p>
    <hr>
    <label for="username"><b>UserName</b></label>
    <input type="text" placeholder="Enter Loginname" name="loginname" id="loginname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <label for="name"><b>name</b></label>
    <input type="text" placeholder="Enter name and Lastname" name="name" id="name" required>

    <label for="name"><b>email</b></label>
    <input type="text" placeholder="Enter email address" name="email" id="email" required>
    <hr>
    <!-- <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> -->

    <button type="submit" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>เคยเป็นสมาชิกแล้ว <a href="login.php">Sign in</a>.</p>
  </div>
</form>
<?php
/*
}else{
   
    include "dbconn.php";
    $sql = "INSERT INTO member (UserID, Username, Password, Name, email, Status) VALUES (NULL, '$username', '$pwd', '$name', '$email', 'USER')";
    $result = mysqli_query($link, $sql);
   // mysqli_close($link);

   // INSERT INTO `member` (`UserID`, `Username`, `Password`, `Name`, `email`, `Status`) VALUES (NULL, 'admin', 'admin1234', 'admin', 'admin@gmail.com', 'USER');
    echo "email ".$email."<br>";
    echo "username ".$username."<br>";
    echo "name " . $name . "<br>";
}
*/
?>

</body>
</html>
