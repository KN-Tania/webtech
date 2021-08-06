
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
        
        <table border="1" width="700px">
            <?php include 'header.php';?>

        <tr rowspan>
            <td colspan ="2">
                <br><br>
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
                    foreach ($json["data"] as $value) {
                      if($value["username"]==$userName && $value["password"]==$password){
                        $valuefinal = $value;
                        break;
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
                    setcookie('name', $valuefinal["name"], time()+3600, '/'); 
                    setcookie('email', $valuefinal["email"], time()+3600, '/');
                    setcookie('userName', $valuefinal["username"], time()+3600, '/');
                    setcookie('password', $valuefinal["password"], time()+3600, '/');
                    setcookie('gender', $valuefinal["gender"], time()+3600, '/');
                    setcookie('dob', $valuefinal["dob"], time()+3600, '/');
                    setcookie('remember', $valuefinal["remember"], time()+3600, '/');
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
                   <legend><b> Login</b></legend>
                    <form action="login.php" method="POST">
                        <table>
                            <tr>
                                <td>User Name</td>
                                <td>:</td>
                                <td><input type="text" name="userName" required></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>:</td>
                                <td><input type="password" name="password" required></td>
                            </tr>
                        </table>
                        <hr />
                        <input name="remember" name="remember" type="checkbox"/> Remember Me
                        <br/><br/>
                        <input type="submit" name="submit" value="Submit">  
                        <a href="forgot.php">Forgot Password?</a>


                        
                    </form>



                </fieldset>
                <br><br>
                
            </td>
        </tr>



         <?php include 'footer.php';?>
        

        </table>

    
</body>
</html>

