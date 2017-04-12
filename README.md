# Gifs Media Uploader
<em>You can use this project to start your gifs media site. </em>

The <em>index.php</em> will display all the gifs that you have uploaded.

The <em>media.php</em> will show the selected gifs with prefilled fields.  
<ul>
<li>Image is the path of the gif.</li>  
<li>Page is the path of the media.php + the gif image.</li> 
<li>Download will download the image to you computer.</li>
</ul>

If you want to upload your gif, press Log In to go to <em>login.php</em>. The access is hardcoded.  
<ul>
<li>Email: <u>admin@domain.com</u></li>
<li>Password: admin</li>
<li>Demo: <a href="http://www.devxlab.com/samples/gifmedia" target="_blank">http://www.devxlab.com/samples/gifmedia</a></li>
</ul>

<hr>

Once you get access, you will be redirected to the previous page.  
Now you will see in the menu the button Upload to go to <em>uploader.php</em>.  <b>Browse</b> you file and <b>press</b> upload.  
You will be redirected to the <em>media.php</em> after it uploads. 

The <em>_process.php</em> is where all the process is done.  It uploads, it can resize and create a gif, but it will replace your animation. 
<em>You can use it as is, because is working.</em>

<em>login.php</em> and <em>logoff.php</em> will create a session variable to access the <em>uploader.php</em> and <em>_process.php</em>.


<hr>

<em>The framework used for the front-end is <b>getBootstrap.com</b>.  The server language is <b>PHP</b>.  Needs <b>PHP 5.4</b> or greather. </em> 





