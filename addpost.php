<?php
session_start(); 
include('static/database.php');
$titleErr=$articleErr="";
$title=$article="";
$user_id=$_SESSION['login_id'];
if(isset($_POST['submit'])){
    if(!$_POST['title']){
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
        $query= "INSERT INTO topic (title,article,user_id)
                VALUES ('$title','$article','$user_id')";
        $result=mysqli_query($connection,$query);
        if(!$result){
            echo "Sorry please try again";
        }else{
            header("location:profile.php");
        }
    }
}
?>


<?php include('user/profileheader.php');?>
<form method="post" class="form" action="<?php $_SERVER['PHP_SELF']?>">
    <div class="form-group">
        <label>Title</label>
        <span><?php echo $titleErr; ?></span>
        <input type="text" name="title" class="form-control">
        <label>Article</label>
        <span><?php echo $articleErr; ?></span>
        <textarea name="article" class="form-control" rows=5></textarea> 
        <input type="submit"  class="btn btn-success" name="submit" value="submit">              
    </div>
</form>


<?php include('static/footer.php');?>
