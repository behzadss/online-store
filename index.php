<?php
require_once './config/config.php';
mysqli_set_charset($db,"utf8");
$getproducts=mysqli_query($db,"SELECT * FROM products ORDER BY id DESC LIMIT 4");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./styles/style.css">
    <title>فروشگاه اینترنتی</title>
</head>
<body>
    <div class="container">
    <div class="header">
    <h1>فروشگاه اینترنتی</h1>
    <h2>فروش تمامی محصولات الکترونیکی</h2>
    </div><br>
    <div class="nav">
    <ul>
    <li><a href="index">صفحه نخست</a></li>
    <li><a href="basket">سبد خرید</a></li>
    <li><a href="users/login">ورود به حساب کاربری</a></li>
    <li><a href="users/register">ثبت نام</a></li>
    </ul>
    </div><br>
    <hr><br>
    <div class="content">
        <?php while($pro=mysqli_fetch_array($getproducts)){?>
            <div class="product-item">
            <div class="product-image"><a href="desc.php?id=<?php echo $pro['id'] ?>"><img src="./images/<?php echo $pro['product_image'] ?>.jpg" alt="" srcset=""></a></div>
            <div class="product-name"><a href="desc.php?id=<?php echo $pro['id'] ?>"><?php echo $pro['product_name'] ?></a></div>
            <div class="product-price"><?php echo $pro['product_price'] ?> تومان</div>
            <div class="product-desc"><a href="desc.php?id=<?php echo $pro['id'] ?>">مشاهده ...</a></div>
        </div>
        <?php } ?>
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