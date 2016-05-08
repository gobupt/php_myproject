<?php
require_once '../include.php';
$table="house_need";
$array=$_POST;
$array['pubtime']=time();
if($array['city'] && $array['county'] && $array['town'] && $array['address'] && $array['rent'] && $array['time'] && $array['title'] && $array['name'] && $array['phone']) { 
    if(insert($table, $array))
        alertmes("发布成功", "houselist.php");
    else 
        alertmes("发布失败", "houseneed.php");
}else {
    alertmes("您发布的信息不完整", "houseneed.php");
}