
<html>
    <head>
        <title>Add User</title>
    </head>
    <body>
        <form name="register" id="register" action="addItem.php" method="POST"> 
        <h1>Register User</h1>
	<p>First Name:<input type="text" name="fname" required></p>
        <p>Last Name:<input type="text" name="lname"  required></p>
        <p>User Name:<input type="text" name="username"  required></p>
        <p>Password:<input type="password" name="password" required pattern="^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$" title="passwords must have at least one number and one

letter, and one capital letter and are at least 8 digits long."></p>	
        	
        		<p><input type="submit"></p>
			</form>
	
    </body>
</html>
