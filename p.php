<!DOCTYPE html>
<html>
    <head>
    <title>Userp</title>
    <link rel="stylesheet" href="page.css" type="text/css">
    
    </head>
   

    
<?php
session_start();
$email = $_SESSION['email'];
$_SESSION['email']=$email;
$con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
$id = $_GET['id'];
if(isset($_GET['id']))
{
  $_SESSION['id']=$id;
    $query="select * from tb_req where reqid='$id'";
    $data=mysqli_query($con,$query);
    if(mysqli_num_rows($data)>0 )
    {
      while($row = mysqli_fetch_assoc($data))
     {
     
        
    
?>
    <body> 
    <ul>
            <li><div class="container" onclick="openNav(this)">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
                </div></li><li> <b><?php echo "PROJECT SEVA"?></b></li>
            <li> <?php echo $email;?></li>
        </ul>
        
        <div id="myNav" class="overlay" >
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav(this)">&times;</a>
            <div class="overlay-content">
               
                
      <a href="userhome.php">Home</a>
      <a href="logout.php">Logout</a>

            </div>
        </div>
   
       
     
    TOPIC   :<?php echo $row['topic'];?><br>
    CATEGORY: <?php echo $row['category'];?><br>
    DESCRIPTION : <?php echo $row['details']; ?><br>
    AMOUNT  : <?php echo $row['amnt'];?><br>
    <h5>UPI ID  : <?php echo $row['bno'];?><br></h5>

  <span style="cursor:pointer" onclick="openImg()">View Certificate</span></form><br>
  
  <div id="myImg" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeImg()">&times;</a>
      <div class="overlay-content">
        <img  src="<?php echo $row['img'];?>" ><br></div>
  </div>

    
        
  </body>
</html>     
<?php
      
      
    }
   }
}
else {
  echo "failed";
}
mysqli_close($con);
?>


<script>
function openImg() {
  document.getElementById("myImg").style.width = "100%";
}
function closeImg() {
  document.getElementById("myImg").style.width = "0%";
}
function openNav() {
  document.getElementById("myNav").style.width = "20%";
 
  }
function closeNav() {
  document.getElementById("myNav").style.width = "0%";
  
}
</script>