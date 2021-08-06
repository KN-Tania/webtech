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

$json = file_get_contents('php://input');
$data = json_decode($json);
$username=$data->username;
$balance = $data->balance;

$sql = "SELECT Balance FROM user_info WHERE User_Name ='".$username."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$balance = $balance+$result->fetch_assoc()["Balance"];
	$sql = "UPDATE user_info SET Balance ='$balance' WHERE User_Name ='$username'";

                                    if ($conn->query($sql) === TRUE) {
                                         echo json_encode('{"message":"Balance Added"}');
                                    } else {
                                      echo "Error updating record: " . $conn->error;
                                    }

	
	
}else{
	echo json_encode('{"message":"Missing user"}');
}


?> 