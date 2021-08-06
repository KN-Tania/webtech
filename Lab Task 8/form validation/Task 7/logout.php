<?php 
    session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["valid"]);
   unset($_SESSION["timeout"]);
   unset($_SESSION["password"]);
   unset($_SESSION["name"]);
   unset($_SESSION["email"]);
   unset($_SESSION["gender"]);
   unset($_SESSION["dob"]);
   echo 'You have cleaned session';
   header('location:login.php'); 

?>