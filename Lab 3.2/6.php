<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$bloodGroupErr = "";
$bloodGroup = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")  
{  
  if (empty($_POST["bloodGroup"]))

	  {
    $bloodGroupErr = "Option must be selected"; 
  } else {
    $bloodGroup = $_POST["bloodGroup"]; 
  }
}

?>

<h2> Blood Group Validation </h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Blood Group:
  <select name="bloodGroup">
    <option value="">--Select--</option>
    <option value="A+" <?php if ($bloodGroup == "A+") echo "selected";?>>A+</option>
    <option value="A-" <?php if ($bloodGroup == "A-") echo "selected";?>>A-</option>
    <option value="B+" <?php if ($bloodGroup == "B+") echo "selected";?>>B+</option>
    <option value="B-" <?php if ($bloodGroup == "B-") echo "selected";?>>B-</option>
    <option value="O+" <?php if ($bloodGroup == "O+") echo "selected";?>>O+</option>
    <option value="O-" <?php if ($bloodGroup == "O-") echo "selected";?>>O-</option>
    <option value="AB+" <?php if ($bloodGroup == "AB+") echo "selected";?>>AB+</option>
    <option value="AB-" <?php if ($bloodGroup == "AB-") echo "selected";?>>AB-</option>
  </select>
  <span class="error">* <?php echo $bloodGroupErr;?></span>
  <br><br>
 
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($bloodGroupErr)) {
    echo "<h3>selected blood group: $bloodGroup</h3>";
}
?>

</body>
</html>
