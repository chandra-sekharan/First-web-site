<?php
global $db_user;
global $db_pass;
$db_hostname="127.0.0.1";
$db_username="root";
$db_password="";
$db_name="test";

$conn = mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
if(!$conn)
{
    echo "connection_failed".mysqli_connect_error;
}

$user=$_POST['user'];
$pass=$_POST['pass'];


$sql = "select * from info where user='$user' AND pass='$pass' " ;

$result=mysqli_query($conn,$sql);

if(!$result)
{
    echo "failed due to logical i".mysqli_query_error($result);
}
 while($row=mysqli_fetch_assoc($result))
{
 $db_user=$row['user'];
 $db_pass=$row['pass'];    
}

if( $user == $db_user && $pass == $db_pass)
{
   echo "Login Successful \n welcome back--->  : $db_user";
}
else 
{
    echo "login failed";
}
 mysqli_close($conn);