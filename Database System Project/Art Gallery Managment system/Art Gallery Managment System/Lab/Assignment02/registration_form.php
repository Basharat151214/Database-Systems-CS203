
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

<div>
<?php
$code = $_POST['crs_code'];
$name = $_POST['crs_name'];
$hours =$_POST['cdt_hours'];
$qry =$conn->prepare( "INSERT INTO Courses VALUES ('$code','$name','$hours')");
$qry->execute();
if($qry){
    echo "Data is Retrieved Sucessfully";
}
?>
</div>





<center>
<div>
<h2> Registration Form </h2>
<form action="registration_form.php" method="POST">
Course Code: <input type ="text" name = "crs_code" value="" /><br></br>
Course Name: <input type ="text" name = "crs_name" value="" /><br></br>
Credits: <input type ="text" name = "cdt_hours" value="" /><br></br>
<input type="submit" name="submit" value="Submit"/>
</form>
</div>
</center>


</body>
</html>