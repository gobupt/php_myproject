<?php
require_once '../include.php';
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "select * from house_vip where username='$username' and password='$password'";
$res = checkvip($sql);
if ($res) {
    $_SESSION['vipname'] = $res['name']; // 用于显示在页面上 XXX，您好。
    $_SESSION['vipid'] = $res['id'];
    alertmes("登录成功", "../index.php");
} else {
    alertmes("登录失败", "../index.php");
}