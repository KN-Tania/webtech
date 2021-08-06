<?php

    session_start();

    if(isset($_POST['submit'])){

        $userName = $_POST['userName'];
        $password = $_POST['password'];

        if(empty($userName) || empty($password)){
            echo "Username/Password is needed";
        }
        else if(!preg_match('/^[A-Za-z0-9_~\-!@#\$%\^&\*\(\)]+$/', $userName)){
             echo "Username can content Alphanumaric and underscore";
        }
        else{
            if(strlen($userName)>=2 && strlen($password)>=8){
                if(preg_match('/[^a-zA-Z\d]/', $password)){
                    $str = file_get_contents('data.json');
                    $json = json_decode($str, true);
                    $valuefinal = [];
                    foreach ($json["data"] as $value) {
                      if($value["username"]==$userName && $value["password"]==$password){
                        $valuefinal = $value;
                      }
                    } 
                    if(empty($valuefinal)){
                            echo "Wrong user name and Pass";
                    }else{
                    setcookie('name', $valuefinal["name"], time()+3600, '/'); 
                    setcookie('email', $valuefinal["email"], time()+3600, '/');
                    setcookie('userName', $valuefinal["username"], time()+3600, '/');
                    setcookie('password', $valuefinal["password"], time()+3600, '/');
                    setcookie('gender', $valuefinal["gender"], time()+3600, '/');
                    setcookie('dob', $valuefinal["dob"], time()+3600, '/');
                    header('location:view_prof.php'); 
                }
                }else{
                    echo "passwrod need to have one special char.";
                }
            }
            else{
                if(strlen($userName)<2){
                    echo "Username has to be more than 2 char";
                }else{
                    echo "password 8 chars";
                }
                
            }
        }

    }
    else{
        echo "invalid request";
        header('location:login.html'); 

    }


?>