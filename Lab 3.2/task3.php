<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$ddErr = $mmErr = $yyyyErr = "";
$dd = $mm = $yyyy = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
		if (empty($_POST["dd"]))
			{
				$ddErr = "Day is required";
  } 
	else {
			$dd = $_POST["dd"];
    if (!is_numeric($dd) || $dd < 1 || $dd > 31)
		{
			$ddErr = "Invalid day. Must be between 1 and 31.";
		}
	}

  
	if (empty($_POST["mm"]))
		{
			$mmErr = "Month is required";
			} 	
	else {
			$mm = $_POST["mm"];
		if (!is_numeric($mm) || $mm < 1 || $mm > 12)
			{
				$mmErr = "Invalid month. Must be  between 1 and 12.";
				}
			}

  
	if (empty($_POST["yyyy"]))
		{
        $yyyyErr = "Year is required";
		} 
		else
			{
				$yyyy = $_POST["yyyy"];
			if (!is_numeric($yyyy) || $yyyy < 1953 || $yyyy > 1998) 
			{
					$yyyyErr = "Invalid Must be between 1953 and 1998.";
				}
			}	
		}

?>

 <h2> DOB Validation</h2>
  <p><span class="error">* required field</span></p>
       <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        Date of Birth: <br>
  <input type="text" name="dd" value="<?php echo $dd; ?>" size="2" placeholder="dd"> /
  <input type="text" name="mm" value="<?php echo $mm; ?>" size="2" placeholder="mm"> /
  <input type="text" name="yyyy" value="<?php echo $yyyy; ?>" size="4" placeholder="yyyy">
  <br>
  <span class="error"><?php echo $ddErr; ?></span><br>
  <span class="error"><?php echo $mmErr; ?></span><br>
  <span class="error"><?php echo $yyyyErr; ?></span><br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($ddErr) && empty($mmErr) && empty($yyyyErr)) {
    echo " date of birth is: $dd/$mm/$yyyy</h3>";
}
?>

</body>
</html>
