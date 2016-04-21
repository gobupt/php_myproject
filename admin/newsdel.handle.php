<?php
require_once '../include.php';
$table = "house_news";
$id = $_GET['id'];
$where = "id = $id";
if(delete($table,$where)) {
    alertmes("删除成功","newslist.php");
}