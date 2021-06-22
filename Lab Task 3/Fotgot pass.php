<?php

    session_start(); 

    if(isset($_POST['submit'])){
        $fCurrent Password = $_POST['Current Password'];

        if($fCurrent Password === $_COOKIE["Current Password"]){
            echo "Please wait while we send you an OTP";
        }
    }
    if(isset($_POST['submit'])){
        $fNew Password = $_POST['New Password'];

        if($fNew Password === $_COOKIE["New Password"]){
            echo "Please wait while we send you an OTP";
        }
    }
    if(isset($_POST['submit'])){
        $fRetype New Password = $_POST['Retype New Password'];

        if($fRetype New Password === $_COOKIE["Retype New Password"]){
            echo "Please wait while we send you an OTP";
        }
    }
    else{
        echo "Error occured";
    }


?>