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
    <title>PROFILE</title>
</head>
<body>
        
        <table border="1"  width="700px">
            <tr>
            <td colspan ="2">
            <img width="50" height="30" src="uploads/user.png">
             
             <align = right> Logged in as <?php echo $_SESSION['name'];?> | <a href="logout.php">Logout</a></align>


        
            </td>
           
            </tr>

            <tr rowspan>
            <td >
            <legend>Account</legend>
            <?php include 'nav.php';?>
            </td>   
            <td>
                <fieldset>
                    <legend><b>CHANGE PASSWORD</b></legend>
                    <form action="forgot_pass.php" method="POST">
                        Current Password:
                        <input type="password" name="current"/>
                        <hr />
                        New Password:
                        <input type="password" name="new"/>
                        <hr />
                        Retype New Password:
                        <input type="password" name="repeat"/>
                        <hr />
                        <input type="submit" name ="submit" value="Submit" />
                    </form>


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
                                    $str = file_get_contents('data.json');
                                    $json = json_decode($str, true);
                                   
                                    $i=0;
                                    foreach ($json["data"] as $value) {
                                      if($value["username"]==$_SESSION["username"]){
                                        
                                        break;
                                      }
                                      $i++;
                                    } 

                                     $bal = $json["data"][$i];
                                     $bal["password"]= $fnew;
                                     $json["data"][$i]= $bal;
                                    
                                    $json_object = json_encode($json);
                                    file_put_contents('data.json', $json_object);
                                    echo "Password Changed";

                                }else{
                                    echo "New Password Did not match with Repeat password";
                                }
                            }else{
                                echo "Current Password did not match";
                            }
                        }


                    ?>
                </fieldset>

            </td>
        </tr>



        <tr>
            <td colspan="2" align=center>
            <footer>Copyright <span>&#169;</span>2020</footer></td>
        </tr>
        

        </table>

    
</body>
</html>



