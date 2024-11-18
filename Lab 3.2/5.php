<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$degreeErr = "";
$degrees = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
 
  if (empty($_POST["degrees"])) {
    $degreeErr = "At least two options must be selected.";
  } 
  else
		{
			$degrees = $_POST["degrees"];
		if (count($degrees) < 2) {
		$degreeErr = "At least two options must be selected.";
				}
			}
		}

?>

<h2>Degree Validation</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Degree: <br>
  <input type="checkbox" name="degrees[]" value="SSC" <?php if (in_array("SSC", $degrees)) echo "checked";?>> SSC
  <input type="checkbox" name="degrees[]" value="HSC" <?php if (in_array("HSC", $degrees)) echo "checked";?>> HSC
  <input type="checkbox" name="degrees[]" value="BSc" <?php if (in_array("BSc", $degrees)) echo "checked";?>> BSc
  <input type="checkbox" name="degrees[]" value="MSc" <?php if (in_array("MSc", $degrees)) echo "checked";?>> MSc
  <span class="error">* <?php echo $degreeErr;?></span>
  <br><br>
 
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($degreeErr)) {
    echo "<h3> selected Degree: " . implode(", ", $degrees) . "</h3>";
}
?>

</body>
</html>
