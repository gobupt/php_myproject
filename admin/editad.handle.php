<?php
require_once '../include.php';
$password = $_POST['password'];
$name = $_POST['name'];
$email = $_POST['email'];
$table = "house_admin";
$array = array("password"=>$password,"name"=>$name,"email"=>$email);
$id = $_SESSION['adminid'];
$where = "id=$id";
 if(update($table, $array,$where)) {
    alertmes("更新成功", "index.php");
} 