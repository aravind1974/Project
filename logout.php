<?php

session_start();
if(isset($_SESSION['email']))
{
    session_destroy();
    echo "<script>logged out</script>";
    echo "<script>location.href='login.html'</script>";
} 
else
{
    echo "<script>alert('logged out')</script>";
    echo "<script>location.href='login.html'</script>";
}

?>