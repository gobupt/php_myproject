<?php
require_once '../include.php';
$username = $_POST['username'];
$password = $_POST['password'];
$verify=$_POST['verify'];
$verify1=$_SESSION['verify'];
$autoFlag=$_POST['autoFlag'];
if($verify==$verify1) {
    $sql = "select * from house_admin where username='$username' and password='$password'";
    $res = checkadmin($sql);
    if($res) {
        if($autoFlag) {
            setcookie("adminid",$res['id'],time()+7*24*3600);
            setcookie("adminname",$res['name'],time()+7*24*3600);
        }
        $_SESSION['adminname']=$res['name'];  //用于显示在页面上 XXX，您好。
        $_SESSION['adminid']=$res['id'];
        alertmes("登录成功", "index.php");
    }else {
        alertmes("登录失败", "adlogin.php");
    }
}else {
    alertmes("验证码错误", "adlogin.php");
}