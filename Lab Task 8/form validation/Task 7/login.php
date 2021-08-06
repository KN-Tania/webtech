
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auditor Login</title>
</head>
<body>
        
        <table border="1" width="100%">
            <?php include 'header.php';?>

        <tr rowspan>
            <td colspan ="2">
                <br><br>
                <div class="center-mid">
                <fieldset>
                    <?php


   ob_start();
   session_start();


    if(isset($_POST['submit'])){

        $userName = $_POST['userName'];
        $password = $_POST['password'];

        if(empty($userName) || empty($password)){
            echo "Username/Password is needed";
        }
        else if(!preg_match('/^[A-Za-z0-9_~\-!@#\$%\^&\*\(\)]+$/', $userName)){
             echo "Username can content Alphanumaric and underscore";
        }
        else{
            if(strlen($userName)>=2 && strlen($password)>=8){
                if(preg_match('/[^a-zA-Z\d]/', $password)){
                    $str = file_get_contents('data.json');
                    $json = json_decode($str, true);
                    $valuefinal = [];
                    $sql = "SELECT * FROM users WHERE username='".$userName."'";
                    $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {

                    
                            $valuefinal["username"] = $row["username"];
                            $valuefinal["name"]= $row["name"];
                            $valuefinal["password"] = $row["password"];
                            $valuefinal["email"] = $row["email"];
                            $valuefinal["gender"] = $row["gender"];
                            $valuefinal["dob"] = $row["dob"];
                            $valuefinal["phone"] = $row["phone"];
                            $valuefinal["city"] = $row["city"];
                            $valuefinal["role"] = $row["role"];
                          }
                      }
                    if(empty($valuefinal)){
                            echo "Wrong user name and Pass";
                    }else{
                    $_SESSION['valid'] = true;
                    $_SESSION['timeout'] = time();
                    $_SESSION['username'] = $valuefinal["username"];
                    $_SESSION['name'] = $valuefinal["name"];
                    $_SESSION['password'] = $valuefinal["password"];
                    $_SESSION['email'] = $valuefinal["email"];
                    $_SESSION['gender'] = $valuefinal["gender"];
                    $_SESSION['dob'] = $valuefinal["dob"];
                    $_SESSION['phone'] = $valuefinal["phone"] ;
                    $_SESSION['city'] = $valuefinal["city"] ;
                    $_SESSION['role'] = $valuefinal["role"] ;
                    

                    if($_POST["remember"]){
                    	setcookie('username', $valuefinal["username"], time()+3600, '/');
                    	setcookie('password', $valuefinal["password"], time()+3600, '/');
                    }
                    
                    header('location:view_prof.php'); 
                }
                }else{
                    echo "passwrod need to have one special char.";
                }
            }
            else{
                if(strlen($userName)<2){
                    echo "Username has to be more than 2 char";
                }else{
                    echo "password 8 chars";
                }
                
            }
        }

    }
   

?>
                    <legend><b>Auditor Login</b></legend>
                    <form action="login.php" method="POST">
                        <table>
                            <tr>
                                <td>User Name</td>
                                <td>:</td>
                                <td><input type="text" id="usrname" name="userName" <?php if(isset($_COOKIE["username"])){ echo 'value="'.$_COOKIE["username"].'"'; }?> required></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>:</td>
                                <td><input type="password"  id="psw" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" <?php if(isset($_COOKIE["username"])){ echo 'value="'.$_COOKIE["password"].'"';} ?> required></td>
                            </tr>
                        </table>
                        <hr />
                        <input name="remember" type="checkbox">Remember Me
                        <br/><br/>
                        <input type="submit" name="submit" value="Submit">  
                        <a href="forgot.php">Forgot Password?</a>


                        
                    </form>
                    <div id="message">
						  <h3>Password must contain the following:</h3>
						  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
						  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
						  <p id="number" class="invalid">A <b>number</b></p>
						  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
						</div>

                </fieldset>
                </div>
                <br><br>
                
            </td>
        </tr>



         <?php include 'footer.php';?>
        

        </table>

    
</body>

<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

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

