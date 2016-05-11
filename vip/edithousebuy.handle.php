<?php
require_once '../include.php';
$array = $_POST;
$table = "house_buy";
$array['pubtime']=time();
$id = $_POST['id'];
$where = "id=$id";
if($array['city'] && $array['county'] && $array['town'] && $array['address'] && $array['price'] && $array['area'] && $array['title'] && $array['name'] && $array['phone']) {
    if(update($table, $array,$where))
        alertmes("编辑成功", "housebuylist.php");
    else
        alertmes("编辑失败", "housebuyedit.php?id=$id");
}else {
    alertmes("您编辑的信息不完整", "housebuyedit.php?id=$id");
}