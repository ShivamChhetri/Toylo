<?php
session_start();
include("../static/database.php");
$name=$password="";
$nameErr=$passwordErr=$error="";
if(isset($_POST['submit'])){
    if(!empty($_POST['name'])){
        $name=mysqli_real_escape_string($connection,$_POST['name']);
    }else{$nameErr="*Please enter username";}
    if(!empty($_POST['password'])){
        $password=mysqli_real_escape_string($connection,$_POST['password']);
    }else{$passwordErr="*Please enter password";}

    if(!empty($name) && !empty($password)){
        $query="SELECT * FROM user
                WHERE BINARY username='$name' && BINARY password='$password'";
        $result= mysqli_query($connection,$query);
        //$data_row=mysqli_num_rows($result);
        $data_user=mysqli_fetch_assoc($result);
        if(isset($data_user)){
        $_SESSION['login_user']=$data_user['username'];
        $_SESSION['login_id']=$data_user['user_id'];
        header("Location: ../profile.php");
        }else{
            $error="Invalid username and password!";
        }
    }
    mysqli_close($connection);
    
}
?>




<?php include("../static/header.php");?>
    <div class="container">
        <form class="login" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
            <h6 class="error"><?php echo $error;?></h6>
            <div class="form-group">
                <label>Username</label>
                <span class="error"><?php echo $nameErr;?></span>
                <input type="text" name="name" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Password</label>
                <span class="error"><?php echo $passwordErr;?></span>
                <input type="password" name="password" class="form-control">
            </div>
            <input type="submit" name="submit" value="LogIn">  
            <div>
                Not a user?<a href="<?php echo root_url;?>user/signup.php">click here to sign up</a>
            </div>
        </form>
    </div>
    
<?php include("../static/footer.php");?>