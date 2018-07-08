<?php
include('session.php');
echo 'You are in your panel now';
session_unset();
header("location:usersregister.php");