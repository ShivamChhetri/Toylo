<?php 
include('static/database.php');
$query= "SELECT
        topic.title AS title,
        topic.posted AS posted,
        topic.article AS article,
        topic.post_id AS post_id,
        user.username AS author
        FROM topic INNER JOIN user
        ON topic.user_id = user.user_id
        ORDER BY topic.post_id DESC";
$result= mysqli_query($connection,$query);
$datas = mysqli_fetch_all($result,MYSQLI_ASSOC);
//free result & close connection
mysqli_free_result($result);
mysqli_close($connection);
?>




<div class="main">
    <?php foreach($datas as $data): ?>
        <div class="box">
            
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
        </div>
        <div class="more"><h4>Read More</h4></div>  
    <?php endforeach; ?>
</div>
<script>
    // Read more button
    $(document).ready(()=>{
        $('.more').on('click',(event)=>{
            $(event.currentTarget).hide();
            $(event.currentTarget).prev().css({
            overflow: 'visible',
            height: '100%'
            });
        });
    });

    // heart icon
    $(document).ready(()=>{
        let count=0;
        $('.heart').click((event)=>{
            if((count%2)==0){
            $(event.currentTarget).css('color','#ff0000');
            }else{$(event.currentTarget).css('color','#fff'); }
            count++;
        })
    })
        
        
    
</script>


