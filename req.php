<?php
session_start();
$email = $_SESSION['email'];
$_SESSION['email']=$email;
$con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
$help=$_POST["help"];
$Bank=$_POST["Bno"];
$amt=$_POST["amt"];
$details=$_POST["desc"];
$category=$_POST["category"];
$query="select * from tb_req ";
$data=mysqli_query($con,$query);
$row = mysqli_fetch_assoc($data);

if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fil"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fil"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  $new_name = $target_dir."$Bank.".$imageFileType;
  if (move_uploaded_file($_FILES["fil"]["tmp_name"], $new_name)) {
    //echo "The file ". htmlspecialchars( basename( $_FILES["fil"]["name"])). " has been uploaded.";
    $files=1;
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}



$sql = "INSERT INTO tb_req (email,topic,amnt,category,bno,details,img) VALUES('$email','$help','$amt','$category','$Bank','$details','$new_name' )";
if($sql){
    $s=1;
}
$result = mysqli_query($con, $sql);
if ( false===$result ) {
    printf("error: %s\n", mysqli_error($con));
  }

if($result&&$files)
{
    //echo "<script> alert('data entered successfully')</script>";
    echo "<script>location.href='Userhome.php'</script>";
}
 else
{
    echo "<script> alert('Unable to save data!')</script>";
}
mysqli_close($con);
?> 