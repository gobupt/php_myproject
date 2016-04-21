<?php
/**
 * 获取所有新闻
 * @return Ambigous <Ambigous, multitype:>
 */
function getallnew() {
    $sql = "select * from house_news";
    return fetchall($sql);
}
function getonenew($id) {
    $sql = "select * from house_news where id=$id";
    return fetchone($sql);
}