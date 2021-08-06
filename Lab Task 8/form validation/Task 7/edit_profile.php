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
    <style type="text/css">
        input[type=text]{
            width: 100%;
        }
        input[type=date]{
            width: 100%;
        }
    </style>
</head>
<body>
        
        <table border="1"  width="100%">
            <?php 
             include 'header.php';
            ?>
        

            <tr rowspan class="web">
            <td class="vertical">
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
							<td><input name="name" id="fullname"type="text" value="<?php echo $_SESSION["name"];?> "></td>
							<td></td>
						</tr>		
						<tr><td colspan="4"><hr/></td></tr>
						<tr>
							<td>Email</td>
							<td>:</td>
							<td>
								<input name="email" id="validemail" type="text" value="<?php echo $_SESSION["email"];?>">
								<abbr title="hint: sample@example.com"><b>i</b></abbr>
							</td>
							<td></td>
						</tr>				
						<tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td>
                                <input name="phone" id="phone" type="text" value="<?php echo $_SESSION["phone"];?>">
                                
                            </td>
                            <td></td>
                        </tr>               
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td>City</td>
                            <td>:</td>
                            <td>
                                <input name="city" id="city" type="text" value="<?php echo $_SESSION["city"];?>">
                                
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
								<input name="dob" type="date"
								 value="<?php echo $_SESSION['dob']?>"
                                 required>
								<br/>
								<font size="2"><i>(dd/mm/yyyy)</i></font>
							</td>
							<td></td>
						</tr>
					</table>
					<hr/>
					<input type="submit" id="submit"  value="Submit" name="submit">		
				</form>
			


                  
                </fieldset>

            </td>
        </tr>

        <tr rowspan class="mobile">
            <td class="vertical">
            <?php include 'nav.php';?>
            </td>   
        </tr>
        <tr class="mobile">
            <td>
                <fieldset>
                <legend><b>EDIT PROFILE</b></legend>
                <form action="edit_profile.php" method="POST">
                    <br/>
                    <table width="100%" cellpadding="0" cellspacing="0">
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td><input name="name"  type="text" value="<?php echo $_SESSION["name"];?>" ></td>
                            <td></td>
                        </tr>       
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <input name="email"  type="text" value="<?php echo $_SESSION["email"];?>">
                                <abbr title="hint: sample@example.com"><b>i</b></abbr>
                            </td>
                            <td></td>
                        </tr>               
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td>
                                <input name="phone" type="text" value="<?php echo $_SESSION["phone"];?>">
                                
                            </td>
                            <td></td>
                        </tr>               
                        <tr><td colspan="4"><hr/></td></tr>
                        <tr>
                            <td>City</td>
                            <td>:</td>
                            <td>
                                <input name="city" type="text" value="<?php echo $_SESSION["city"];?>">
                                
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
                                 value="<?php echo $_SESSION['dob']?>">
                                <br/>
                                <font size="2"><i>(dd/mm/yyyy)</i></font>
                            </td>
                            <td></td>
                        </tr>
                    </table>
                    <hr/>
                    <input type="submit" value="Submit" name="submit">      
                </form>
            


                  
                </fieldset>

            </td>
        </tr>

  <?php



                        if(isset($_POST['submit'])){

                                    // Create connection
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    // Check connection
                                    if ($conn->connect_error) {
                                      die("Connection failed: " . $conn->connect_error);
                                    }
                                    $username = $_SESSION['username'];
                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $phone = $_POST['phone'];
                                    $city  = $_POST['city'];
                                    $dob = $_POST['dob'];
                                    $gender  = $_POST['gender'];

                                    $sql = "UPDATE users SET name='$name', email='$email',phone='$phone', city='$city',gender='$gender', dob='$dob' WHERE username='$username'";

                                    if ($conn->query($sql) === TRUE) {
                                          $_SESSION["name"]= $_POST['name'];
                                         $_SESSION["email"]= $_POST['email'];
                                         $_SESSION["gender"]= $_POST['gender'];
                                         $_SESSION["dob"]= $_POST['dob'];
                                         $_SESSION["phone"]= $_POST['phone'];
                                         $_SESSION["city"]= $_POST['city'];

                                        echo "Profile Changed";
                                    } else {
                                      echo "Error updating record: " . $conn->error;
                                    }

                                    $conn->close();
                            
                                   

                                     
                                     

                               
                        }


                    ?>

        <?php include 'footer.php';?>
        

        </table>

    
</body>

<script>

var fullname = document.getElementById("fullname");
var phone = document.getElementById("phone");
var validemail = document.getElementById("validemail");
var cnfpsw = document.getElementById("city");
function validateEmail() {
  const re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  return validemail.value.match(re);
}

document.getElementById("submit").addEventListener("click", function(event){
  
  if(fullname.value===""){
    alert("Name is empty");
    event.preventDefault()
  }


  if(validemail.value===""){
    alert("Email is empty");
    event.preventDefault()
  }

 
    if(phone.value===""){
    alert("phone is empty");
    event.preventDefault()
  }


  if (!validateEmail()) {
    alert("Provide Correct email");
    event.preventDefault()
  }

});
</script>
</html>





