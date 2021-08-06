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
    <form>
        
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
                    <legend>PROFILE</legend>
                    <table>
        
                        <tr>
                            <td>Name: </td>
                            <td> <?php echo $_SESSION['name'];?> </td>
                        </tr>

                        <tr>
                            <td>Email: </td>
                            <td> <?php echo $_SESSION['email'];?> </td>
                            <td colspan="3">
                                <img align="right" width="100" height="120" src="uploads/<?php echo $_SESSION['username'].'.png';?>
                                "/>
                                <p><a href="profile_pic.php">Chanage</a><p>
                            </td>
                        </tr>

                        <tr>
                            <td>Gender: </td>
                            <td> <?php echo $_SESSION["gender"];?> </td>
                        </tr>

                        <tr>
                            <td>Date of Birth: </td>
                            <td><?php echo $_SESSION["dob"];?></td>

                        </tr>
                        

                    </table>
                </fieldset>

            </td>
        </tr>



        <tr>
            <td colspan="2" align=center>
            <footer>Copyright <span>&#169;</span>2020</footer></td>
        </tr>
        

        </table>
    </form>
    
</body>
</html>
