<?php
include ('connect.php');
?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
         
	session_start(); 
	
        $_SESSION['currentUser'] = $_POST['username'];
	
?>

<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Cheapo Mail | Login</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/animate.css">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

        <script>

        function goToLogin()
        {
                var loginBrowser;
                if(window.XMLHttpRequest)
                {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                         loginBrowser=new XMLHttpRequest();
                }
                else
                {
                        // code for IE6, IE5
                         loginBrowser=new ActiveXObject("Microsoft.XMLHTTP");
                }
                
                loginBrowser.onreadystatechange=function()
                {
                         if (loginBrowser.readyState==4 && loginBrowser.status==200)
                         {
                                 document.body.innerHTML=loginBrowser.responseText;
                         }
                 };
                 
                 loginBrowser.open("GET",window.location.href = "http://localhost/cmail/adminLogin.php",true);
                 loginBrowser.send();                
                
        }
        $('registerButton').onclick = function()
        {
                goToLogin();
        };
	
	</script>
        </script>
</head>

<body>
	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">Cheapo <span>Mail</span></span></h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
				<h2>Log In</h2>
			</div>
			<form name="signin" action="loginUI.php" method="POST">
			<label for="username">Username</label>
			<br/>
			<input type="text" id="username" name="username">
			<br/>
			<label for="password">Password</label>
			<br/>
			<input type="password" id="password" name="password">
			<br/>
			<button type="submit">Sign In</button>
			<br/>
			</form>
		</div>
	</div>
</body>

<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>
<?php

$con = mysqli_connect("localhost","root","info2180","cheapo");
session_start(); 

	$password=$_REQUEST["password"];
	$username=$_REQUEST["username"];
$_SESSION['currentUser'] = $username;
	if(mysqli_connect_errno()){
		echo "Failed to connect to MySql: " . mysqli_connect_error();
	}

if($username == 'admin' && $password =='admin'){
			
		header("location: admin.php");
		exit();
	}
else{

	
	
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
}


?>

</html>
