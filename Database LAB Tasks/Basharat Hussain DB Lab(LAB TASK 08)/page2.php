<!DOCTYPE html>
<html>
<head>
	<title>Event registration Record</title>
<style >
	
	h1 {text-align: center;}
	div {text-align: center;}
</style>
</head>
<body>

<?php

// (isset($_POST['user_id'])) {



$username = 'root';
$password = '';
$dbname = "nutec";

//check connection

try{
    $conn =new PDO("mysql:host=localhost; dbname=nutec", $username, $password);
    //set the PDO error mode to exception
    $conn ->setAttribute( PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connected successfully';

}catch(PDOException $e){
    echo 'Connection failed: '. $e->getMessage();
}

//$user_id = $_POST["user_id"];
$query_1 = $conn->prepare('SELECT * from registrations');
$query_1->execute();
$result= $query_1->fetchAll(PDO::FETCH_ASSOC);


?>










<div>
	<form action="page2.php"method= "POST">
		<div class="container">
			<fieldset style="width:700px">

			<h1>Nutec'21 Event Record</h1>

			<label for="searchby"><b>Search by:</b></label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
			<select name="searchby" id="cars">
			  <option value="rollno">Roll No</option>
			  <option value="chooseEvent">Events</option>
			  <option value="department">Departments</option>
			</select>
			<br><br> 

			<label for="enterdata"><b>Enter data:</b></label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
			<input type="text" name="enterdata" required>
			<br><br>


			<div><input  type="submit" style="color: #FFFFFF;background-color: #0000FF" name="create" value="Output">
			</div>


	<h2>Output</h2>


		</div>
	</fieldset>
	</form>
</div>



</body>
</html>