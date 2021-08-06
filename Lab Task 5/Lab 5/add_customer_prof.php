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
    <title> Add Customer Profile </title>
</head>
<body>
    <form>
        
        <table border="1"  width="700px">
            <tr>
            <td colspan ="2">
            <img width="180px" height="80" src="images/logo1.jpg">
             
             <align = right> Logged in as <?php echo $_SESSION['name'];?> | <a href="logout.php">Logout</a></align>


         <tr
    
        
            </td>
           
            </tr>

            <tr rowspan>
            <td >
            <legend>Auditor Account</legend>
            <?php include 'nav.php';?>
            </td>   
            <td>
                <h1> Add Customer Profile </h1>

            </td>
        </tr>



        <tr>
            <td colspan="2" align=center>
            <footer>Copyright <span>&#169;</span>2021</footer></td>
        </tr>
        

        </table>
    </form>
    
</body>
</html>
