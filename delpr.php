<?php
     session_start();
     $email = $_SESSION['email'];
    $con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
    
  
    $q=" INSERT INTO tb_del (topic,amnt,category,email,reqid,approval)SELECT * FROM tb_req WHERE email ='$email'";
    
    $s = mysqli_query($con,$q);
    $e = mysqli_query($con,"delete from tb_admin where email='$email'");
    $e = mysqli_query($con,"delete from tb_req where email='$email'");
   // echo $email;
    header("Location:login.html");
?>