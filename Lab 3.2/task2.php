<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$emailErr = "";
$email = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
		if (empty($_POST["email"])) 
		{
			$emailErr = "Email Add is required";
  }
  else {
		$email = trim($_POST["email"]);

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$emailErr = "Invalid email ,Example: anything@example.com";
    }
  }
}

?>

<h2> Email Validation</h2>

	<p><span class="error">* required field</span></p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
   Email: <input type="text" name="email" value="<?php echo $email; ?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
 
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($emailErr)) {
		echo "<h3>email is: " . htmlspecialchars($email) . "</h3>";
	}
		?>

		</body>
	</html>
