<?php
require_once '../include.php';
$username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['name'];
if(strlen($password)<6) $flag2=1;
$sex=$_POST['sex'];
$email=$_POST['email'];
if($sex) {
    $sex = "男";    
}else {
    $sex = "女";
}
$array=array("username"=>$username,"password"=>$password,"name"=>$name,"sex"=>$sex,"email"=>$email);
if(!$username||!$password||!$email||!name)    $flag=1;
if(!isset($sex)) $flag=1;
if(!$flag2&&!$flag&&insert("house_admin",$array)) {
    alertmes("插入成功","index.php");
}else {
    if($flag)
        alertmes("插入失败,请输入完整的信息","index.php");
    else if($flag2)
        alertmes("插入失败,密码需大于6位", "index.php");
    else {
        alertmes("插入失败,该用户名已存在","index.php");
    }
}