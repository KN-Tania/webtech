 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style type="text/css">
    	input[type=text]{
    		width: 100%;
    	}

    	input[type=password]{
    		width: 100%;
    	}

    	input[type=date]{
    		width: 100%;
    	}
    </style>
</head>
<body>
   
        
        <table border="1" width="100%"/>

            <?php 
             include 'header.php';
            ?>

        <tr rowspan>
            <td colspan ="2">
                <br><br>
<fieldset>
 <legend><b>AUDITOR REGISTRATION</b></legend>
  <form action="reg.php" method="POST">
    <br/>



  <!--  comments-->

<?php
  session_start();
?>



<!DOCTYPE html>
<html>
<style>
.error {color: #FF0000;}
</style>

<?php

    // define variables and set to empty values
    $nameErr  = $emailErr  = $usernameErr = $newpassErr = $renewpassErr = $genderErr= $birthdateErr= ""  ;

    $name = $email = $newpass = $renewpass = $username = $gender = $birthdate = "";

    $check=0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      
      
      //name validation//name validation//name validation
      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } 
      else {
        $name = test_input($_POST["name"]);
        
        //validating alphabet
        if (!preg_match("/^[a-zA-Z][a-zA-Z.\_\-]+ +[a-zA-Z.\-\_]+/",$name)) {
          $nameErr = "Only Can contain a-z, A-Z, period(.) , dash only(-) and at least two words";
        }
        else
          
          $check++;
          //!preg_match("/^[a-zA-Z-'{2,8} ]*$/",$name  
      }




      //email validation//email validation//email validation
    
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } 
      else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Must be a valid email_address : anything@example.Com";
        }
        else
          $check++;
      }
      
      //username username   
      if (empty($_POST["username"])) {
        $usernameErr = "username is required";
      } 
      else 
      {
          $username = test_input($_POST["username"]);
          //validating alphabet
          if (!preg_match("/^[0-9a-zA-Z-_]{2,}[^\s.]$/",$username)) {
            $usernameErr = "User Name must contain at least two (2) characters and can contain alpha numeric characters, period, dash or underscore only";
          }
          else
            $check++;
      }

     

      

      //password validation//password validation//password validation

      if(empty($_POST["newpass"])){
        $newpassErr=" must need to fill password";
      }else
        $newpass=test_input($_POST["renewpass"]);


      if(empty($_POST["renewpass"])){
        $renewpassErr=" must need to fill confirm password";
      }else
        $renewpass=test_input($_POST["renewpass"]);
      

      if (!preg_match("/^[0-9a-zA-Z@%#$]+$/",$newpass)) {
            $newpassErr = "Password must not be less than eight (8) characters contain at least one of the special characters (@, #, $, %)";
      }else if($_POST["newpass"]==$_POST["renewpass"]){
          $check++; 
      }
      else
        $renewpassErr="didn't macth the password ";





      //gender validation//gender validation//gender validation

      if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
      } 
      else {
        $gender = test_input($_POST["gender"]);
        $check++;
      }
      



      //date validation 
      if(empty($_POST["birthdate"])){
        $birthdateErr = " select up year, month, date ";
      }
      else{
        $birthdate = test_input($_POST["birthdate"]);
        $check++;
      }
      

      //form changing 
      if ($check == 6) {
                $sql = "SELECT * FROM auditor_info WHERE Audi_User_Name ='".$username."'";
                $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      echo "User already registered..!";
                  } else {
                    
                  $newpass = md5($newpass);

                  $pic = $username.'.png';
                  
                  $sql = "INSERT INTO auditor_info(Audi_Name , Audi_Email, Audi_User_Name , Audi_Password,Audi_Dob,Audi_Gender,Audi_Picture)
                    VALUES ('$name', '$email', '$username', '$newpass', '$birthdate', '$gender','$pic')";

                    if ($conn->query($sql) === TRUE) {
                      echo "New record created successfully";
                    } else {
                      echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                    $conn->close();
                    
                    echo "Registration Done..!";
                    //header('location:login.html');
               }
           
      }
  }
  

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>


<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <span class="error">(*) must need to fill </span><br>
  <fieldset>
    <legend  > <b> NAME:</legend><br>
		<input id="fullname" type="text" name="name"><br><br>
    <span class="error">* <?php echo $nameErr;?></span>
  </fieldset><br><br>

  <fieldset>
    <legend  > <b> EMAIL :</legend><br>
		<input id="validemail" type="text" name="email"><br><br>
    <span class="error">* <?php echo $emailErr;?></span>
		
  </fieldset><br><br>


  <fieldset>
    <legend  > <b>  User Name:</legend><br> 
    <input type="text" name="username" id="username"><br><br>
    <span class="error">* <?php echo $usernameErr;?></span><br><br> 
  </fieldset><br><br>



  <fieldset>
    <legend  > <b>Password :</legend><br>
      <input id="psw" type="Password" name="newpass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" minlength="8" required><br><br>
    <span class="error">* <?php echo $newpassErr;?></span><br><br>
    <div id="message">
              <h3>Password must contain the following:</h3>
              <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
              <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
              <p id="number" class="invalid">A <b>number</b></p>
              <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>
  </fieldset><br><br>


  <fieldset>
    <legend  > <b>Confirm Password :</legend><br>
    <input type="Password" id="cnfpsw" name="renewpass" minlength="8" required><br><br>
    <span class="error">* <?php echo $renewpassErr;?></span>
  </fieldset><br><br>


  

  <fieldset>
    <legend  > <b> DATE OF BIRTH:</legend><br>
  	<input type="date" min="1953-01-01" max="2021-12-31" id="birthdate" name="birthdate" required><br><br>
    <span class="error">* <?php echo $birthdateErr;?></span><br><br>
  </fieldset><br><br>


  <fieldset>
    <legend  > <b> GENDER :</legend><br>
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other
    <span class="error">* <?php echo $genderErr;?></span><br><br>
    
  </fieldset><br><br>

 <input type="submit" id="submit" name="submit" value="submit">&nbsp;&nbsp;

  

<!--echo $birthdate("mm")  echo date_format($birthdate,"Y/m/d H:i:s");-->


<?php include 'footer.php';?>
        

        </table>
    </form>
    
</body>

<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var fullname = document.getElementById("fullname");
var username = document.getElementById("username");
var validemail = document.getElementById("validemail");
var cnfpsw = document.getElementById("cnfpsw");
function validateEmail() {
  const re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  return validemail.value.match(re);
}

document.getElementById("submit").addEventListener("click", function(event){
  
  if(fullname.value===""){
    alert("Name is empty");
    event.preventDefault()
  }

  if(myInput.value===""){
    alert("password is empty");
    event.preventDefault()
  }

  if(validemail.value===""){
    alert("Email is empty");
    event.preventDefault()
  }

    if(username.value===""){
    alert("username is empty");
    event.preventDefault()
  }
 
 
  if(cnfpsw.value!=myInput.value){
    alert("confirm password did not matched");
    event.preventDefault()
  }

  if (!validateEmail()) {
    alert("Provide Correct email");
    event.preventDefault()
  }

  
});
// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
</html>

  




