<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$nameErr = $emailErr = $genderErr = $degreeErr = $bloodgroupErr = "";
$name = $email = $gender = $degree = $bloodgroup = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "E-mail is required";
  } else {
    $email = test_input($_POST["email"]);
	
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
   if (empty($_POST["degree"])) {
    $degreeErr = "Degree is required";
  } else {
    $degree = test_input($_POST["degree"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation</h2>

<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <fieldset>
 <legend> Name: <input type="text" name="name"></legend>
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  <hr>
    <input type="submit" name="submit" value="Submit"> 
<br><br>
</fieldset>	
<br><br>
   <fieldset>
 <legend> E-mail: <input type="text" name="email"></legend>
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
   <hr>
    <input type="submit" name="submit" value="Submit"> 
   <br><br>
     </fieldset>
	 <br><br>
	 <fieldset>
  <legend>Gender: </legend>
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <hr>
  <input type="submit" name="submit" value="Submit">
  <br><br>
       </fieldset>
	   <br><br>
     <fieldset>
  <legend>Degree:</legend>
  <input type="radio" name="degree" value="ssc">Ssc
  <input type="radio" name="degree" value="hsc">Hsc
  <input type="radio" name="degree" value="bsc">Bsc
  <input type="radio" name="degree" value="msc">Msc
  <span class="error">* <?php echo $degreeErr;?></span>
  <br><br>
  <hr>
  <input type="submit" name="submit" value="Submit">  
  <br><br>
     </fieldset>
	 <br><br>
  <fieldset>
  <legend>Blood Group:</legend>
  <select name="blood">
  <option value="">Select</option>
  <option value="O+">O+</option>
  <option value="A+">A+</option>
  <option value="B+">B+</option>
  <option value="AB+">AB+</option>
  <option value="O-">O-</option>
  <option value="A-">A-</option>
  <option value="B-">B-</option>
  <option value="AB-">AB-</option>

  </select>
    <span class="error">* <?php echo $bloodgroupErr;?></span>
  <br><br>
  <hr>
  <input type="submit" name="submit" value="Submit" />
   </fieldset>
</form>



</body>
</html>