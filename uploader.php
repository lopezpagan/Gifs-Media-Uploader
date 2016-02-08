<?php 
session_start();

if (isset($_SESSION['logged']) && $_SESSION['logged'] == true ) {
    
    $btn_login = '<a href="logoff.php?redirect=./'.$NewPage.'">Log Off <span class="sr-only">(current)</span></a>';
    $btn_upload = '<a href="uploader.php">Upload</a>';
    
} else {
    
    $btn_login = '<a href="login.php?redirect=./uploader.php">Log In <span class="sr-only">(current)</span></a>';
    $admin_bar = '';
    
    header('location: ./index.php');

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
    
    <title>GIFS MEDIA - Uploader</title>
	<meta name="Author" content="Tony López Pagán"/>
	<meta name="Website" content="http://lopezpagan.com"/>
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">

</head>
<body class="uploader">   
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
                    <li><a href="index.php">Gifs</a></li>
                    <li><?php echo($btn_upload);?></li>
                    <li><?php echo($btn_login);?></li>
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
            </nav>            
        </header>
       
        <section id="primary-uploader">
            <div class="container">
               <div class="creation-tools col-xs-10 col-xs-offset-1">
                    <h1 class="page-title text-center">GIFS MEDIA Uploader</h1>
                    
                    <form action="_process.php" method="post" enctype="multipart/form-data" id="frmUploader">
                    <div class="file-portal">
                        <div class="file-container">
                            <!--<input class="url-input col-xs-9" type="text" autocomplete="off" placeholder="Enter GIF URLs or drag and drop GIFs">-->
                            <input name="imageInput" class="url-input col-xs-9" id="imageInput" type="file" />
                            <button class="browse btn-cta col-xs-3" type="submit" id="submit-btn">
                                <span class="browse-icon">Upload</span>
                                <i class="success-icon ss-icon ss-check"></i>
                            </button>
                        </div>
                    </div>
                    <!--<img src="assets/img/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>-->
                    </form>
                    <div id="output" class="text-center"></div>
                </div>
            </div>
        </section>
    </div>
    <div id="full-screen" class="full-screen" style="display: none;">
        <div class="modal-content text-center">
          <!--<img src="assets/img/ajax-loader-1.gif">-->
            <div id="loader-wrapper">
                <div id="loader"></div>
            </div>
            <div>Uploading</div>
        </div>
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
    
    
	<!--<script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>-->
    <script type="text/javascript" src="assets/js/jquery.form.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() { 
        var options = { 
                target:   '#output',   // target element(s) to be updated with server response 
                beforeSubmit:  beforeSubmit,  // pre-submit callback 
                success:       afterSuccess,  // post-submit callback 
                resetForm: true        // reset the form after successful submit 
            }; 

         $('#frmUploader').submit(function() { 
                $(this).ajaxSubmit(options);  			
                // always return false to prevent standard browser submit and page navigation 
                return false; 
            }); 
    }); 

    function afterSuccess(img) {
        //$('#submit-btn').show(); //hide submit button
        //$('#loading-img').hide(); //hide submit button
        //console.log(img);
        location.href="./media.php?img="+img;

    }

    //function to check file size before uploading.
    function beforeSubmit(){
        //check whether browser fully supports all File API
       if (window.File && window.FileReader && window.FileList && window.Blob) {

            if( !$('#imageInput').val()) { //check empty input filed
            
                $("#output").html("Are you kidding me?");
                return false
            }

            var fsize = $('#imageInput')[0].files[0].size; //get file size
            var ftype = $('#imageInput')[0].files[0].type; // get file type


            //allow only valid image file types 
            switch(ftype) {
                case 'image/gif':
                /*case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':*/
                    break;
                default:
                    $("#output").html("<b>"+ftype+"</b> Unsupported file type!");
                    return false
            }

            //Allowed file size is less than 1 MB (1048576)
            if(fsize>1048576) {
                $("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
                return false
            }

            //$('#submit-btn').hide(); //hide submit button
            $('#full-screen').show(); //hide submit button
            $("#output").html("");  
        } else {
            //Output error to older unsupported browsers that doesn't support HTML5 File API
            $("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
            return false;
        }
    }

    //function to format bites bit.ly/19yoIPO
    function bytesToSize(bytes) {
       var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
       if (bytes == 0) return '0 Bytes';
       var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
       return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
    }

    </script>
</body>
</html>
