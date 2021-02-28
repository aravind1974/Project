<?php
session_start();
$con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
$email=$_POST['name'];
$password=$_POST['pswd'];
$_SESSION['email']=$email;

    $query="select * from tb_admin where binary email='$email' or username='$email' and password='$password'";
    //echo $email;
    $data=mysqli_query($con,$query);
    if(mysqli_num_rows($data))
    {
      $row = mysqli_fetch_assoc($data);
      if(($email==="admin")||($username==="admin"))
      { 
        $query="select * from tb_admin where email='admin'"; 
        if($row['password']==$password) {
        header("Location:adminhome.php?id='NO'");}    
      }
      else{
     
      //$email=$row['email'];
     
      header("Location:userhome.php");
      
      }
    }
    else
    {
      printf("error: %s\n", mysqli_error($con));
      echo "<script> alert('INVALID USERNAME OR PASSWORD')</script>";
      echo "<script>location.href='login.html'</script>";
    }
  

mysqli_close($con);

?>