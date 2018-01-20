<?php
session_start();
include('static/database.php');
$user=$_SESSION['login_user'];
$query="SELECT username FROM user
        WHERE username='$user'";
$result=mysqli_query($connection,$query);
$data_profile=mysqli_fetch_assoc($result);
if(!$data_profile['username']){
    header("Location: main.php");
}
mysqli_free_result($result);
mysqli_close($connection);
?>
