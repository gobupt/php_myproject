<?php
require_once '../include.php';
//通过<a href="...php?act=xxx">得到act;
$act=$_GET['act'];
if($act=="logout"){
    logout();
}else if($act=="addadmin") {
    $mes = addadmin();
}