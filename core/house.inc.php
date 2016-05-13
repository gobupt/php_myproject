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
/**
 * 修改房屋
 * @param unknown $table
 * @param unknown $array
 * @param unknown $cate
 * @param unknown $hid
 * @return boolean
 */
function edithouse($table, $array,$cate,$hid) {
    if(update($table, $array,"id=$hid")) {
        $uploadfiles=upload();
        $i=0;
        if(is_array($uploadfiles)&&$uploadfiles) {
            foreach ($uploadfiles as $uploadfile) {
                thumb("uploads/".$uploadfile['name'],"../images_listthumb/".$uploadfile['name'],1,275,207);
                thumb("uploads/".$uploadfile['name'],"../images_detail/".$uploadfile['name'],1,722,542);
                thumb("uploads/".$uploadfile['name'],"../images_detailthumb/".$uploadfile['name'],1,94,62);
                thumb("uploads/".$uploadfile['name'],"../images_homethumb/".$uploadfile['name'],1,207,138);
                if(!$i&&$_FILES['image_index']['tmp_name']) {
                    $arr1=getoneimgbyhid($hid,$cate);
                    if (file_exists("../admin/uploads/" . $arr1['albumpath'])) {
                        unlink("../admin/uploads/" . $arr1['albumpath']);
                    }
                    if (file_exists("uploads/" . $arr1['albumpath'])) {
                        unlink("uploads/" . $arr1['albumpath']);
                    }
                    if (file_exists("../images_detail/" . $arr1['albumpath'])) {
                        unlink("../images_detail/" . $arr1['albumpath']);
                    }
                    if (file_exists("../images_detailthumb/" . $arr1['albumpath'])) {
                        unlink("../images_detailthumb/" . $arr1['albumpath']);
                    }
                    if (file_exists("../images_homethumb/" . $arr1['albumpath'])) {
                        unlink("../images_homethumb/" . $arr1['albumpath']);
                    }
                    if (file_exists("../images_listthumb/" . $arr1['albumpath'])) {
                        unlink("../images_listthumb/" . $arr1['albumpath']);
                    }
                    $arr1['albumpath']=$uploadfile['name'];
                    updatealbum($arr1,$arr1['id']);
                }else {
                    $arr2['hid']=$hid;
                    $arr2['albumpath']=$uploadfile['name'];
                    $arr2['cate']=$cate;
                    addalbum($arr2);
                }
                $i++;
            }
        }
        return true;
    }else {
        return false;
    }
} 
/**
 * 获得房屋的数据条数
 * @return number
 */
function gethousenum($table,$where=null) {
    $where= ($where)? "where $where" : null;
    $sql = "select * from $table $where";
    return getresultnum($sql);
}

/**
 * 通过分页获得房屋信息
 * @param unknown $pagesize
 * @param unknown $page
 * @param unknown $totalpage
 * @return Ambigous <Ambigous, multitype:>
 */
function gethousebypage($pagesize, $page, $totalpage,$table,$where=null,$order="pubtime desc") {
    $where= ($where)? "where $where" : null;
    $offset = ($page-1)*$pagesize;
    $sql = "select * from $table $where order by $order limit $offset,$pagesize";
    $row3 = fetchall($sql);
    return $row3;
}

/**
 * 通过ID获得一条记录
 * @param unknown $id
 * @return Ambigous <multitype:, multitype:>
 */
function getonehouse($id,$table) {
    $sql ="select * from $table where id=$id";
    return fetchone($sql);
}

function gettophousebynum($num,$table) {
    $sql = "select * from $table order by pubtime desc limit 0,$num";
    $row = fetchall($sql);
    return $row;
}









