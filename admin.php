
<html>
    <head>
        <title>Add User</title>
        <!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    </head>
    <body >
     <div class="container">
       <div class="login-box">
        <div class="box-header">
         <h2>Register User</h2>
         </div>
<form name="register" id="register" action="admin.php" method="POST"> 
        <p>ID#:<input type="text" name="id" required></p>
	<p>First Name:<input type="text" name="fname" required></p>
        <p>Last Name:<input type="text" name="lname"  required></p>
        <p>User Name:<input type="text" name="username"  required></p>
        <p>Password:<input type="password" name="password" required pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$" title="passwords must have at least one number and one

letter, and one capital letter and are at least 8 digits long."></p>	
        	
        		<p><input type="submit"></p>
			</form>
</div>
	</div>
    </body>
</html>

<!--Add Records to Database-->
<?php
	$con = mysqli_connect("localhost","root","info2180","cheapo");
        $id=$_REQUEST["id"];
	$fname=$_REQUEST["fname"];
	$lname=$_REQUEST["lname"];
	$password=$_REQUEST["password"];
	$username=$_REQUEST["username"];
	
	$recipientIDs=$_REQUEST["recipient"];
	$subject=$_REQUEST["subject"];
	$body=$_REQUEST["message"];
	if(mysqli_connect_errno()){
		echo "Failed to connect to MySql: " . mysqli_connect_error();
	}
	
	//For Users
	$sql1 = "INSERT INTO User(ID, Firstname, Lastname, password, username) 
	VALUES
	(
                '$id',
		'$fname',
		'$lname',
		'$password',
		'$username'
	)";
	
	//For Messages
	$sql2 = "INSERT INTO Message(Body, Subject, User_id, Recipient_ids) 
	VALUES
	(
		'$body',
		'$subject',
		'$userId',
		'$recipientIDs'
	)";
	
	//For Messages_read
	$sql3 = "INSERT INTO Message_read(Message_id, Reader_id, Date) 
	VALUES
	(
		'$message_id',
		'$reader_id',
		'$date'
	)";
	
	if (!mysqli_query($con,$sql1)){
		die('Error: ' . mysqli_error($con));
	}
	echo "<p class='status' id='successful'>One Record has just been added.</p>";
	mysqli_close($con); 	
	
?>
