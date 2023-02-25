<?php

/**
 * @author Josef Zemlicka
**/


error_reporting(E_ALL);
ini_set('display_errors', 1);


?>
<!DOCTYPE HTML> 
<html>
<head>
	<title>Contact us</title>
<!-- define some style elements-->
<style>
h1
{
	font-family : Arial, Helvetica, sans-serif;
	font-size : 16px;
    font-weight : bold;
}
label,a 
{
	font-family : Arial, Helvetica, sans-serif;
	font-size : 12px; 
}

</style>	
</head>

<body>
<button><a href="../players.php">Go back</a></button>
<h1>Add a new player to the database</h1>
<form method="POST" name="addplayerform" action="add-player-form-handler.php"> 
	<p>
		<label for='fname'>First Name:</label> <br>
		<input type="text" name="fname">
	</p>
	<p>
		<label for='lname'>Last Name:</label> <br>
		<input type="text" name="lname"> <br>
	</p>
	<p>
		<label for='country'>Country:</label> <br>
		<?php
			require_once 'countries-select.php';
		?>
	</p>
	<p>
		<label for='points'>Points:</label> <br>
		<input type="number" name="points">
	</p>
	<p>
		<label for='dob'>Date of Birth:</label> <br>
		<input type="date" name="dob">
	</p>
	<input type="submit" value="Submit"><br>
</form>
<script language="JavaScript">
var frmvalidator  = new Validator("addplayerform");
frmvalidator.addValidation("fname","req","Please enter a valid first name"); 
frmvalidator.addValidation("lname","req","Please enter a valid last name"); 
frmvalidator.addValidation("email","email","Please enter a valid email address");
frmvalidator.addValidation("points","req","Please enter a valid number of points");
frmvalidator.addValidation("dob","req","Please enter a valid date of birth"); 
</script>

</body>
</html>



