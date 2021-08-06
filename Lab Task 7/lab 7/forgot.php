<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot</title>
</head>
<body>
        
        <table border="1" width="100%">
            <?php include 'header.php';?>

        <tr rowspan>
            <td colspan ="2">
                <br><br>
                <fieldset>
                    <legend><b>Forgot Password</b></legend>
                    <form action="forgot.php" method="POST">
                        <table>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><input type="text" name="email"></td>
                            </tr>
                        
                        </table>
                        <hr>
                        <input type="submit" name="submit" value="Submit">  


                        
                    </form>

                    <?php
                     if(isset($_POST['submit'])){
                        $str = file_get_contents('data.json');
                        $json = json_decode($str, true);
                        $valuefinal = [];
                        foreach ($json["data"] as $value) {
                          if($value["email"]== $_POST['email']){
                            $valuefinal = $value;
                            break;
                          }
                        } 
                        if(empty($valuefinal)){
                                echo "Wrong Email address";
                        }else{
                            echo "Email Exists";
                        }
                    }
                    ?>
                </fieldset>
                <br><br>
                
            </td>
        </tr>



         <?php include 'footer.php';?>
        

        </table>

    
</body>
</html>
