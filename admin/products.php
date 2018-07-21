<?php
require_once '../config/config.php';
?>
<?php
if(!isset($_SESSION['admin-login'])){
    header('Location:login');
}
mysqli_set_charset($db,"utf8");

$getproducts=mysqli_query($db,"SELECT * FROM products ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/style.css">
    <title>لیست محصولات</title>
</head>
<body>
<div id="main">
<h1>لیست محصولات</h1>
<hr>
<div class="nav"><ul>
<li><a href="../index">نمایش فروشگاه</a></li>
<li><a href=".">لیست محصولات</a></li>
<li><a href="addproduct">افزودن محصول</a></li>
<li><a href="users">لیست کاربران</a></li>
<li><a href="nazar">نظرات</a></li>
<li><a href="#">سفارش‌ها</a></li>
<li><a href="../config/do-logout.php">خروج</a></li>
</ul>
<hr>
</div>
<div class="admin-table">
<table>
        <tr>
            <th>نام محصول</th>
            <th>قیمت محصول</th>
            <th>ویرایش</th>
        </tr>
            <?php while($pro=mysqli_fetch_array($getproducts)){?>
                <tr>

                <td><?php echo $pro['product_name'] ?></td>
                <td><?php echo $pro['product_price'] ?></td>
                <td style="display:none;"><?php echo $pro['id'] ?></td>
                <td><a href="editproduct.php?id=<?php echo $pro['id'] ?>">ویرایش</a> / <a href="deleteproduct.php?id=<?php echo $pro['id'] ?>">حذف</a></td>
                </tr>
            <?php } ?>
</table>
</div>
</div>
    
</body>
</html>