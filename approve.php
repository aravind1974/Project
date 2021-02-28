<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="page.css" type="text/css">
</head>
 <ul>
 <li><div class="container"><a href="adminhome.php" style=color:white; >HOME</a></div><li>
 </ul>
 </html>
<?php
    session_start();
    $email = $_SESSION['email'];
    $id = $_SESSION['id'];
    $con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
    $a=$_POST["Approved"];
    $qu=" update tb_req set approval='$a' where reqid='$id'";
    $dat=mysqli_query($con,$qu);
    if($a=="Active")
    {
        echo " REQUEST APPROVED";
    }
    else{
        echo "REJECTED";
    }
?>
