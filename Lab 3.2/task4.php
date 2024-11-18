<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
 $genderErr = "";
  $gender = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
  
			if (empty($_POST["gender"]))
				{
					$genderErr = "Gender is required";
					
					} 
			else {
				$gender = $_POST["gender"]; 
									}
			}

?>

		<h2>Gender Validation</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Gender: 
  <input type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo "checked";?>> Male
  <input type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked";?>> Female
  <input type="radio" name="gender" value="Other" <?php if ($gender == "Other") echo "checked";?>> Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
 
  <input type="submit" name="submit" value="Submit">  
	</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($genderErr)) {
    echo "<h3>selected gender is: $gender</h3>";
}
?>

</body>
</html>
