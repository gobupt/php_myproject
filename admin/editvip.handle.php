<?php
require_once '../include.php';
$table = "house_vip";
$sql = "select * from house_vip";
$total = getresultnum($sql);
for($i=0;$i<$total;$i++) {
    $id = $_POST['id'][$i];
    $password = $_POST['password'][$i];
    $len=strlen($password);
    $array=array("password"=>$password);
    $where = "id=$id";
    if($len>=6) {
        update($table, $array,$where);
    }
}
alertmes("操作成功", "index.php");