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


$sql = "SELECT * FROM user_info";
$result = $conn->query($sql);
$myArray = array();
if ($result->num_rows > 0) {

	while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
    }
    echo '{"data":'.json_encode($myArray).'}';
}

?> 