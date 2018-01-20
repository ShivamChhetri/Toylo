<?php 
session_start(); 
include('static/database.php');
$id= $_GET['id'];
$user_id=$_SESSION['login_id'];
$query= "DELETE FROM topic 
        WHERE post_id=$id && user_id=$user_id";
if(mysqli_query($connection,$query)){
    header("Location:profile.php");
}
?>