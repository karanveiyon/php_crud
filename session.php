<?php
include('connect.php');

 if($_SESSION['id']!="")
{
    if(time()-$_SESSION["login_time_stamp"] >6000) 
    {
        session_unset();
        session_destroy();
        header("Location: ./index.php");
    }
    else
    {
        
    }
} 
if($_SESSION['id']=="")
{
    header("Location: ./index.php");
}

?>