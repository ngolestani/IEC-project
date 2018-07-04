<?php

   require 'DataBase.php';
   session_start();

if(!isset($_SESSION['login_user'])){
    header("location:customer-register.php");
}

//   $user_check = $_SESSION['login_user'];
//
//   $pdo = Database::connect();
//   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   $sql = "SELECT email FROM info WHERE email = '$user_check'";
//   $q = $pdo->prepare($sql);
//   $q->execute();
//   Database::disconnect();
?>