<?php

session_start();

if ($_SESSION['akses'] == 'admin'){
    header('location: admin/index.php');
}elseif($_SESSION['akses'] == 'user' ){
    header('location: absen.php');
}elseif(!$_SESSION){
    header('location: login.php');
}

?>