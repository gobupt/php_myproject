<?php
require_once '../include.php';
$id =$_GET['id'];
$table = "house_rent";
$where ="id=$id";
delete($table,$where);
$houseimgs=getallimgbyhid($id,"rent");
if($houseimgs&&is_array($houseimgs)) {
    foreach ($houseimgs as $houseimg) {
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
    }
}
$table = "house_album";
$where ="hid=$id and cate='rent'";
delete($table,$where);
go("houserentlist.php");