<?php

    session_start(); 

    if(isset($_POST['submit'])){
        $currentPass = "abc@1234";
        $fCurrent = $_POST['current'];
        $fnew = $_POST['new'];
        $fretype = $_POST['repeat'];

        if($fCurrent == $currentPass){
            if($fCurrent == $fnew){
                echo "New password can't be same as current";
            }else if($fretype == $fnew){
                echo "Password Changed";
            }else{
                echo "New Password Did not match with Repeat password";
            }
        }else{
            echo "Current Password did not match";
        }
    }else{
        echo "a";
    }


?>