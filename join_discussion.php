<?php 
include('static/database.php');
$post_id=$_GET['id'];
$query= "SELECT
        topic.title AS title,
        topic.posted AS posted,
        topic.article AS article,
        topic.post_id AS post_id,
        user.username AS author
        FROM topic INNER JOIN user
        ON topic.user_id = user.user_id
        WHERE topic.post_id='$post_id'
        ORDER BY topic.post_id DESC";
$result= mysqli_query($connection,$query);
$data = mysqli_fetch_assoc($result);
//free result & close connection
mysqli_free_result($result);
mysqli_close($connection);
?>

<?php include("user/profileheader.php");?>
<div class="main">
        <div class="box2">   
            <h2><?php echo $data['title'];?></h2>
            <small>Written by:<?php echo $data['author'];?></small><br>
            <small>Posted on:<?php echo $data['posted'];?></small>
            <h4><?php echo $data['article'];?></h4>
            <div class="bottom-btn" style="pointer-events: none;opacity:0.4;">
                <a class="fa fa-heart-o heart badge"> </a>
                <span style="float:right;">
                    <a href="<?php echo root_url;?>editpost.php?id=<?php echo $data['post_id'];?>" class="btn btn-primary">Edit</a>
                    <a href="<?php echo root_url;?>deletepost.php?id=<?php echo $data['post_id'];?>"class="btn btn-danger">Delete</a>
                </span>
            </div>  

            <div>
                <form>
                    <div class="form-group">
                        <textarea type="text" class="form-control" id="text"></textarea>
                        <input type="hidden" value="<?php echo $post_id; ?>" id="post_id">
                        <button class="btn btn-primary btn-comment">Comment</button>
                    </div>
                </form>
                <div id="comment"></div>
            </div>
        </div>          
</div>


    
</body>
    <script>
    $(document).ready(()=>{
        let post_id=$('#post_id').val();
            
            onload(post_id);
       
        function onload(post_id){

            $.ajax({
                url:"comment/comment.php",
                method:"POST",
                data:{post_id},
                success:function(data)
                {
                    $("#comment").html(data);
                }
                });
        }

        $(".btn-comment").on('click',()=>{
            let post_id=$('#post_id').val();
            let comment=$("#text").val();
            add_comment(post_id,comment);
        });

        function add_comment(post_id,comment){
            $.ajax({
                url: "comment/addcomment.php",
                method:"POST",
                data:{post_id,comment},
                success:function(data){
                    onload(post_id);
                }
            });
        }

    });

    </script>
</html>