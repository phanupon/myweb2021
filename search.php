<?php
include 'header.php';
session_start();
  
if($_SESSION['UserID'] == "")
{
echo "Please Login!";
header('Location: login.php');
    exit();
}

if($_SESSION['Status'] != "ADMIN")
{
    echo "This page for Admin only!";
    exit();
}	
//$link = mysqli_connect('localhost','root','','employee');
include 'dbconn.php';
//$sql1 = "use myweb";
//$result = mysqli_query($link,$sql1);

//$sql = 'SELECT * FROM employee';
?>
<?php
if(empty($_GET["search_by"])) {
?>
<h2>Program search Employee data</h2>
<?php 
//include 'header.php';
?>
<table border=1>
 <tr>
 
 <td>
 <form method=get action="<?php echo ($_SERVER["PHP_SELF"]); ?>">
 Search by <select name=search_by>
 <option value=1>All Employee data</option>
 <option value=2>Employee ID</option>
 <option value=3>Employee Name</option>
 <option value=4>Job</option>
 <option value=5>Department ID</option>
 </select>
 <input type=text name=key><br>
 <input type=submit name=send value=search>
 </form>
 </td>
 </tr>
<tr>
<td>
<?php     
}else{
    
echo "<h2>Program search Employee Data</h2>";    
//include 'header.php';
echo "<table border=1>";
echo "<tr><td>";
echo "<form method=get action=search.php>";
echo "Search by <select name=search_by> 
<option value=1>All Employee data</opyion>
<option value=2>EmployeeID</opyion>
<option value=3>Employee Name</opyion>
<option value=4>Job</opyion>
<option value=5>DepartmentID</opyion>
</select>
<input type=text name=key><br>";
echo "<input type=submit name=send value=search>";
echo "</td>";
echo "</form>";
echo "</tr>";
echo "<tr><td>";

$search_by = $_GET['search_by'];
$key = $_GET['key'];
//dATABASE CONN
//$link = mysqli_connect('localhost','root','','employee');
include 'dbconn.php';

if($search_by==1){
    $sql = "select * from employee;";
}elseif ($search_by==2){
    $sql = "select * from employee where employeeID=$key;";
}elseif ($search_by==3){
    $sql = "select * from employee where name Like '%$key%';";
}elseif ($search_by==4){
    $sql = "select * from employee where job Like '%$key%';";
}elseif ($search_by==5){
    $sql = "select * from employee where departmentID=$key;";
}

$result2 = mysqli_query($link, $sql);

echo "<table border=1>";
echo "<tr>";
echo "<td>EmployeeID</td>";
echo "<td>Name</td>";
echo "<td>Job</td>";
echo "<td>Salary</td>";
echo "<td>DepartmentID</td>";
echo "</tr>";
while ($dbarr=mysqli_fetch_array($result2))
{
    echo "<tr>";
    echo "<td>$dbarr[employeeID]</td>";
    echo "<td>$dbarr[name]</td>";
    echo "<td>$dbarr[job]</td>";
    echo "<td>".number_format($dbarr['salary'],2)."</td>";
    echo "<td>$dbarr[departmentID]</td>";
    echo "<td><a href=delete.php?id=$dbarr[employeeID]>Delete</a> <a href=updateload2.php?id=$dbarr[employeeID]>Edit</a></td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($link);
echo"</td>";
echo" </tr>";
echo " </table>";
}
include 'footer.php';
?>
