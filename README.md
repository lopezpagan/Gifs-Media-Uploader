# gifs-media-uploader
You can use this project to start your gifs media site. 

The index.php will display all the gifs that you have uploaded.

The media.php will show the selected gifs with prefilled fields.  
-> Image is the path of the gif.  
-> Page is the path of the media.php + the gif image.  
-> Download will download the image to you computer.

If you want to upload your gif, press Log In to go to login.php. The access is hardcoded.  
-> Email: admin@domain.com
-> Password: admin
Once you get access, you will be redirected to the previous page.  
Now you will see in the menu the button Upload to go to uploader.php.  Browse you file and press upload.  
You will be redirected to the media.php after it uploads. 

-> The _process.php is where all the process is done.  It uploads, it can resize and create a gif, but it will replace your animation. 
You can use it as is, because is working.

-> login.php and logoff.php will create a session variable to access the uploader.php and _process.php.

-> The framework used for the front-end is getBootstrap.com.  The server language is PHP.  Needs PHP 5.4 or greather.  





