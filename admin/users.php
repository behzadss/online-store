<?php
require_once '../config/config.php';
?>
<?php
if(!isset($_SESSION['admin-login'])){
    header('Location:login');
}
mysqli_set_charset($db,"utf8");

$getusers=mysqli_query($db,"SELECT * FROM users ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/style.css">
    <title>لیست کاربران</title>
</head>
<body>
<div id="main">
<h1>لیست کاربران</h1>
<hr>
<div class="nav"><ul>
<li><a href="../index">نمایش فروشگاه</a></li>
<li><a href=".">لیست محصولات</a></li>
<li><a href="addproduct">افزودن محصول</a></li>
<li><a href=".">لیست کاربران</a></li>
<li><a href="nazar">نظرات</a></li>
<li><a href="#">سفارش‌ها</a></li>
<li><a href="../config/do-logout.php">خروج</a></li>
</ul>
<hr>
</div>
<div class="admin-table">
<table>
        <tr>
            <th>نام کاربر</th>
            <th>ایمیل کاربر</th>
            <th>پسوورد</th>
            <th>حذف کاربر</th>
        </tr>
            <?php while($user=mysqli_fetch_array($getusers)){?>
                <tr>

                <td><?php echo $user['display_name'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['password'] ?></td>
                <td> <a href="deleteusers.php?id=<?php echo $user['id'] ?>">حذف</a></td>
                </tr>
            <?php } ?>
</table>
</div>
</div>
    
</body>
</html>