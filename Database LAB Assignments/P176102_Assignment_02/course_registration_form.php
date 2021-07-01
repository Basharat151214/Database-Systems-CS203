
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php
error_reporting(0);
$servername = "localhost";
$username = 'root';
$password = '';

try {
  $conn = new PDO("mysql:host=localhost;dbname=university", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>


<div>


<?php

$course_code = $_POST['course_code'];
$course_name = $_POST['course_name'];
$credit_hours =$_POST['credit_hours'];

$stmt =$conn->prepare( "INSERT INTO Courses VALUES ('$course_code','$course_name','$credit_hours')");
$stmt->execute();

if($stmt){
    echo "Data is inserted Sucessfully";
}




?>
</div>





<center>


<div>
<h2> Course Registration Form </h2>
<form action="course_registration_form.php" method="POST">
Course Code: <input type ="text" name = "course_code" value="" /><br></br>
Course Name: <input type ="text" name = "course_name" value="" /><br></br>
Credits: <input type ="text" name = "credit_hours" value="" /><br></br>
<input type="submit" name="submit" value="Submit"/>

 </form>
</div>


</center>





</body>
</html>