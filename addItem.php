
<!--Add Records to Database-->
<?php
	$con = mysqli_connect("localhost","root","info2180","cheapo");
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
	$sql1 = "INSERT INTO User(Firstname, Lastname, password, username) 
	VALUES
	(
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
