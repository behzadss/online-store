<?php
require_once 'config.php';
mysqli_set_charset($db,"utf8");
$productId=$_GET['id'];
$userIp=$_SERVER['REMOTE_ADDR'];
$addto=mysqli_query($db,"INSERT INTO basket (user_ip,product_id) VALUES ('$userIp','$productId')");
if($addto){
    header('Location:../basket');
}
?>
