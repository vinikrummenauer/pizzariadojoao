<?php
session_start();
if(isset($_SESSION['Logged']) == 1){
    session_destroy();
    header("Location: login.php");
    exit();
}else{
    session_destroy();
    header("Location: login.php?code=noAccess");
    exit();
}