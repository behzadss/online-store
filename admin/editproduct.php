<?php
require_once '../config/config.php';
?>
<?php
if(!isset($_SESSION['admin-login'])){
    header('Location:login.php');
}
mysqli_set_charset($db,"utf8");

$id=$_GET['id'];
$query=mysqli_query($db,"SELECT * FROM products WHERE id=$id");
$productInfo=mysqli_fetch_array($query);
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
<h1>ویرایش محصول</h1>
<hr>
<div class="nav"><ul>
<li><a href="../index">نمایش فروشگاه</a></li>
<li><a href="products">لیست محصولات</a></li>
<li><a href="addproduct">افزودن محصول</a></li>
<li><a href="users">لیست کاربران</a></li>
<li><a href="nazar">نظرات</a></li>
<li><a href="#">سفارش‌ها</a></li>
<li><a href="../config/do-logout.php">خروج</a></li>
</ul>
<hr>
</div>
<div class="admin-main">
<form action='editproduct.php<?php echo "?id=".$id ?>' method="post">
<input type="text" name="product-name" id=""  value="<?php echo $productInfo['product_name'] ?>"><br>
<input type="text" name="product-price" id=""  value="<?php echo $productInfo['product_price'] ?>"><br>
<input type="text" name="product-image" id=""  value="<?php echo $productInfo['product_image'] ?>"><br>
<textarea name="desc" id="" cols="40" rows="10"> <?php echo $productInfo['product_desc'] ?></textarea><br>
<input type="hidden" name="product-id" value="<?php echo $productInfo['id'] ?>">
<input type="submit" name="update" value=" بروزرسانی محصول">
</form>
</div>

</div>
    
</body>
</html>
<?php
if(isset($_POST['update'])){
    $productid=$_POST['product-id'];
    $productName=$_POST['product-name'];
    $productPrice=$_POST['product-price'];
    $productDesc=$_POST['desc'];
    $productImg=$_POST['product-image'];
    mysqli_set_charset($db,"utf8");
    $editproduct= mysqli_query($db,"UPDATE products SET product_name='$productName',product_price='$productPrice',product_desc='$productDesc',product_image='$productImg' WHERE id=$productid");
        if($editproduct){
            header('Location:products');
        }
}
?>