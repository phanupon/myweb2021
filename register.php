<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
    

<?php

if(empty($_GET["register"])){
?>    
<br><br><br>
<form method="GET" action="<?php echo ($_SERVER["PHP_SELF"]); ?>">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="pswrepeat" id="pswrepeat" required>
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>
<?php
}else{
    $email = $_GET["email"];
    $psw = $_GET["psw"];
    $pswrepeat = $_GET["pswrepeat"];
    
    echo "email ".$email."<br>";
    echo "pwd ".$psw."<br>";
    echo "repasswd " . $pswrepeat . "<br>";
}
?>
</body>
</html>
