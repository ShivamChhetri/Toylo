<?php include("root.php");?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="static/style.css">
        <link rel="stylesheet" href="user.css">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Toylo</title>
    </head>
    <body style="background-color: rgba(200, 200, 200,0.4);">

        <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #fff;">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://localhost/Toylo/main.php">Toylo</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo root_url;?>main.php">Home<span class="sr-only">(current)</span></a></li>
                        <li><a class="ask">Add Post</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="btn btn-info btn-sm" href="<?php echo root_url;?>user/login.php">LogIn</a></li> 
                    </ul> 
                    <form method="post" action="<?php echo root_url;?>search.php" class="navbar-form navbar-right">
                        <div class="form-group">
                        <input type="text" autocomplete="off" name="search_text" class="form-control" id="search_text" placeholder="Search Post">
                        <button type="submit" class="btn btn-default" name="submit">Search</button>
                        <div id="result"></div>   
                        </div>
                    </form>
                                      
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
    </nav>        


 <script>
$(document).ready(function(){

 
 $('#search_text').on('keyup',function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
 function load_data(query)
 {
  $.ajax({
   url:"http://localhost/Toylo/static/fetch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').show();
    $('#result').html(data);
   }
  });
 }
   
});
$(document).on('click','td', function(){  
           $('#search_text').val($(this).children('strong').text());  
           $('#result').hide();  
});
$(document).ready(()=>{
    $('.ask').on('click',()=>{
        alert("LogIn first");
    });
});




</script>