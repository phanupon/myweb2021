<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
//insert Data Base
$employeeID = $_POST["employeeID"];
$name = $_POST["name"];
$job = $_POST["job"];
$salary = $_POST["salary"];
$departmentID = $_POST["departmentID"];
$fileToUpload = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
include "dbconn.php";

//insert data
$sql = "INSERT INTO employee (employeeID, name, job, salary, departmentID, picture)
VALUES ('$employeeID', '$name', '$job', '$salary', '$departmentID','$fileToUpload')";
// Test mysql query 
if (mysqli_query($link, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($link);
}
//close connection 
mysqli_close($link);
include "header.php";
echo "<a href=select1.php>Showdata</a>";
//goto select1.php show list data
header("Location: select1.php"); 
?>
