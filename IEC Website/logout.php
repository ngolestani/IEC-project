<?php
session_start();

if(!isset($_SESSION['login_user'])){
    header("Location:customer-register.php");
}

if(session_destroy()) {
    header("Location:customer-register.php");
}
?>