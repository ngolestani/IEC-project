<?php
session_start();
if(isset($_SESSION['login_user']) && isset($_SESSION['role'])){
    if ($_SESSION['role']==1){
        header("Location: admin.php");
    }elseif($_SESSION['role']==3){
        header("Location: students.php");
    }
}else{
    header("Location:usersregister.php");
}
