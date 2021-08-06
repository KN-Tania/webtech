<?php ob_start();
   session_start();

   if(!isset($_SESSION['valid'])){
    header('location:login.php'); 
   }

   if(!isset($_GET['id'])){
        header('location:routes.php'); 
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routes</title>
</head>
<body>
        
        <table border="1"  width="100%">
            <?php 
             include 'header.php';
            ?>
        

            <tr rowspan>
            <td class="vertical">
            <?php include 'nav.php';?>
            </td>   
            <td>

                <?php 
                                $start = $destination = $starttime = $endtime = $price =  $seats = "";
                    $conn = mysqli_connect($servername, $username, $password, $dbname);
                                // Check connection
                                if (!$conn) {
                                  die("Connection failed: " . mysqli_connect_error());
                                }
                    $sql = "SELECT * FROM routes WHERE id='".$_GET['id']."'";
                    $result = $conn->query($sql);
                    if (mysqli_num_rows($result) > 0) {
                      // output data of each row
                      while($row = mysqli_fetch_assoc($result)) {
                                $start = $row['start'];
                                $destination = $row['destination'];
                                $starttime = $row['starttime'];
                                $endtime = $row['endtime'];
                                $price = $row['price'];
                                $seats = $row['seats'];
                      }
                    } else {
                      echo "0 results";
                    }

                ?>

                <fieldset>
			    <legend><b>Edit Route</b></legend>
                
                    <form action="route_delete.php?id=<?php echo $_GET['id'];?>" method="POST">
                        <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>Start Place</td>
                            <td>:</td>
                            <td><?php echo $start; ?></td>
                            
                        </tr>       
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td>Destincation </td>
                            <td>:</td>
                            <td><?php echo $destination; ?></td>
                            
                        </tr>       
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td>Start Time </td>
                            <td>:</td>
                            <td><?php echo $starttime; ?></td>
                        </tr>       
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td>End Time </td>
                            <td>:</td>
                            <td><?php echo $endtime; ?></td>
                        </tr>   
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td>Price </td>
                            <td>:</td>
                            <td><?php echo $price; ?></td>
                        </tr>       
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td>Seats </td>
                            <td>:</td>
                            <td><?php echo $seats; ?></td>
                        </tr>       
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td><input type="submit" name="submit" value="Delete"></td>
                        </tr>
                        </table>
                    </form>
                    
                        <?php 
                        if(isset($_POST['submit'])){
                               // Create connection
                                $conn = mysqli_connect($servername, $username, $password, $dbname);
                                // Check connection
                                if (!$conn) {
                                  die("Connection failed: " . mysqli_connect_error());
                                }

                               
                                $id = $_GET['id'];
                                $sql = "DELETE FROM routes WHERE id='$id'";
                                    if ($conn->query($sql) === TRUE) {
                                      echo "Route Deleted successfully";
                                      header('location:routes.php'); 

                                    } else {
                                      echo "Error: " . $sql . "<br>" . $conn->error;
                                    }

                                    $conn->close();
                                    
                                    //header('location:login.html');
                        }
                        ?>

                </fieldset>

            </td>
        </tr>



        <?php include 'footer.php';?>
        

        </table>

    
</body>
</html>





