<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "green_dhaka";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?> 


<tr>
    <td colspan ="2">
        

        <div class="one"><img width="180px" height="80" src="images/logo1.jpg"></div>
  <div class="two"><p style="text-align:right">
            <a href="index.php">Home</a> | <?php if(isset($_SESSION['name'])){?> Logged in as <a href="dashboard.php"><?php echo $_SESSION['name'];?>  </a> | <a href="logout.php">Logout</a> <?php }else{?><a href="login.php">Login</a> | <a href="reg.php"> Registration</a><?php }?>
        </p></div>
        <style>
.one {
  width: 50%;

  float: left;
}

.two {
  margin-left: 15%;
 

}
</style>
    
        
        
    </td>
</tr>