<?php
require_once '../config/config.php';
?>
<?php
if(!isset($_SESSION['admin-login'])){
    header('Location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/style.css">
    <title>افزودن محصول</title>
</head>
<body>
<div id="main">
<h1>افزودن محصول</h1>
<hr>
<div class="nav"><ul>
<li><a href="../index">نمایش فروشگاه</a></li>
<li><a href="products">لیست محصولات</a></li>
<li><a href=".">افزودن محصول</a></li>
<li><a href="users">لیست کاربران</a></li>
<li><a href="nazar">نظرات</a></li>
<li><a href="#">سفارش‌ها</a></li>
<li><a href="../config/do-logout.php">خروج</a></li>
</ul>
<hr>
</div>
<div class="admin-main">
<form action="addproduct.php" method="post">
<input type="text" name="product-name" id="" placeholder="نام محصول"><br>
<input type="text" name="product-price" id="" placeholder="قیمت محصول"><br>
<input type="text" name="product-image" id="" placeholder="عکس محصول"><br>
<textarea name="desc" id="" cols="40" rows="10" placeholder="توضیحات محصول"></textarea><br>
<input type="submit" name="add" value="افزودن محصول">
</form>
</div>

</div>
    
</body>
</html>
<?php
if(isset($_POST['add'])){
    $productName=$_POST['product-name'];
    $productPrice=$_POST['product-price'];
    $productDesc=$_POST['desc'];
    $productImg=$_POST['product-image'];
    mysqli_set_charset($db,"utf8");
    $addproduct= mysqli_query($db,"INSERT INTO products (product_name,product_price,product_desc,product_image) VALUES ('$productName','$productPrice','$productDesc','$productImg')");
        if($addproduct){
            echo "محصول اضافه گردید.";
    }
}

?>