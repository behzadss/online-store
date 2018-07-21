<?php
require_once '../config/config.php';
?>
<?php
if(!isset($_SESSION['admin-login'])){
    header('Location:login');
}
mysqli_set_charset($db,"utf8");

            $id =$_REQUEST['id'];

    // sending query
    mysqli_query($db,"UPDATE nazar SET id_confirm=1 WHERE id='$id'");
    header('Location:nazar');
    ?>