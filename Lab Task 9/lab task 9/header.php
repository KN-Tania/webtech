<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "greendhaka";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?> 

<link rel="stylesheet" href="css/style.css" type="text/css">

    <div class="bg-color top-nav">
            <div class="one"><img width="180px" height="80" src="images/logo1.jpg"></div>
           <div class="two horizontal">
            <ul>
                <li> <a href="index.php">Home</a></li>
                <?php if(isset($_SESSION['name'])){?>  <li><a href="dashboard.php"> Logged in as <?php echo $_SESSION['name'];?>  </a> </li> <li><a href="logout.php">Logout</a> </li><?php }else{?><li><a href="login.php">Login</a> </li> <li><a href="reg.php"> Registration</a></li><?php }?>
               
              </ul>
          </div>      
    </div>
