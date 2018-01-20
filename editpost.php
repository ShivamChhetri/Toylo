<?php 
session_start(); 
include('static/database.php');
$user_id=$_SESSION['login_id'];
$title=$author=$article=$post_id_2="";
$titleErr=$authorErr=$articleErr="";
if(isset($_POST['submit'])){
    $post_id_2=mysqli_real_escape_string($connection,$_POST['post_id_2']);
    if(empty($_POST['title'])){
        $titleErr="*Please enter a title ";   
    }else{  
        $title=mysqli_real_escape_string($connection,$_POST['title']);
        $title=filter_var($title,FILTER_SANITIZE_STRING);
    }
    if(!$_POST['article']){
        $articleErr="*Please write the article";
    }else{
        $article=mysqli_real_escape_string($connection,$_POST['article']);
        }


    if(!empty($title) && !empty($article)){
        $query= "UPDATE topic SET 
                title='$title',
                article='$article'
                WHERE post_id='$post_id_2' && user_id='$user_id'";
        if(mysqli_query($connection,$query)){
        header('Location:profile.php');}
    }else echo "error";
}




$post_id= $_GET['id'];

$query= "SELECT * FROM topic
        WHERE post_id='$post_id' && user_id='$user_id'";
$result= mysqli_query($connection,$query);
$data = mysqli_fetch_assoc($result);
//free result & close connection
mysqli_free_result($result);
mysqli_close($connection);
?>


<?php include('user/profileheader.php');?>
<form method="post" class="form" action="<?php $_SERVER['PHP_SELF']?>">
    <div class="form-group">
        <label>Title</label>
        <span><?php echo $titleErr; ?></span>
        <input type="text" name="title" value="<?php echo $data['title'];?>" class="form-control">
        <label>Article</label>
        <span><?php echo $articleErr; ?></span>
        <textarea name="article" class="form-control" rows=5><?php echo $data['article'];?></textarea> 
        <input type="hidden" name="post_id_2" value="<?php echo $data['post_id'];?>">
        <input type="submit"  class="btn btn-success" name="submit" value="submit">              
    </div>
</form>


<?php include('static/footer.php');?>
