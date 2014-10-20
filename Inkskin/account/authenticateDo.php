<?php

session_start();

$hostname = $_SERVER['HTTP_HOST'];
$path = dirname($_SERVER['PHP_SELF']);

if (!isset($_SESSION['logged']) || !$_SESSION['logged'] && !isset($_SESSION['idi']) || !$_SESSION['idi']) {
    //header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/login.php');
    
    header("Location: ../pages/login.php");
    exit;
}
?>