<?php
require_once '../include.php';
$table = "house_vip";
$sql = "select * from house_vip";
$total = getresultnum($sql);
for($i=0;$i<$total;$i++) {
    $password = $_POST['password'][$i];
    $len=strlen($password);
    if($len>0 && $len<6) {
        $flag = 1;
    }
}
if(isset($flag))
    alertmes("操作失败", "index.php");
else {
    for($i=0;$i<$total;$i++) {
        $id = $_POST['id'][$i];
        $password = $_POST['password'][$i];
        $array=array("password"=>$password);
        $where= "id=$id";
        if($len>=6)
            update($table, $array,$where);
    }
    alertmes("操作成功", "index.php");
}