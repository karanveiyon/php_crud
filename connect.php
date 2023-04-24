<?php
$server='localhost';
$user='root';
$password='';
$db='project_php';

$db_connect= mysqli_connect($server,$user,$password,$db);

if(!mysqli_connect_error())
{
    echo "<script>console.log('database connect')</script>";
}
else
{
    echo "<script>console.error('".mysqli_connect_error()."')</script>";
}

