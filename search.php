<?php 
include('static/database.php');
$title='';
if(isset($_POST['submit'])){
   if(!empty($_POST['search_text'])){
    $title=$_POST['search_text']; 
    $query="SELECT
            topic.title AS title,
            topic.posted AS posted,
            topic.article AS article,
            topic.post_id AS post_id,
            user.username AS author,
            user.user_id AS user_id
            FROM topic INNER JOIN user
            ON topic.user_id = user.user_id
            WHERE title='$title'";
        
    $result=mysqli_query($connection,$query);
    $data= mysqli_fetch_array($result);
   }else{header('Location:main.php');}
    
}

?>




<?php include('static/header.php');?>


<div class="container">
    <div class="holder">
        <h2><?php echo $data['title'];?></h2>
        <small>Written by:<?php echo $data['author'];?></small><br>
        <small>Posted on:<?php echo $data['posted'];?></small>
        <h4><?php echo $data['article'];?></h4> 
    </div>
</div>

<?php include('static/footer.php');?>



