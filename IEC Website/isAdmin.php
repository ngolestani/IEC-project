<?php
session_start();
if(isset($_SESSION['login_user']) && isset($_SESSION['role'])){
    if ($_SESSION['role']==2){
        var_dump('your not admin');
    }elseif($_SESSION['role']==3){
        var_dump('your not admin');
    }
}else{
    header("Location:customer-register.php");
}