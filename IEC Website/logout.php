<?php
session_start();

if(!isset($_SESSION['login_user'])){
    header("Location:usersregister.php");
}

if(session_destroy()) {
    header("Location:usersregister.php");
}
?>