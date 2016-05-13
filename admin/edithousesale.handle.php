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
    "price"=>$_POST['price'],
    "time"=>$_POST['time'],
    "property"=>$_POST['property'],
    "structure"=>$_POST['structure'],
    "name"=>$_POST['name'],
    "phone"=>$_POST['phone'],
    "content"=>$_POST['content']
);
$array['pubtime']=time();
$table="house_sale";
$hid=$_POST['hid'];
if($array['title']&&$array['community']&&$array['city']&&$array['county']&&$array['town']&&$array['address']&&$array['room']&&$array['hall']&&$array['toilet']&&$array['area']&&$array['price']&&$array['name']&&$array['structure']&&$array['phone']) {
    if($array['time']) {
        if($array['time']<1901 || $array['time']>2016)
            alertmes("请输入有效年份(1901-2016)", "housesaleedit.php?id=$hid");
        else {
            if(edithouse($table, $array,"sale",$hid))  {//1
            //删图片
            $imgs=$_POST['delimage'];
            if($imgs && is_array($imgs)) {
                foreach ($imgs as $imgid) {
                    $houseimg=getoneimgbyid($imgid,"sale"); 
                    if (file_exists("../vip/uploads/" . $houseimg['albumpath'])) {
                        unlink("../vip/uploads/" . $houseimg['albumpath']);
                    }
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
                    $where ="id=$imgid and cate='sale'";
                    delete($table,$where);
                }
            }
        //删图片
        alertmes("编辑成功!", "housesalelist.php");
         }
      }
    }else {
        if(edithouse($table, $array,"sale",$hid))  {//1
            //删图片
            $imgs=$_POST['delimage'];
            if($imgs && is_array($imgs)) {
                foreach ($imgs as $imgid) {
                    $houseimg=getoneimgbyid($imgid,"sale");
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
                    $where ="id=$imgid";
                    delete($table,$where);
                }
            }
            //删图片
            alertmes("编辑成功!", "housesalelist.php");
        }
    }
}else 
    alertmes("请填写完整信息", "housesaleedit.php?id=$hid");
