<?php
require_once '../include.php';
$id =$_GET['id'];
$table = "house_buy";
$where ="id=$id";
delete($table,$where);
go("housebuylist.php");