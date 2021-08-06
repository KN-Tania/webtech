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
        

            <tr rowspan class="web">
            <td class="vertical">
            <?php include 'nav.php';?>
            </td>   
            <td>

                <a href="add_routes.php">Add Routes</a>
                <fieldset>
			    <legend><b>LIST OF ROUTES</b></legend>
                <?php 
                $key = "";
                 if(isset($_POST['submit'])){
                            $key = $_POST["search"];
                }?>
                    <form action="routes.php" method="POST">
                        <input type="text" name="search" placeholder="Destination" value="<?php echo $key?>"> 
                        <input type="submit" name="submit" value="search">
                    </form>
                    <?php

                       // Create connection
                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                        // Check connection
                        if (!$conn) {
                          die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM routes";
                        

                        if(isset($_POST['submit'])){
                            $key = $_POST["search"];
                            $sql = "SELECT * FROM routes WHERE destination LIKE '%$key%'";
                        }

                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {?>
                            <table border="1"  width="100%">
                                <tr>
                                    <th>Time</th>
                                    <th>Start Place</th>
                                    <td>Destination</th>
                                    <th>Action</th>
                                </tr>
                                <?php  
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {?>
                                <tr>
                                    <td><?php echo $row["starttime"]; ?></td>
                                    <td><?php echo $row["start"]; ?></td>
                                    <td><?php echo $row["destination"]; ?></td>
                                    <td><a href="route_edit.php?id=<?php echo $row["id"]; ?>">Edit</a> | <a href="route_delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                                </tr>
                            <?php }?>
                            </table>

                        <?php  
                        } else {
                          echo "0 results";
                        }

                        mysqli_close($conn);
                        ?>


                </fieldset>

            </td>
        </tr>
        <tr rowspan class="mobile">
            <td class="vertical">
            <?php include 'nav.php';?>
            </td>  
        </tr>
        <tr class="mobile"> 
            <td>

                <a href="add_routes.php">Add Routes</a>
                <fieldset>
                <legend><b>LIST OF ROUTES</b></legend>
                <?php 
                $key = "";
                 if(isset($_POST['submit'])){
                            $key = $_POST["search"];
                }?>
                    <form action="routes.php" method="POST">
                        <input type="text" name="search" placeholder="Destination" value="<?php echo $key?>"> 
                        <input type="submit" name="submit" value="search">
                    </form>
                    <?php

                       // Create connection
                        $conn = mysqli_connect($servername, $username, $password, $dbname);
                        // Check connection
                        if (!$conn) {
                          die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM routes";
                        

                        if(isset($_POST['submit'])){
                            $key = $_POST["search"];
                            $sql = "SELECT * FROM routes WHERE destination LIKE '%$key%'";
                        }

                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {?>
                            <table border="1"  width="100%">
                                <tr>
                                    <th>Time</th>
                                    <th>Start Place</th>
                                    <td>Destination</th>
                                    <th>Action</th>
                                </tr>
                                <?php  
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {?>
                                <tr>
                                    <td><?php echo $row["starttime"]; ?></td>
                                    <td><?php echo $row["start"]; ?></td>
                                    <td><?php echo $row["destination"]; ?></td>
                                    <td><a href="route_edit.php?id=<?php echo $row["id"]; ?>">Edit</a> | <a href="route_delete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                                </tr>
                            <?php }?>
                            </table>

                        <?php  
                        } else {
                          echo "0 results";
                        }

                        mysqli_close($conn);
                        ?>


                </fieldset>

            </td>
        </tr>


        <?php include 'footer.php';?>
        

        </table>

    
</body>
</html>





