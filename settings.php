<?php
    session_start();
    $email = $_SESSION['email'];
    $con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
    $query="select * from tb_admin where email='$email' or username='$email'";
    $data=mysqli_query($con,$query);
    if(mysqli_num_rows($data)>0 && $email!="admin")
    {
     $row = mysqli_fetch_assoc($data);
     
     $email = $row['email']; 
     $_SESSION['email']=$email;
?>

<!DOCTYPE html>
    <html>
        <head>
        <title>Settings</title>
        <link rel="stylesheet" href="page.css" type="text/css">
        </head>
        <body>
       
        <div class="overlay">
        <a href="userhome.php">Home</a>
            <div class="overlay-content">

               <a href="deletereq.php">Delete Request</a>
                <a href="delpr.php">Delete Account</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
        </body>

    <style>
    .overlay{
  display: inline-block;
  cursor: pointer;
  float: left;
  width:100%;
  
}
    </style>
    </html>     
    <?php
}
else
{
 echo "Error";
}   
 mysqli_close($con);   
?> 