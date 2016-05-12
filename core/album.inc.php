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
function updatealbum($array,$id) {
    $table="house_album";
    if(update($table, $array,"id=$id")) {
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
    $cate = ($cate)? "cate='$cate'" :null;
    $sql = "select * from house_album where hid=$hid and $cate";
    return fetchall($sql);
}

/**
 * 通过HID获得一个相册
 * @param unknown $hid
 * @param string $cate
 * @return Ambigous <multitype:, multitype:>
 */
function getoneimgbyhid($hid,$cate=null) {
    $cate = ($cate)? "cate='$cate'" :null;
    $sql = "select * from house_album where hid=$hid and $cate limit 0,1";
    return fetchone($sql);
}
/**
 * 通过id获得图片
 * @param unknown $id
 * @param string $cate
 * @return Ambigous <multitype:, multitype:>
 */
function getoneimgbyid($id,$cate=null) {
    $cate = ($cate)? "cate='$cate'" :null;
    $sql = "select * from house_album where id=$id and $cate";
    return fetchone($sql);
}