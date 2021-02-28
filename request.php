<!DOCTYPE html>
<html>
<head>
<title>Request</title>
<link rel="stylesheet" href="f3.css" type="text/css">

</head>
<body>



<style>
body{
  background-image:none;
 background-color:#333;}
a{
    border:10px ;   
    background:none;
    display:block;
    margin:8px auto;
    text-align:left;
    font-size:35px;
    font-weight:500;
    width:100%;
    outline:none;
    color:white;
}

.f{
    width:700px;
}
</style>
<?php
  session_start();
  $em=$_SESSION['email'];
  $_SESSION['email']=$em;
  $con=new mysqli("localhost","root","","miniproject") or die("couldnt connect to server");


  $query1="select * from tb_req where email='$em' ";
  $data1=mysqli_query($con,$query1);
  if(mysqli_num_rows($data1)>0)
    {
      header("Location:requpdate.php");
    }
?>





  
<a href="userhome.php"><b>Home</b></a>

 
<form  class="f" method="POST" action="req.php" name="req" onsubmit="return VALIDATION()"  enctype="multipart/form-data">
<h3>Request </h3>
<table  >
    <tr><td><p>Topic</p></td>                   <td><input type="text" name="help"  required ></td></tr>
    <tr><td><p>Description</p></td>                   <td><textarea  name="desc" id="desc" required rows="2" cols="50" ></textarea></td></tr>
    <tr><td><p>Attach certificate</p></td>     <td><input type="file" name="fil"  required  id="fil"></td></tr>

    <tr><td><p>UPI id</p></td>        <td><input type="num" name="Bno"  required ></td></tr> 
    <tr><td><p>Amount</p></td>                 <td><input type="num" name="amt"  required ></td></tr>
    <tr><td><p><label for="category">Category:</label></p></td>
    <td><select name="category" id="category">
        <option value="Edu">Education</option>
        <option value="Health">Health</option>
        <option value="Other">Other</option>
        <option value="Other">Other</option>
      </select></td></tr>
    
      
    
</table>   
     <input class="btn" type="submit" name="enter" value="Submit">
 
</form>


</body>
</html>
<script> 
function VALIDATION() 
  {
     var p = document.forms["req"]["Bno"].value;
     
      return true;
     }
  } 
</script>