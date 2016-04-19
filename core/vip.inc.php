<?php
/**
 * 获得所有会员
 * @return Ambigous <Ambigous, multitype:>
 */
function getallvip() {
    $sql = "select * from house_vip";
    $rows = fetchall($sql);
    return $rows;
}
/**
 * 检查是否有会员
 * @param unknown $sql
 * @return Ambigous <multitype:, multitype:>
 */
function checkvip($sql) {
    return fetchone($sql);  //查看是否有数据
}
/**
 * 会员退出（会员中心）
 */
function logoutv2() {
    $_SESSION=array();  //清缓存
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    session_destroy();
    go("../index.php");
}
/**
 * 会员退出（首页）
 */
function logoutv1() {
    $_SESSION=array();  //清缓存
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1,"/","localhost");
    }
    session_destroy();
    go("index.php");
}