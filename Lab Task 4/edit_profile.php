<?php ob_start();
   session_start();

   if(!isset($_SESSION['valid'])){
    header('location:login.php'); 
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROFILE</title>
</head>
<body>
        
        <table border="1"  width="700px">
            <tr>
            <td colspan ="2">
            <img width="50" height="30" src="uploads/user.png">
             
             <align = right> Logged in as <?php echo $_SESSION['name'];?> | <a href="logout.php">Logout</a></align>


        
            </td>
           
            </tr>

            <tr rowspan>
            <td >
            <legend>Account</legend>
            <?php include 'nav.php';?>
            </td>   
            <td>
                <fieldset>
			    <legend><b>EDIT PROFILE</b></legend>
				<form action="edit_profile.php" method="POST">
					<br/>
					<table width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td>Name</td>
							<td>:</td>
							<td><input name="name" type="text" value="<?php echo $_SESSION["name"];?>"></td>
							<td></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td>
								<input name="email" type="text" value="<?php echo $_SESSION["email"];?>">
								<abbr title="hint: sample@example.com"><b>i</b></abbr>
							</td>
							<td></td>
						</tr>				
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Gender</td>
							<td>:</td>
							<td>   
								<input name="gender" type="radio" <?php if($_SESSION["gender"]=="male") echo 'checked="checked"';?> value="male">Male
								<input name="gender" type="radio" <?php if($_SESSION["gender"]=="female") echo 'checked="checked"';?> value="female">Female
								<input name="gender" type="radio" <?php if($_SESSION["gender"]=="other") echo 'checked="checked"';?> value="other">Other
							</td>
							<td></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td valign="top">Date of Birth</td>
							<td valign="top">:</td>
							<td>
								<input name="dob" type="text"
								 value="<?php echo $_SESSION['dob']?>"
								<br/>
								<font size="2"><i>(dd/mm/yyyy)</i></font>
							</td>
							<td></td>
						</tr>
					</table>
					<hr/>
					<input type="submit" value="Submit" name="submit">		
				</form>
			


                    <?php



                        if(isset($_POST['submit'])){
                            
                                    $str = file_get_contents('data.json');
                                    $json = json_decode($str, true);
                                   
                                    $i=0;
                                    foreach ($json["data"] as $value) {
                                      if($value["username"]==$_SESSION["username"]){
                                        
                                        break;
                                      }
                                      $i++;
                                    } 

                                     $bal = $json["data"][$i];
                                     $bal["name"]= $_POST['name'];
                                     $bal["email"]= $_POST['email'];
                                     $bal["gender"]= $_POST['gender'];
                                     $bal["dob"]= $_POST['dob'];
                                     $json["data"][$i]= $bal;
                                    
                                    $json_object = json_encode($json);
                                    file_put_contents('data.json', $json_object);
                                     $_SESSION["name"]= $_POST['name'];
                                     $_SESSION["email"]= $_POST['email'];
                                     $_SESSION["gender"]= $_POST['gender'];
                                     $_SESSION["dob"]= $_POST['dob'];

                                    echo "Profile Changed";

                               
                        }


                    ?>
                </fieldset>

            </td>
        </tr>



        <tr>
            <td colspan="2" align=center>
            <footer>Copyright <span>&#169;</span>2020</footer></td>
        </tr>
        

        </table>

    
</body>
</html>





