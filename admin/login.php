<?php
require_once '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/style.css">
    <title>ورود به بخش مدیریت</title>
</head>
<body>
   <div id='main'> 
       <div id="register">
           <form action="login" method='post'>
               <input type="text" name="username" id="" placeholder="نام کاربری ..."><br>
               <input type="password" name="password" id="" placeholder="کلمه عبور ..."><br>
               <input type="submit" name="login" id="" value=" ورود به بخش مدیریت">

           </form>
       </div>
   </div>
</body>
</html>
<?php
if(isset($_POST['login'])){
$username=$_POST['username'];
$password=$_POST['password'];
if($username == ADMIN_USER && $password == ADMIN_PASS){
    $_SESSION['admin-login']=true;
    echo "شما با موفقیت وارد شدید." . "<a href='index'>نمایش بخش مدیریت</a>";
}else{
    echo "نام کاربری با رمز عبور همخوانی ندارد.";
}
}
?>
