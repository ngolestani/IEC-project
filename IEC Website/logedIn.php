<?php
include('session.php');
echo 'You are in your panel now';

sleep(10);

session_unset();
header("location:customer-register.php");