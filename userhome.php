<?php
    session_start();
    $email = $_SESSION['email'];
    $con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
    $query="select * from tb_admin where email='$email' or username='$email'";
    $data=mysqli_query($con,$query);
    if(mysqli_num_rows($data)>0 && $email!="admin")
    {
     $row = mysqli_fetch_assoc($data);
     //<a href="contact.php">Contact</a>
     $email = $row['email']; 
     $_SESSION['email']=$email;
?>

<!DOCTYPE html>
    <html>
        <head>
        <title>Home</title>
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
               <a href="request.php">Request</a>
                <a href="settings.php">Settings</a>
               
                <a href="logout.php">Logout</a>
            </div>
        </div>
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

<?php 
$query1="select * from tb_req where approval='Active' AND email!='$email' ";
$data1=mysqli_query($con,$query1);
if(mysqli_num_rows($data1)>0)
{   
    while($row = mysqli_fetch_assoc($data1))
    {
        $em= $row['reqid'];
?>
    <p>   <a href="p.php?id=<?php echo $em; ?>"><?php echo $row['topic'];?></a></p>
<?php
    }  
}


else{
    printf("NO ACTIVE REQUESTS");    
}
} 
else{
    printf("error  : %s\n", mysqli_error($con));
}
if ( false===$data ) {
    printf("error  v : %s\n", mysqli_error($con));
  }
mysqli_close($con);
?>
    