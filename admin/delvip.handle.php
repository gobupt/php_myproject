<?php
require_once '../include.php';
$id = $_GET['id'];
$table = "house_vip";
$where = "id=$id";
if(delete($table,$where)) {
    alertmes("已删除", "index.php");
}