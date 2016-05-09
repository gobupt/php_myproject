<?php
/**
 * 添加相册
 * @param unknown $array
 * @return boolean
 */
function addalbum($array) {
    $table="house_album";
    if(insert($table, $array)) {
        return true;
    }
    return false;
}

/**
 * 通过HID获得所有相册
 * @param unknown $hid
 * @return Ambigous <Ambigous, multitype:>
 */
function getallimgbyhid($hid,$cate=null) {
    $cate = ($cate)? "cate=$cate" :null;
    $sql = "select * from house_album where hid=$hid,$cate";
    return fetchall($sql);
}

function getoneimgbyid($id,$cate=null) {
    $cate = ($cate)? "cate=$cate" :null;
    $sql = "select * from house_album where id=$id,$cate";
    return fetchone($sql);
}