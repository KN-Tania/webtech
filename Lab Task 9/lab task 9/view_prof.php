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
        
        <table border="1"  width="100%">
            <?php 
             include 'header.php';
            ?>

            <tr rowspan class="web">
            <td class="vertical">
            <?php include 'nav.php';?>
            </td>   
            <td style="width: 80%;">
                <fieldset>
                    <legend>AUDITOR PROFILE</legend>
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

        <tr rowspan class="mobile">
            <td class="vertical">
            <?php include 'nav.php';?>
            </td>            </tr>
            <tr class="mobile"> 
            <td>
                <fieldset>
                    <legend>AUDITOR PROFILE</legend>
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
