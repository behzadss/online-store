<?php
require_once './config/config.php';
mysqli_set_charset($db,"utf8");
$id=$_GET['id'];
$getproduct=mysqli_query($db,"SELECT * FROM products WHERE id='$id'");
$getdesc=mysqli_query($db,"SELECT * FROM nazar WHERE product_id='$id' AND id_confirm='1'");
$prod=mysqli_fetch_array($getproduct);

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
<body style="height:800px;">
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
            <div class="product-item">
            <div class="product-image"><img src="./images/<?php echo $prod['product_image'] ?>.jpg" alt="" srcset=""></a></div>
        </div>
        <div class="product-name"><?php echo $prod['product_name'] ?></a></div>
            <div class="product-price"><?php echo $prod['product_price'] ?> تومان</div><br>
        <div class="product-desc" style="float:right;"><strong>توضیحات:</strong><br><?php echo $prod['product_desc'] ?></div>
    <br>
    <button class='btns' style="float:left"><a href="./config/to-basket.php?id=<?php echo $prod['id'] ?>">افزودن به سبد خرید</a></button><br>

    <div class="comment">
        <?php
    while($descs=mysqli_fetch_array($getdesc)){?>
    <div class="username"><?php echo $descs['username'] ?></div>
    <div class="user-comment"><?php echo $descs['userdesc'] ?></div><hr>
    <?php } ?>
    <form action="desc.php?id=<?php echo $prod['id'] ?>" method="post">
    <input type="text" name="text-user" id="" placeholder="نام شما"><br>
    <input type="text" name="email-user" id="" placeholder="ایمیل شما"><br>
    <input type="hidden" name="product-user" value='<?php echo $prod['id'] ?>'>
    <textarea name="com-user" id="" cols="80" rows="10" placeholder="نظر شما ..."></textarea><br>
    <input type="submit" name="com" id="" value="افزودن نظر">
    </form>
    </div>
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
<?php
if(isset($_POST['com'])){
    $textUser=$_POST['text-user'];
    $emailUser=$_POST['email-user'];
    $comUser=$_POST['com-user'];
    $prodid=$_POST['product-user'];
    mysqli_set_charset($db,"utf8");
    $addcom= mysqli_query($db,"INSERT INTO nazar (username,userdesc,product_id) VALUES ('$textUser','$comUser','$prodid')");
        if($addcom){
            echo "نظر شما ثبت گردید.";
    }
}

?>
