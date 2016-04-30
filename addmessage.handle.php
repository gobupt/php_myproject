<?php
require_once 'include.php';
if(!isset($_SESSION['adminid'])&&!isset($_SESSION['vipid']))
    alertmes("请先登录", "board.php");
else {
        if($_SESSION['adminid']) {
            $cate = 'ad';
            $fid = 0;
            $pubid = $_SESSION['adminid'];
        }else {
            $cate = 'vip';
            $fid = 0;
            $pubid = $_SESSION['vipid'];
          }
        $content = $_POST['content'];
        insert_board($fid, $content, $cate, $pubid);
        go('board.php');
}