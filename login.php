<?php 
session_start();

if (isset($_SESSION['logged']) && $_SESSION['logged'] == true ) {
    
    $btn_login = '<a href="logoff.php?redirect=./login.php">Log Off <span class="sr-only">(current)</span></a>';
    $btn_upload = '<a href="uploader.php">Upload</a>';
    
    $ctrl_state = 'hidden-xs hidden-sm hidden-md hidden-lg';
    $message = 'Welcome, to GIFS MEDIA! <br/><br/> <a href="./uploader.php">Start Here</a>';
        //print_r($_SESSION['name']);
    
} else {
        
    $btn_login = '<a href="login.php">Log In <span class="sr-only">(current)</span></a>';
    $btn_upload = '';  
    $admin_bar = '';
    
    if ( ($_POST['email'] == 'admin@domain.com') && $_POST['password'] == 'admin'  && $_POST['login'] == true ) {
        
        $message = 'Welcome, to GIFS MEDIA! <br/><br/> <a href="./uploader.php">Start Here</a>';
        $_SESSION['name'] = $_POST['email'];
        $_SESSION['logged'] = true;
        
        $ctrl_state = 'hidden-xs hidden-sm hidden-md hidden-lg';
        //print_r($_SESSION['name']);
        
        
        $btn_login = '<a href="logoff.php">Log Off <span class="sr-only">(current)</span></a>';
        $btn_upload = '<a href="uploader.php">Upload</a>';
        
        if (!empty($_POST['redirect'])) {
            header('location: '.$_POST['redirect']);
        }
        
    } else {
        
        $ctrl_state = 'visible-xs visible-sm visible-md visible-lg';
        if ( $_POST['login'] == true ) {
            $message = 'Access denied.  Check your email and password.';      
        }
    }

}

?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.ico">
    
    <title>GIFS MEDIA - Log In</title>
	<meta name="Author" content="Tony López Pagán"/>
	<meta name="Website" content="http://lopezpagan.com"/>
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>   
   <div class="main">
      
        <header>
           <!-- Fixed navbar -->
            <nav class="navbar navbar-reverse navbar-fixed-top">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="index.php"><span class="logo"></span></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                  <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="index.php">Gifs</a></li>
                    <li><?php echo($btn_upload);?></li>
                    <li><?php echo($btn_login);?></li>
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
            </nav>            
        </header>
       
        <section id="primary-slider">
            <div class="container">
                <h1 class="page-title text-center">Get access to GIFS MEDIA!</h1>
                <!--<img class="media col-xs-12 col-md-6 col-md-offset-3" src="media/gifs/filler.gif">-->
                <img class="media col-xs-12 col-md-6 col-md-offset-3" src="<?php echo($NewImage);?>">
            </div>
        </section>

        <section id="secondary">
            <div class="container">
                <form method="post" class="<?php echo($ctrl_state);?>">
                <input type="hidden" id="login" name="login" value="yes">
                <input type="hidden" id="redirect" name="redirect" value="<?php echo($_GET['redirect']);?>">
                <div class="col-xs-12 col-md-6 col-md-offset-3 text-center">                
                    <div class="input-group input-group-md col-xs-12 col-md-6 col-md-offset-3">                 
                      <span class="input-group-addon" id="kis-image">
                         E-mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="email" name="email" class="form-control" placeholder="admin@domain.com" autocomplete="off" aria-describedby="email" value="">
                    </div>        
                    <br/>        
                    <div class="input-group input-group-md col-xs-12 col-md-6 col-md-offset-3">                 
                      <span class="input-group-addon" id="kis-image">Password</span>
                      <input type="password" id="password" name="password" class="form-control" autocomplete="off" aria-describedby="password" value="admin" placeholder="admin">
                    </div>          
                    <br/>     
                    <div class="input-group input-group-md col-xs-12 col-md-6 col-md-offset-6">                 
                      <input type="submit" id="btn-submit" name="btn-submit" class="btn-cta btn-lg col-md-6 " value="Get Access">
                    </div>
                </div>
                </form>
                <div class="clearfix"></div>
                <div id="output" class="text-center"><?php echo($message);?></div>
            </div>
        </section>
    </div>
    
    <footer class="footer-fixed">
        <div class="container">
            <div class="col-xs-12">Copyright 2016 &copy; <a href="http://lopezpagan.com" target="_blank">Tony López Pagán</a></div>
        </div> 
    </footer>
    
<!---------------------
        Scripts
----------------------->
<!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/jquery-2.1.4.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    <script>
    $(document).ready(function() {
        $("input:text").focus(function() { $(this).select(); } );
    });
    </script>
</body>
</html>

