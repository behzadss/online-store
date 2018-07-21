<?php
require_once '../config/config.php';
?>
<?php
if (!isset($_SESSION['user-login'])) {
    //echo 'yes';}
    //else{
//echo 'برای ورود به صفحه کاربری، وارد سیستم شوید.'."<br>";
//echo "<a href='login.php'>ورود به حساب کاربری</a>";
//exit();
header("Location: login");
}
$email=$_SESSION['user-login'];
$name=$_SESSION['user-login2'];
$getUsername=mysqli_query($db,"SELECT * FROM users WHERE email='$email' OR display_name='$name'");
$username=mysqli_fetch_array($getUsername);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/style.css">
    <title>پروفایل کاربر</title>
</head>
<body>
<div id="main">
<h1>پروفایل کاربر</h1>
<hr>
<div class="nav"><ul>
<li><a href="#">مشخصات شما</a></li>
<li><a href="#">سفارش</a></li>
<li><a href="../config/do-logout.php">خروج</a></li>
</ul>
<hr>
<div class="admin">
<ul>
<li>نام شما:<?php echo $username['display_name']; ?></li><br>
<li>ایمیل شما:<?php echo $username['email']; ?></li><br>
</ul>
</div>
</div>

</div>
    
</body>
</html>