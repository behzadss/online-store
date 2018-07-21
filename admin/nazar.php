<?php
require_once '../config/config.php';
?>
<?php
if(!isset($_SESSION['admin-login'])){
    header('Location:login');
}
mysqli_set_charset($db,"utf8");

$getnazar=mysqli_query($db,"SELECT * FROM nazar ORDER BY id DESC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/style.css">
    <title>نظرات کاربران</title>
</head>
<body>
<div id="main">
<h1> نظرات کاربران</h1>
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
            <th>نام کاربر</th>
            <th> نظر کاربر</th>
            <th>ویرایش</th>
        </tr>
            <?php while($nazar=mysqli_fetch_array($getnazar)){?>
                <tr>

                <td><?php echo $nazar['username'] ?></td>
                <td><?php echo $nazar['userdesc'] ?></td>
                <td style="display:none;"><?php echo $nazar['id'] ?></td>
                <td>  <a href="confirm.php?id=<?php echo $nazar['id'] ?>">تأیید</a> / <a href="deletenazar.php?id=<?php echo $nazar['id'] ?>">حذف</a></td>
                </tr>
            <?php } ?>
</table>
</div>
</div>
    
</body>
</html>