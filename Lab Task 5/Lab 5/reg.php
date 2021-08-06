 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
    $nameErr  = $emailErr  = $usernameErr = $newpassErr = $renewpassErr = $genderErr= $cityerr = $phoneErr =$birthdateErr= ""  ;

    $name = $email = $newpass = $renewpass = $username = $gender = $birthdate= $phone = $city = "";

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

      if(empty($_POST["city"])){
        $cityerr=" must need to fill password";
      }else
        $city=test_input($_POST["city"]);

       if(empty($_POST["phone"])){
        $phoneErr=" must need to fill password";
      }else
        $phone=test_input($_POST["phone"]);

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
                $sql = "SELECT * FROM users WHERE username='".$username."'";
                $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      echo "User already registered..!";
                  } else {
                    
                  
                  $sql = "INSERT INTO users(name, email, username, phone, password,city,dob,gender,role)
                    VALUES ('$name', '$email', '$username', '$phone', '$newpass','$city', '$birthdate', '$gender','user')";

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
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
  <span class="error">(*) must need to fill </span><br>
  <fieldset>
    <legend  > <b> NAME:</legend><br>
		<input type="text" name="name"><br><br>
    <span class="error">* <?php echo $nameErr;?></span>
  </fieldset><br><br>

  <fieldset>
    <legend  > <b> EMAIL :</legend><br>
		<input type="text" name="email"><br><br>
    <span class="error">* <?php echo $emailErr;?></span>
		
  </fieldset><br><br>


  <fieldset>
    <legend  > <b>  User Name:</legend><br> 
    <input type="text" name="username"><br><br>
    <span class="error">* <?php echo $usernameErr;?></span><br><br> 
  </fieldset><br><br>

<fieldset>
    <legend  > <b>Phone :</legend><br>
    <input type="text" name="phone" minlength="10"><br><br>
    <span class="error">* <?php echo $phoneErr;?></span>
</fieldset><br><br>

  <fieldset>
    <legend  > <b>Password :</legend><br>
      <input type="Password" name="newpass" minlength="8"><br><br>
    <span class="error">* <?php echo $newpassErr;?></span><br><br>
  </fieldset><br><br>


  <fieldset>
    <legend  > <b>Confirm Password :</legend><br>
    <input type="Password" name="renewpass" minlength="8"><br><br>
    <span class="error">* <?php echo $renewpassErr;?></span>
  </fieldset><br><br>

<fieldset>
    <legend  > <b>City :</legend><br>
    <input type="text" name="city" minlength="2"><br><br>
    <span class="error">* <?php echo $cityerr;?></span>
</fieldset><br><br>
  

  <fieldset>
    <legend  > <b> DATE OF BIRTH:</legend><br>
  	<input type="date" min="1953-01-01" max="2021-12-31" id="birthdate" name="birthdate"><br><br>
    <span class="error">* <?php echo $birthdateErr;?></span><br><br>
  </fieldset><br><br>


  <fieldset>
    <legend  > <b> GENDER :</legend><br>
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other
    <span class="error">* <?php echo $genderErr;?></span><br><br>
    <input type="submit" value="submit">&nbsp;&nbsp;
  </fieldset><br><br>

 

  

<!--echo $birthdate("mm")  echo date_format($birthdate,"Y/m/d H:i:s");-->


<?php include 'footer.php';?>
        

        </table>
    </form>
    
</body>
</html>

  




