<?php 
session_start();

if ( isset($_SESSION['logged']) ) {
    
    unset($_SESSION['name']);
    unset($_SESSION['logged']);
}

if (!empty($_POST['redirect'])) {
    header('location: '.$_POST['redirect']);
} else {
    header('location: ./login.php');
}

?>