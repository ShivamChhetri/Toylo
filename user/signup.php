<?php
 include("../static/database.php");
$name=$email=$password="";
$nameErr=$emailErr=$passwordErr=$error="";
$password_1=$password_2="";
if(isset($_POST['submit'])){
    if(!empty($_POST['name'])){
        $name=mysqli_real_escape_string($connection,$_POST['name']);
    }else{$nameErr="*Please enter username";}
    if(!empty($_POST['email'])){
        $email=$_POST['email'];
    }else{$emailErr="*Please enter email";}
    if(!empty($_POST['password_1']) && !empty($_POST['password_2'])){
        $password_1=mysqli_real_escape_string($connection,$_POST['password_1']);
        $password_2=mysqli_real_escape_string($connection,$_POST['password_2']);
        if($password_1==$password_2){
            $password=$password_1;  
        }else{$error="*Password don't match";}
    }else{$passwordErr="*Please enter password";}   
}
if(!empty($name) && !empty($email) && !empty($password)){
    $query= "INSERT INTO 
            user (username,email,password)
            VALUES ('$name','$email','$password')";
    if(mysqli_query($connection,$query)){
        header("Location: profile.php");
    }
    $subject= "toylo";
    $msg="Welcome to Tolyo family";
    mail($email,$subject,$msg);
    
}
    
 ?>





<?php include("../static/header.php");?>
<div class="container">
        <form class="signup" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
            <h6 class="error"><?php echo $error;?></h6>
            <div class="form-group">
                <label>Username</label>
                <span class="error"><?php echo $nameErr;?></span>
                <input type="text" name="name" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label>Email</label>
                <span class="error"><?php echo $emailErr;?></span>
                <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <span class="error"><?php echo $passwordErr;?></span>
                <input type="password" name="password_1" class="form-control">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <span class="error"><?php echo $passwordErr;?></span>
                <input type="password" name="password_2" class="form-control">
            </div>
            <input type="submit" name="submit" value="SignUp">  
            <div>
                Have an account?<a href="<?php echo root_url;?>user/login.php">click here to log in</a>
            </div>          
        </form>







