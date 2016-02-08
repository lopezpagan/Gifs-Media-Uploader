<?php 
session_start();

if (isset($_SESSION['logged']) && $_SESSION['logged'] == true ) {
    
    $btn_login = '<a href="logoff.php?redirect=./index.php">Log Off <span class="sr-only">(current)</span></a>';
    $btn_upload = '<a href="uploader.php">Upload</a>';
    
} else {
    
    $btn_login = '<a href="login.php?redirect=./index.php">Log In <span class="sr-only">(current)</span></a>';
    $btn_upload = '';

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
    
    <title>GIFS MEDIA</title>
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
                <h1 class="page-title text-center">Gifs Media!</h1>
            </div>
        </section>

        <section id="secondary">
            <div class="container">
              <div class="grid">
                  
               <?php
                    $dir = "media/gifs/";
                    
                    // Open a directory, and read its contents
                    if (is_dir($dir)){
                      if ($dh = opendir($dir)){
                        while (($file = readdir($dh)) !== false) {
                            $files[] = $file;
                        }
                        
                        $images=preg_grep('/\.(jpg|jpeg|png|gif)(?:[\?\#].*)?$/i', $files);
                        $images=preg_grep('/\.gif/i', $files);
                            foreach($images as $image) {
                ?>
                          <div class="grid-item">
                              <a href="media.php?img=<?php echo($image);?>"><img src="<?php echo($dir.$image);?>" class="img-responsive"></a>
                          </div>
                <?php
                        }
                        closedir($dh);
                      }
                    }
                ?>
                </div>
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
    <script src="assets/js/jquery.masonry.3.2.1.min.js"></script>   
    <script src="assets/js/imagesloaded.3.1.8.min.js"></script>
    <script>
        $(document).ready(function(){
            //Init jQuery Masonry layout
            init_masonry();
        });


        function init_masonry(){
            var $container = $('.grid');

            $container.imagesLoaded( function(){
                $container.masonry({
                  itemSelector: '.grid-item',
                  isAnimated: true
                });
            });
        }
    </script>
</body>
</html>
