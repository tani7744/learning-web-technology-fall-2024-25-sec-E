<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$nameErr = "";
$name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (empty($_POST["name"]))
			{
				$nameErr = "Name is required";
			}
	else {
		$name = trim($_POST["name"]);

    if (str_word_count($name) < 2)
		{
      $nameErr = "Name must contain at least two words";
    }
   
		elseif (!preg_match("/^[a-zA-Z][a-zA-Z.\-\s]*$/", $name))
			{
			$nameErr = "Name must start with a letter and contain letters, periods, dashes, and spaces.";
			}
		}
	}

?>

<h2>Name validation</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name; ?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
 
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr)) {
    echo "<h3>Name is: " . htmlspecialchars($name) . "</h3>";
}
?>

</body>
</html>
