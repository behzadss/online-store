<?php
require_once './config/config.php';
mysqli_set_charset($db,"utf8");
$userIp=$_SERVER['REMOTE_ADDR'];
$getproducts=mysqli_query($db,"SELECT * FROM products ORDER BY id DESC LIMIT 4");
$getbask=mysqli_query($db,"SELECT * FROM basket WHERE user_ip='$userIp'");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./styles/style.css">
    <title>سبد خرید</title>
</head>
<body>
    <div class="container">
    <div class="header">
    <h1>فروشگاه اینترنتی</h1>
    <h2>فروش تمامی محصولات الکترونیکی</h2>
    </div><br>
    <div class="nav">
    <ul>
    <li><a href="#">صفحه نخست</a></li>
    <li><a href="#">سبد خرید</a></li>
    <li><a href="#">ورود به حساب کاربری</a></li>
    <li><a href="#">ثبت نام</a></li>
    </ul>
    </div><br>
    <hr><br>
    <div class="content">
    
    </div>
    <div class="sidebar">
    <div class="sidebar-item">
    <div class="sidebar-title">لیست محصولات</div><br>
    <div class="sidebar-content">
    <ul>
        <?php
        $getproducts=mysqli_query($db,"SELECT * FROM products");
        while($pro=mysqli_fetch_array($getproducts)){?>
    <li><a href="#"><?php echo $pro['product_name'] ?></a></li>
        <?php } ?>
    </ul>
    </div>
    </div>
    </div>
    <div class="clearfix"></div>
    <div class="footer">تمامی حقوق برای این سایت محفوظ است.</div>
    </div>

</body>
</html>