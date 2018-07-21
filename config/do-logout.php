<?php
session_start();
if(isset($_SESSION['user-login'])){
    unset($_SESSION['user-login']);
    header("Location:../users/login");
}
if(isset($_SESSION['admin-login'])){
    unset($_SESSION['admin-login']);
    header("Location:../admin/login");
}



?>