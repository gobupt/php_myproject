<?php
require_once '../include.php';
$id =$_GET['id'];
$table = "house_need";
$where ="id=$id";
delete($table,$where);
go("houseneedlist.php");