<?php
require_once '../include.php';
$username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['name'];
$sex=$_POST['sex'];
$email=$_POST['email'];
$id_card=$_POST['id_card'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$regtime=time();
if($sex) {
    $sex = "男";
}else {
    $sex = "女";
}
if(strlen($password)<6) $flag2=1;
if($username&&$password&&$name&&$sex&&$email&&$id_card&&$phone&&$address) $flag=1;
$table="house_vip";
$array=array("username"=>$username,"password"=>$password,"name"=>$name,"sex"=>$sex,"email"=>$email,"id_card"=>$id_card,
    "phone"=>$phone,"address"=>$address,"regtime"=>$regtime
);
if($flag&&!$flag2) {
    if(insert($table, $array)) {
        alertmes("添加成功","index.php");
    }
    else {
        alertmes("该用户已注册", "index.php");
    }
}
else if(!$flag) {
    alertmes("请输入完整信息", "index.php");
}else {
    alertmes("密码需大于6位", "index.php");
}