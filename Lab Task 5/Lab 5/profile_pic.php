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

        
        <table border="1"  width="100%">
            <?php 
             include 'header.php';
            ?>

            <tr rowspan>
            <td >
            <legend>Auditors Account</legend>
            <?php include 'nav.php';?>
            </td>   
            <td>
                

<fieldset>
      <legend><b>PROFILE PICTURE</b></legend>

        <img src="uploads/<?php echo $_SESSION['username'].'.png';?>" width="150"/>
<form id="frm-image-upload" action="profile_pic.php" name='img' method="post"
    enctype="multipart/form-data">
    <div class="form-row">
        <div>Choose Image file:</div>
        <div>
            <input type="file" class="file-input" name="fileToUpload">
        </div>
    </div>

    <div class="button-row">
        <input type="submit" value="Upload Image" name="submit">
    </div>
</form>

<div class="response">
    
<?php

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$finalpath = $target_dir . $_SESSION['username'] .".png";
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
  // Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 400000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  echo "Sorry, only JPG, JPEG, PNG  files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $finalpath)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}


?>
    
</div>
            </td>
        </tr>



    
            <?php include 'footer.php';?>
        
        
        

        </table>
 
    
</body>
</html>








