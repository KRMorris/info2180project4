<?php
	
		$userName = $_POST["username"];
		$password = $_POST["passWord"];
		$currentUserName = $userName;
	?>
	
	<?php
	]
	
	if($username != "" && $password != "")
	{
		$notEmpty = TRUE;
	}
	?>
	
	<?php
			
	$con = mysqli_connect("localhost","root","info2180","cheapo");
	
	// Verify connection to MySql
	if(mysqli_connect_errno())
	{
		echo "Failed to connect to MySql: " . mysqli_connect_error();
	}
	
	
	
	$resultUsers = mysqli_query($con, "SELECT * FROM User Where username = '$username'");
	
	$names = mysqli_fetch_array($resultUsers);
	
	if($names != "")
	{
		$userCheck = TRUE;	
	}
	
	//get password exists check	
	$resultPasswords = mysqli_query($con, "SELECT password FROM User Where username = '$username'");//this query returns an array		
	
	$userPassword = mysqli_fetch_array($resultPasswords);
	
	if($userPassword != "")
	{
		$passwordExistsCheck = TRUE;
	}
	
	//verify if password corresponds with user
	$resultUserForPassword = mysqli_query($con, "SELECT username FROM User Where password = '$password'");
	
	$userPassCheck = mysqli_fetch_array($resultUserForPassword);
	
	if($userPassCheck != "")
	{
		$userPasswordMatch = TRUE;
	}
	
	if($userCheck && $passwordExistsCheck && $userPasswordMatch && $notEmpty)
	{
		echo "<br><p class='status' id='successful'>That entry successful. Everything matches</p>";
		header("Location: homescreen.php");			
	}
	else
	{
		echo "<br><p class='status' id='error'>Error: Invalid Username or Password</p>";
	}
