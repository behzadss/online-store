<?php
require_once '../config/config.php';
?>
<?php
if (isset($_SESSION['user-login'])) {

header("Location: profile");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../styles/style.css">
    <title>ثبت نام کاربر</title>
</head>
<body>
   <div id='main'> 
       <div id="register">
           <form action="register" method='post'>
           <input type="text" name="display-name" id="" placeholder="نام کاربری ..."><br>
               <input type="text" name="email" id="" placeholder="ایمیل ..."><br>
               <input type="password" name="password" id="" placeholder="کلمه عبور ..."><br>
               <input type="password" name="passwordconf" id="" placeholder="تکرار کلمه عبور ..."><br>
               <input type="submit" name="register" id="" value="ثبت نام">

           </form>
       </div>
   </div>
</body>
</html>
<?php
if(isset($_POST['register'])){
    $name=$_POST['display-name'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $passwordConf=md5($_POST['passwordconf']);
    mysqli_set_charset($db,"utf8");
    if($password!=$passwordConf){
        echo 'گذرواژه و تکرار گذرواژه با هم برابر نیستند';
    }else{
        mysqli_query($db,"INSERT INTO users (display_name,email,password) VALUES ('$name','$email','$password')");
        echo "ثبت نام شما با موفقیت انجام شد.";
    }
}

?>