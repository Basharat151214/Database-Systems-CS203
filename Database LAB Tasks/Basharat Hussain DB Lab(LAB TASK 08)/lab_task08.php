<!DOCTYPE html>
<html>
<head>
	<title>User registration</title>
</head>
<body>

	<?php

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

?>



<div>
	<?php
	if (isset($_POST['create'])) {
		$rollno =$_POST['rollno'];
		$name  =$_POST['name'];
		$email   =$_POST['email'];
		$department = $_POST['department'];
		$chooseEvent  = $_POST['chooseEvent'];



	

		$stmt = $conn->prepare("INSERT INTO registrations VALUES('$rollno','$name','$email','$department','$chooseEvent' )");
		$stmt->execute();







	}else
	

	?>
</div>


<div>
	<form action="lab_task08.php"method= "POST">
		<div class="container">
			<h1>Nutec'21 Event Registration for FASTIANS</h1>


			<fieldset style="width:1000px">

			<label for="rollno"><b>Roll No</b></label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
			<input type="text" name="rollno" required>
			<br><br> 

			<label for="name"><b>Name</b></label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
			<input type="text" name="name" required>
			<br><br>

			<label for="email"><b>Email Address</b></label>&emsp;&emsp;&emsp;&emsp;&nbsp;
			<input type="email" name="email" required>
			<br><br>

			<label for="department"><b>Department</b></label>&emsp;&emsp;&emsp;&emsp;
			<select name="department" id="dept" >
			
			 <option value="Computer Science">Computer Science</option>
			 <option value="Electrical Engineering">Electrical Engineering</option>
			 <option value="Software Engineering">Software Engineering</option>
			 <option value="Artificial Intelligence">Artificial Intelligence</option>
			</select>

			<br><br>

			<label for="chooseEvent"><b>Choose Event</b></label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
			<select name="chooseEvent" id= "events"  >

			 <option value="Speed Programming">Speed Programming</option>
			 <option value="GNight">GNight</option>
			 <option value="Book Fair">Book Fair</option>
			 <option value="Sports Week">Sports Week</option>
			 </select>
			
			<br><br>


			<input  type="submit" style="color: #FFFFFF;background-color: #0000FF" name="create" value="Sign Up">
		</div>
	</fieldset>
	</form>
</div>



</body>
</html>