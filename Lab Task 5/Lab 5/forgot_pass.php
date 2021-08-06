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
</head>
<body>
        
        <table border="1"  width="100%">
            <?php 
             include 'header.php';
            ?>

            <tr rowspan>
            <td >
            <legend>Auditor Account</legend>
            <?php include 'nav.php';?>
            </td>   
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

            </td>
        </tr>



     <?php include 'footer.php';?>
        
        

        </table>

    
</body>
</html>



