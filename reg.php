<?php
$con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
$email=$_POST["mail"];
$password=$_POST["pswd"];
$name=$_POST["name"];
$phone=$_POST["num"];
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
  }


$sql = "INSERT INTO tb_admin(username,email,phone,password) VALUES('$name','$email',$phone,'$password' )";

$result = mysqli_query($con, $sql);
if ( false===$result ) {
    printf("error: %s\n", mysqli_error($con));
  }

if($result)
{
   // echo "<script> alert('data entered successfully')</script>";
    echo "<script>location.href='login.html'</script>";
}
 else
{
    echo "<script> alert('Unable to save data!')</script>";
}
mysqli_close($con);
?> 