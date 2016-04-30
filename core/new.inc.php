<?php
/**
 * 获取所有新闻
 * @return Ambigous <Ambigous, multitype:>
 */
function getallnew() {
    $sql = "select * from house_news order by pubtime desc";
    return fetchall($sql);
}
/**
 * 通过ID获得一条新闻
 * @param unknown $id
 * @return Ambigous <multitype:, multitype:>
 */
function getonenew($id) {
    $sql = "select * from house_news where id=$id";
    return fetchone($sql);
}
/**
 * 获得新闻数量
 */
function getnewnum() {
    $sql = "select * from house_news";
    return getresultnum($sql);
}
/**
 * 按分页获得新闻
 * @param unknown $pagesize
 * @param unknown $page
 * @param unknown $totalpage
 * @return Ambigous <Ambigous, multitype:>
 */
function getnewbypage($pagesize,$page,$totalpage) {
    $offset = ($page-1)*$pagesize;
    $sql = "select * from house_news order by pubtime desc limit $offset,$pagesize";
    $row3 = fetchall($sql);
    return $row3;
}
function gettopnewbynum($num) {
    $sql = "select * from house_news order by pubtime desc limit 0,$num";
    $row = fetchall($sql);
    return $row;
}
