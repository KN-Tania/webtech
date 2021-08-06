<?php ob_start();
   session_start();

   if(!isset($_SESSION['valid'])){
    header('location:login.php'); 
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUDITOR PROFILE</title>
    <style type="text/css">
        input[type=password]{
            width: 100%;
        }
    </style>
</head>
<body>
        
        <table border="1"  width="100%">
            <?php 
             include 'header.php';
            ?>

            <tr rowspan class="web">
            <td class="vertical">
            <?php include 'nav.php';?>
            </td>   
            <td>
                <fieldset>
                    <legend><b>CHANGE PASSWORD</b></legend>
                    <form action="forgot_pass.php" method="POST">
                        Current Password:
                        <input type="password" id="cpsw" name="current" required>
                        <hr />
                        New Password:
                        <input type="password" id="psw" name="new" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" minlength="8" required>
                          <div id="message">
              <h3>Password must contain the following:</h3>
              <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
              <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
              <p id="number" class="invalid">A <b>number</b></p>
              <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>
                        <hr />
                        Retype New Password:
                        <input type="password"  id="cnfpsw" name="repeat" required>
                        <hr />
                        <input type="submit" id="submit" name ="submit" value="Submit" />
                    </form>
                         </td>
        </tr>

        <tr rowspan class="mobile">
            <td class="vertical">
            <?php include 'nav.php';?>
            </td>   
        </tr>
        <tr class="mobile">
            <td>
                <fieldset>
                    <legend><b>CHANGE PASSWORD</b></legend>
                    <form action="forgot_pass.php" method="POST">
                        Current Password:
                        <input type="password" name="current"/ required>
                        <hr />
                        New Password:
                        <input type="password" name="new"/ required>
                        <hr />
                        Retype New Password:
                        <input type="password" name="repeat"/ required>
                        <hr />
                        <input type="submit" name ="submit" value="Submit" />
                    </form>
                         </td>
        </tr>

                    <?php



                        if(isset($_POST['submit'])){
                            $currentPass = $_SESSION['password'];
                            $fCurrent = $_POST['current'];
                            $fnew = $_POST['new'];
                            $fretype = $_POST['repeat'];

                            if($fCurrent == $currentPass){
                                if($fCurrent == $fnew){
                                    echo "New password can't be same as current";
                                }else if($fretype == $fnew){
                                     // Create connection
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    // Check connection
                                    if ($conn->connect_error) {
                                      die("Connection failed: " . $conn->connect_error);
                                    }
                                    $username = $_SESSION['username'];
                                    

                                    $sql = "UPDATE users SET password='$fnew' WHERE username='$username'";

                                    if ($conn->query($sql) === TRUE) {
                                          
                                        echo "Password Changed";    
                                    } else {
                                      echo "Error updating record: " . $conn->error;
                                    }

                                    $conn->close();
                            
                                    

                                }else{
                                    echo "New Password Did not match with Repeat password";
                                }
                            }else{
                                echo "Current Password did not match";
                            }
                        }


                    ?>
                    
                </fieldset>


       



     <?php include 'footer.php';?>
        
        

        </table>

    
</body>
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
var cpsw = document.getElementById("cpsw");
var cnfpsw = document.getElementById("cnfpsw");


document.getElementById("submit").addEventListener("click", function(event){
  
  if(cpsw.value===""){
    alert("Current password is empty");
    event.preventDefault()
  }

  if(myInput.value===""){
    alert("password is empty");
    event.preventDefault()
  }


  if(cnfpsw.value!=myInput.value){
    alert("confirm password did not matched");
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



