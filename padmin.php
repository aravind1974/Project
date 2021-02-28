<?php
session_start();
$email = $_SESSION['email'];
$_SESSION['email']=$email;
$con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Adminp</title>
    <link rel="stylesheet" href="page.css" type="text/css">
  
    </head>
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
               
                <a href="adminhome.php">Home</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
  



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



<?php
$id = $_GET['id'];
if(isset($_GET['id'])){
    $_SESSION['id']=$id;

} else {
  echo "failed";
}


$query=" select * from tb_req where reqid='$id'";
$data=mysqli_query($con,$query);

if(mysqli_num_rows($data)>0)
{
   
    while($row = mysqli_fetch_assoc($data))
    {
?>
    
    

     
 
       <h4> STATUS  : <?php echo $row['approval'];?><br></h4><form action="approve.php" method="post">
       
 EMAIL               :<?php echo $row['email'];?><br>
   TOPIC         :  <?php echo $row['topic'];?><br>
 DESCRIPTION :  <?php echo $row['details']; ?><br>
  CATEGORY       :  <?php echo $row['category'];?><br>
    AMOUNT REQUIRED : <?php echo $row['amnt'];?><br>
  
       
    
    <span style="cursor:pointer" onclick="openImg()">View Certificate<br></span>
    <div id="myImg" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeImg()">&times;</a>
      <div class="overlay-content">
        <img  src="<?php echo $row['img'];?>"  ><br></div>
  </div>
  
  <?php
  if($row['approval']=="Pending"){?> 
  
   <button name="Approved" type="submit" value="Active" id="Approved">APPROVE</button></body>
   <button name="Approved" type="submit" value="Rejected" id="Approved">REJECT</button></body>
  </form>
</html>     


<?php
    }}
    
}
mysqli_close($con);
?>
