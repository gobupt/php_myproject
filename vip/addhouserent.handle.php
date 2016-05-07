<?php
require_once '../include.php';
$array=$_POST;
$array['pubtime']=time();
$table="house_rent";
if($array['title']&&$array['community']&&$array['city']&&$array['county']&&$array['town']&&$array['address']&&$array['room']&&$array['hall']&&$array['toilet']&&$array['area']&&$array['rent']&&$array['time']&&$array['name']&&$array['phone']) {
    if(addhouse($table, $array,"rent"))
        alertmes("发布成功!", "houselist.php");
}else 
    alertmes("请填写完整信息", "houserent.php");
