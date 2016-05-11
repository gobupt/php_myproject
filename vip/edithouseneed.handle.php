<?php
require_once '../include.php';
$array = $_POST;
$table = "house_need";
$array['pubtime']=time();
$id = $_POST['id'];
$where = "id=$id";
if($array['city'] && $array['county'] && $array['town'] && $array['address'] && $array['rent'] && $array['time'] && $array['title'] && $array['name'] && $array['phone']) { 
    if(update($table, $array,$where))
        alertmes("编辑成功", "houseneedlist.php");
    else 
        alertmes("编辑失败", "houseneededit.php?id=$id");
}else {
    alertmes("您编辑的信息不完整", "houseneededit.php?id=$id");
}