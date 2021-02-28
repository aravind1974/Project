<?php
    session_start();
   // $em=$_SESSION['email'];
   //session_register('email');
    $email = $_SESSION['email'];
    $_SESSION['email']=$email;
    $con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");
    $query="select * from tb_admin where email='$email'";
    $data=mysqli_query($con,$query);
    //echo $email;
    if(mysqli_num_rows($data)>0 && $email=="admin")
    {
     $row = mysqli_fetch_assoc($data);
    
?>

<!DOCTYPE html>
    <html>
        <head>
        <title>Admin</title>
        <link rel="stylesheet" href="page.css" type="text/css">
        </head>
        <body>
   
        <ul>
            <li><div class="container" onclick="openNav()">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div></li>
            <li> <?php echo $email;?></li>
            <li><form  method="get" action="">
                <select name="sort" onchange="form.submit()">
                <option >Sort list..</option>
                    <option value="Active">Active</option>
                    <option value="Pending">Pending</option>
                    <option value="Rejected">Rejected</option>
                </select>
                </form>
        </li></ul>
        
        <div id="myNav" class="overlay" >
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
            
                <a href="logout.php">Logout</a>
            </div>
        </div>
    

    </body>
</html> 
  
 





      
<?php 


if (!isset($_GET['sort']))
{
    
    $sort='Pending';
}
else{
    $sort = $_GET['sort'];
  
}  
echo $sort .":<br>";

$query1="select * from tb_req where approval='$sort' ";
$data1=mysqli_query($con,$query1);
if(mysqli_num_rows($data1)>0)
{
    if(mysqli_num_rows($data1)>0)
    {
        while($row = mysqli_fetch_assoc($data1))
        {$em= $row['reqid'];
            ?>
           <p><a href="padmin.php?id=<?php echo $em; ?>"><?php echo $row['topic'];?></p></a>
        <?php
        }
    }
}
else{
    echo "NO DATA";
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



<script>

function openNav() {
  document.getElementById("myNav").style.width = "20%";
 
}
function closeNav() {
  document.getElementById("myNav").style.width = "0%";
  
}
</script>