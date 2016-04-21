<?php
require_once '../include.php';
$password=$_POST['password'];
$name=$_POST['name'];
$sex=$_POST['sex'];
$email=$_POST['email'];
$id_card=$_POST['id_card'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$id = $_SESSION['vipid'];
$table = "house_vip";
if($sex == 1) $sex="男";
else $sex="女";
$array=array(
    "password"=>$password,
    "name"=>$name,
    "sex"=>$sex,
    "email"=>$email,
    "id_card"=>$id_card,
    "phone"=>$phone,
    "address"=>$address
);
$where="id = $id";
if(empty($password)||empty($name)||empty($sex)||empty($email)||empty($id_card)||empty($phone)||empty($address))
    alertmes("更新失败,请填入完整信息", "editvip.php");
else {
    if(update($table, $array,$where))
        alertmes("更新成功", "index.php");
}