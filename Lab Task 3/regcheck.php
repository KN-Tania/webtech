<?php

    session_start(); 

    if(isset($_POST['submit'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $userName = $_POST['userName'];
        $password = ( $_POST['password']);
        $gender = $_POST['gender'];
        $day= $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $dob = "{$day}/{$month}/{$year}";
        if(empty($userName) || empty($email) || empty($password)){
            echo "Can't accept null";
        }else{
        	$str = file_get_contents('data.json');
        	$json = json_decode($str, true);

        	$newReg = array(['name' => $name, 'email' => $email,'username' => $userName,'password' => $password,'gender' => $gender,'dob' => $dob]);
        	$result = array_merge($json["data"], $newReg);
        	$jsona = json_encode(array('data' => $result));
        	file_put_contents("data.json", $jsona);

            
            echo "Registration Done..!";
            //header('location:login.html');
        }
    }

    else{
        echo "invalid request";
        header('location:login.html'); 

    }


?>