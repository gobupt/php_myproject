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
 * 获得所有管理员
 * @return Ambigous <Ambigous, multitype:>
 */
function getalladmin() {
    $sql = "select * from house_admin";
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
    go("adlogin.php");
}
function getoneadmin($id) {
    $sql = "select * from house_admin where id=$id";
    $rows = fetchone($sql);
    return $rows;
}