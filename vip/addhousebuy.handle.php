<?php
require_once '../include.php';
$table="house_buy";
$array=$_POST;
$array['vid']=$_SESSION['vipid'];
$array['pubtime']=time();
if($array['city'] && $array['county'] && $array['town'] && $array['address'] && $array['price'] && $array['area'] && $array['title'] && $array['name'] && $array['phone']) { 
    if(insert($table, $array))
        alertmes("发布成功", "housebuylist.php");
    else 
        alertmes("发布失败", "housebuy.php");
}else {
    alertmes("您发布的信息不完整", "housebuy.php");
}