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
    <title>Dashboard</title>
</head>
<body>
    <form>
        
        <table border="1"  width="100%">
            <?php 
             include 'header.php';
            ?>

            <tr rowspan>
            <td >
            <legend>Account</legend>
            <?php include 'nav.php';?>
            </td>   
            <td>
                <h1>Welcome <?php echo $_SESSION['name'];?></h1>

            </td>
        </tr>


        <?php include 'footer.php';?>
        

        </table>
    </form>
    
</body>
</html>
