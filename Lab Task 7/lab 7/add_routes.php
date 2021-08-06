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
                <fieldset>
			    <legend><b>Add Route</b></legend>
                
                    <form action="add_routes.php" method="POST">
                        <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>Start Place</td>
                            <td>:</td>
                            <td><input name="start" type="text" ></td>
                            <td></td>
                        </tr>       
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td>Destincation </td>
                            <td>:</td>
                            <td><input name="destination" type="text" ></td>
                            <td></td>
                        </tr>       
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td>Start Time </td>
                            <td>:</td>
                            <td><input name="starttime" type="text" ></td>
                            <td></td>
                        </tr>       
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td>End Time </td>
                            <td>:</td>
                            <td><input name="endtime" type="text" ></td>
                            <td></td>
                        </tr>   
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td>Price </td>
                            <td>:</td>
                            <td><input name="price" type="text" ></td>
                            <td></td>
                        </tr>       
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td>Seats </td>
                            <td>:</td>
                            <td><input name="seats" type="text" ></td>
                            <td></td>
                        </tr>       
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td><input type="submit" name="submit" value="Add"></td>
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

                                $start = $_POST['start'];
                                $destination = $_POST['destination'];
                                $starttime = $_POST['starttime'];
                                $endtime = $_POST['endtime'];
                                $price = $_POST['price'];
                                $seats = $_POST['seats'];

                                 $sql = "INSERT INTO routes(start, destination, starttime, endtime, price,seats)
                                    VALUES ('$start', '$destination', '$starttime', '$endtime', '$price','$seats')";

                                    if ($conn->query($sql) === TRUE) {
                                      echo "New record created successfully";
                                    } else {
                                      echo "Error: " . $sql . "<br>" . $conn->error;
                                    }

                                    $conn->close();
                                    
                                    echo "Route Add Done..!";
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





