<?php

    $id=$_GET['id'];
   // $link = mysqli_connect('localhost','root','','employee');
   include 'dbconn.php';
    $query = "select e.name, e.job, e.salary, d.department, d.departmentID from employee e, department d where e.departmentID = d.departmentID and e.employeeID='$id'";
    $result = mysqli_query($link, $query);
    echo "<form action=update.php?Empno=$id method=get>";
    
    $dbarr = mysqli_fetch_row($result);
    ?>
    emploteeID<?php echo"$id";?><br>

name : <input type=text name=Ename value="<?php echo $dbarr[0];?>" ><br>
Job : <input type=text name=Ejob value="<?php echo $dbarr[1];?>" ><br>
Salary : <input type=text name=Esalary value="<?php echo $dbarr[2];?>" ><br>
<input type="hidden" name='Empno' value='<?php echo $id; ?>'><br>

<p>Department : <select name='Edepart'> 
<?php 
echo "<option value=$dbarr[4]> $dbarr[3]</option>";
$sql2 = "select * from department;";

$result2 = mysqli_query($link, $sql2);
while ($dbarr = mysqli_fetch_array($result2))
{ echo "<option value=$dbarr[departmentID]>$dbarr[department]</option>";}
echo "</select><p>";
echo "<input type=submit name=submit value=submit>";
echo "<input type=reset name=reset value=Cancel>";
echo "</form>";
mysqli_close($link);

?>
