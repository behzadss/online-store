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
    <title>پنل مدیریت</title>
</head>
<body>
<div id="main">
<h1>مدیریت فروشگاه</h1>
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

</div>
    
</body>
</html>