<?php
require_once '../include.php';
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];
$table = "house_admin";
$array = array("password"=>$password,"name"=>$name,"email"=>$email);
 
$id = $_SESSION['adminid'];
$where = "id=$id";
if(empty($password)||empty($name)||empty($email))  
     alertmes("更新失败,请填写完整信息", "index.php");
else {
 if(update($table, $array,$where)) {
    alertmes("更新成功", "index.php");
 } 
}