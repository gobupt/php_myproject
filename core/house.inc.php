<?php
// 原图 uploads
// width 275px height 207px 列表页缩略图 listthumb
// width 722px height 542px 详情页图     detail
// width 94px  height 62px  详情页略缩图 detailthumb
// width 207px height 138px 主页略缩图   homethumb

/**
 * 添加房屋信息
 * @param unknown $array
 * @return boolean
 */
function addhouse($table,$array,$cate) {
    $hid=insert($table, $array);
    if($hid) {
        $uploadfiles=upload();
        if(is_array($uploadfiles)&&$uploadfiles) {
            foreach ($uploadfiles as $uploadfile) {
                thumb("uploads/".$uploadfile['name'],"../images_listthumb/".$uploadfile['name'],1,275,207);
                thumb("uploads/".$uploadfile['name'],"../images_detail/".$uploadfile['name'],1,722,542);
                thumb("uploads/".$uploadfile['name'],"../images_detailthumb/".$uploadfile['name'],1,94,62);
                thumb("uploads/".$uploadfile['name'],"../images_homethumb/".$uploadfile['name'],1,207,138);
                $arr1['hid']=$hid;
                $arr1['albumpath']=$uploadfile['name'];
                $arr1['cate']=$cate;
                addalbum($arr1);
            }   
        }
        return true;
    }else {
        return false;
    }
}