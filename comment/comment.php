<?php
include('../static/database.php');
$output="";
$post_id=mysqli_real_escape_string($connection,$_POST['post_id']);
$query="SELECT user.username AS commenter_name,
        comment_table.comment_date AS comment_date,
        comment_table.comment AS comment
        FROM comment_table INNER JOIN user
        ON comment_table.user_id= user.user_id
        INNER JOIN topic
        ON comment_table.post_id = topic.post_id
        WHERE comment_table.post_id='$post_id'
        ORDER BY comment_table.comment_id DESC";
$result= mysqli_query($connection,$query);
$datas = mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach($datas as $data){
    $output.="<div>
            <h2>".$data['commenter_name']."</h2>
            <small>".$data['comment_date']."</small>
            <p>".$data['comment']."</p>";
}
echo $output;
//free result & close connection
mysqli_free_result($result);
mysqli_close($connection);
// $output="";
// if(!empty($_POST['name'])){
//     $name=$_POST['name'];
    
?>


    
