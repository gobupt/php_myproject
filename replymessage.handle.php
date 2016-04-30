<?php
require_once 'include.php';
if(!isset($_SESSION['adminid'])&&!isset($_SESSION['vipid']))
    alertmes("请先登录", "board.php");
else {
        $fid = $_POST['fid'];
        if($_SESSION['adminid']) {
            $cate = 'ad';
            $pubid = $_SESSION['adminid'];
        }else {
            $cate = 'vip';
            $pubid = $_SESSION['vipid'];
        }
        $replyid = $_POST['replyid'];
        $replycate = $_POST['replycate'];
        $content = $_POST['content'];
        insert_board($fid, $content, $cate, $pubid,$replyid,$replycate);
        go('board.php');
}