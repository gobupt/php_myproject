<?php
/**
 * 检查是否有管理员
 * @param unknown $sql
 * @return Ambigous <multitype:, multitype:>
 */
function checkadmin($sql) {
    return fetchone($sql);  //查看是否有数据
}
/**
 * 检查管理员是否登录
 */
function checklogined() {
    if($_SESSION['adminid']==""&&$_COOKIE['adminid']=="") {
        alertmes("没有登录，请先登录", "login.php");
    }
}
function addadmin() {
    $arr=$_GET;
    if(insert("",$arr)){
        $mes="添加成功!<br/><a href='addadmin.php'>继续添加</a>";
    }
}
function getalladmin() {
    $sql = "select * from xx";
    $rows = fetchall($sql);
    return $rows;
}
/**
 * 注销管理员
 */
function logout() {
    $_SESSION=array();  //清缓存
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    if(isset($_COOKIE['adminid'])) {
        setcookie("adminid","",time()-1);
    }
    if(isset($_COOKIE['adminname'])) {
        setcookie("adminname","",time()-1);
    }
    session_destroy();
    //是不是可以加入一个确认框？询问是否退出。
    alertmes("退出成功", "login.php");
}