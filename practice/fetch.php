<?php 
session_start();
include("../static/database.php");
$user_id=$_SESSION['login_id'];
$post_id=$_POST['post_id'];
// $error="";
if(empty($_POST['comment'])){
    header("location:../profile.php");
}else{
    $comment=$_POST['comment'];
    $query="INSERT INTO 
            comment_table (post_id,user_id,comment)
            VALUES ('$post_id','$user_id','$comment')";    
    if(mysqli_query($connection,$query)){
        echo "comment added";
    }
}


?>


