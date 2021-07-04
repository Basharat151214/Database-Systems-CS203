<!DOCTYPE html>
<html>
<head>
    <title>Enrollment Form</title>
</head>
<body>

<?php
$servername = "localhost";
$username = 'root';
$password = '';

try {
  $conn = new PDO("mysql:host=localhost;dbname=university", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>

<center>
<div>
<form action="enrollment_form.php" method="POST">
<h3> Search Student </h3>
Roll No : <input type ="text" name = "roll_no" value="" /><br></br>
<input type="submit" name="search" value="Search"/>
 </form>
</div>

<?php
$conn = mysqli_connect("localhost", "root", "");
$db =mysqli_select_db($conn,'university');

if(isset($_POST['search']))
{
    $query ="SELECT * FROM 'student' where roll_no like %search%";
    $query_run = mysqli_query($conn,$query);

while ($row = mysqli_fetch_array($query_run))
{
    ?>
   <tr> 
    <td> <?php echo  $row['roll_no'] ?></td>
    <td> <?php echo  $row['st_name'] ?></td>
    <td> <?php echo  $row['l_name'] ?></td>
    <td> <?php echo  $row['gender'] ?></td>
    <td> <?php echo  $row['contact'] ?></td>
    <td> <?php echo  $row['address'] ?></td>
    </tr>
    <?php
}
}
?>

</center>
</body>
</html>