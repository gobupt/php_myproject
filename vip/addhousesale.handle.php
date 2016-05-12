<?php
require_once '../include.php';
$array=$_POST;
$array['pubtime']=time();
$array['vid']=$_SESSION['vipid'];
$table="house_sale";
if($_FILES['image']['tmp_name']['0']&&$array['title']&&$array['community']&&$array['city']&&$array['county']&&$array['town']&&$array['address']&&$array['room']&&$array['hall']&&$array['toilet']&&$array['area']&&$array['price']&&$array['name']&&$array['phone']&&$array['structure']) {
    if($array['time']) {
        if($array['time']<1901 || $array['time']>2016)
            alertmes("请输入有效年份(1901-2016)", "housesale.php");
        else {
            if(addhouse($table, $array,"sale"))
                alertmes("发布成功!", "housesalelist.php");
        }
    }else {
        if(addhouse($table, $array,"sale"))
            alertmes("发布成功!", "housesalelist.php");
    }
        
}else 
    alertmes("请填写完整信息", "housesale.php");
