<?php
require_once 'include.php';
$username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['name'];
if($_POST['sex']==1) $sex="男";
if($_POST['sex']==2) $sex="女";
$email=$_POST['email'];
$id_card=$_POST['id_card'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$regtime=time();
$table = "house_vip";
if(strlen($password)>=6) $flag1=1;
$flag2=0;
if(empty($username)||empty($password)||empty($sex)||empty($email)||empty($id_card)||empty($phone)||empty($address)||empty($name)) $flag2=1;
$array=array(
    "username"=>$username,
    "password"=>$password,
    "name"=>$name,
    "sex"=>$sex,
    "email"=>$email,
    "id_card"=>$id_card,
    "phone"=>$phone,
    "address"=>$address,
    "regtime"=>$regtime  
);
    if($flag1 && !$flag2) {
        if(insert($table, $array))
        {
            alertmes("注册成功", "index.php");
        }
        else {
            alertmes("该用户名已存在", "index.php");
        }
    }
    else {
        if($flag2) alertmes("注册信息不完整", "index.php");
        else alertmes("请输入大于6位的密码", "index.php");
    }