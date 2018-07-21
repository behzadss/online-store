<?php
require_once '../config/config.php';
?>
<?php
if (isset($_SESSION['user-login'])) {

header("Location: profile.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/style.css">
    <title>ورود کاربر</title>
</head>
<body>
   <div id='main'> 
       <div id="register">
           <form action="login" method='post'>
           <input type="text" name="display_name" id="" placeholder="نام کاربری ..."><br>
               <input type="text" name="email" id="" placeholder="ایمیل ..."><br>
               <input type="password" name="password" id="" placeholder="کلمه عبور ..."><br>
               <input type="submit" name="login" id="" value="ورود">

           </form>
       </div>
   </div>
</body>
</html>
<?php
if(isset($_POST['login'])){
$name=$_POST['display_name'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$loginCheck=mysqli_query($db,"SELECT * FROM users WHERE email='$email' AND password='$password'");
$loginCheck2=mysqli_query($db,"SELECT * FROM users WHERE display_name='$name' AND password='$password'");
if(mysqli_num_rows($loginCheck)>0 || mysqli_num_rows($loginCheck2)>0){
    $_SESSION['user-login']=$email;
    $_SESSION['user-login2']=$name;
    echo "شما با موفقیت وارد شدید." . "<a href='profile'>نمایش پروفایل</a>";
}else{
    echo "نام کاربری با رمز عبور همخوانی ندارد یا هنوز ثبت نام نکرده‌اید.";
}
}
?>
