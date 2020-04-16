<link href="bootstrap4.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap4.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="bootstrap4.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap4.1/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<!-- Include the above in your HEAD tag -->

<link rel="stylesheet" href="style.css">
<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<div class="main">
    
    
    <div class="container">
<center>
<div class="middle">
      <div id="login">

        <form method="post" action="auth.php" class="clearfix">

          <fieldset class="clearfix">

            <p ><span class="fa fa-user"></span><input name="username" type="text"  Placeholder="Username" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p><span class="fa fa-lock"></span><input type="password" name= "password" Placeholder="Password" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
            
             <div>
                                
                                <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" value="Sign In"></span>
                            </div>

          </fieldset>
<div class="clearfix"></div>
        </form>

        <div class="clearfix"></div>

      </div> <!-- end login -->
      <div class="logo"><img src="image/logo.png"  height="200" width="500">
          
          
      </div>
      
      </div>
</center>
    </div>

</div>
<?php include_once('layouts/footer.php'); ?>