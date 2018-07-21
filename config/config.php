<?php
$db = mysqli_connect('localhost','behzad','123','shopping');

if(!$db){
    echo mysqli_connect_error();
}
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
//$adminuser='admin';
//$adminpass='13579';
define('ADMIN_USER','admin');
define('ADMIN_PASS','13579');
?>