<!DOCTYPE html>
<html>
<head>
  <title>Request</title>
  <link rel="stylesheet" href="page.css" type="text/css">
  
  
</head>



<?php
    session_start();
    $em=$_SESSION['email'];
    $con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
    $query="select * from tb_req where email='$em' ";
    $data=mysqli_query($con,$query);
    if(mysqli_num_rows($data)>0)
    {
     $row = mysqli_fetch_assoc($data);
     
    // $per=round((( $row['payments']/$row['amnt'])*100),0);
    // $p=$per/2;
     
?> 



<body>
<ul>
            <li><div class="container" onclick="openNav(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
                </div></li>
            <li> <b><?php echo "PROJECT SEVA"?></b></li><li> <?php echo $em;?></li>
        </ul>
        <div id="myNav" class="overlay" >
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav(this)">&times;</a>
            <div class="overlay-content">
               <a href="userhome.php">Home</a>
               
                <a href="settings.php">Settings</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
      
   
    


     
      
        STATUS: <?php echo $row['approval']; ?><br>
        TOPIC : <?php echo $row['topic']; ?><br>   
        DESCRIPTION : <?php echo $row['details']; ?><br>       
        CATEGORY: <?php echo $row['category']; ?><br>        
        AMOUNT REQUIRED : <?php echo $row['amnt']; ?><br>
        






<?php
}
else
{
 echo "Error";
}   
 mysqli_close($con);   
?>



</body>       
    
</html>  
<script>
function openNav(x) {
  document.getElementById("myNav").style.width = "20%";
 
}
function closeNav(x) {
  document.getElementById("myNav").style.width = "0%";
  
}
</script>  