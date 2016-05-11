<?php
require_once '../include.php';
$array=array(
    "title"=>$_POST['title'],
    "community"=>$_POST['community'],
    "province"=>$_POST['province'],
    "city"=>$_POST['city'],
    "county"=>$_POST['county'],
    "town"=>$_POST['town'],
    "address"=>$_POST['address'],
    "room"=>$_POST['room'],
    "hall"=>$_POST['hall'],
    "toilet"=>$_POST['toilet'],
    "area"=>$_POST['area'],
    "decoration"=>$_POST['decoration'],
    "rent"=>$_POST['rent'],
    "time"=>$_POST['time'],
    "name"=>$_POST['name'],
    "phone"=>$_POST['phone'],
    "content"=>$_POST['content']
);
$array['pubtime']=time();
$array['vid']=$_SESSION['vipid'];
$table="house_rent";
$hid=$_POST['hid'];
if($array['title']&&$array['community']&&$array['city']&&$array['county']&&$array['town']&&$array['address']&&$array['room']&&$array['hall']&&$array['toilet']&&$array['area']&&$array['rent']&&$array['time']&&$array['name']&&$array['phone']) {
    if(edithouse($table, $array,"rent",$hid))  {//1
        //删图片
        $imgs=$_POST['delimage'];
        if($imgs && is_array($imgs)) {
            foreach ($imgs as $imgid) {
                $houseimg=getoneimgbyid($imgid,"rent"); 
                if (file_exists("uploads/" . $houseimg['albumpath'])) {
                    unlink("uploads/" . $houseimg['albumpath']);
                }
                if (file_exists("../images_detail/" . $houseimg['albumpath'])) {
                    unlink("../images_detail/" . $houseimg['albumpath']);
                }
                if (file_exists("../images_detailthumb/" . $houseimg['albumpath'])) {
                    unlink("../images_detailthumb/" . $houseimg['albumpath']);
                }
                if (file_exists("../images_homethumb/" . $houseimg['albumpath'])) {
                    unlink("../images_homethumb/" . $houseimg['albumpath']);
                }
                if (file_exists("../images_listthumb/" . $houseimg['albumpath'])) {
                    unlink("../images_listthumb/" . $houseimg['albumpath']);
                }
                $table = "house_album";
                $where ="id=$imgid and cate='rent'";
                delete($table,$where);
            }
        }
        //删图片
        alertmes("编辑成功!", "houserentlist.php");
    }
    else 
        alertmes("编辑失败!", "houserentedit.php?id=$hid");
}else 
    alertmes("请填写完整信息", "houserentedit.php?id=$hid");
