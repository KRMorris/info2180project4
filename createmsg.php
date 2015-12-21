<html>
<body>	
	
	<div id="header">
		Welcome to Cheapo Mail
	</div>

	<div id = "navMenu">
		<ul>
			<li id="logoutButton"><a href="#">Logout</a></li>
		</ul>
	</div>
	
	<div id = "leftMenu">
		<ul>
			<li id="inboxButton"><a href="#">Profile</a></li>
		</ul>
	</div>
	
	<div id="contents">		
		<div id="instructions">			
			<span>Compose Message</span>
		</div>
			
		<form action="addItem.php" name="loginForm" id="loginForm" method="post">
			<label for="sender">From:</label>
			<input title="Enter your username here" type="text" name="sender" id="sender" value=<?php echo $_SESSION['currentUser'] ?> />
			
			<label for="recipient">To:</label>
			<input id="recipient" title="Enter recipient username" type="text" name="recipient" value="" />
			
			<label for="subject">Subject:</label>
			<input id="subject" title="Place the subject of your message here" type="text" name="subject"/>
			
			<label for="message" id="tagM">Message</label>			
			<textarea id="message" name="message" rows="10" cols="24"></textarea>
			
			<input type="button" id="submitButton" class="controller" value="Submit" />
			<input type="reset" class="controller" id="resetButton" value="Clear" />
			
		</form>
		
		<div id="errorMessages">
			
		</div>
		
	       </div>	
</body>
</html>
