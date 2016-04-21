<?php
require_once '../include.php';
$title=$_POST['title'];
$source=$_POST['source'];
$content=$_POST['content'];
$pubtime=time();
$id = $_POST['id'];
$array=array(
    "title"=>$title,
    "source"=>$source,
    "content"=>$content,
    "pubtime"=>$pubtime
);
$table = house_news;
$where = "id=$id";
if(empty($title)) $flag1=1;
if(empty($source)) $flag2=1;
if(empty($content)) $flag3=1;
if($flag1) {
    alertmes("标题不能为空", "newsedit.php?id=$id");
}else if($flag2) {
    alertmes("来源不能为空", "newsedit.php?id=$id");
}else if($flag3) {
    alertmes("内容不能为空", "newsedit.php?id=$id");
}else {
    if(update($table, $array,$where))
        alertmes("修改成功", "newslist.php");
}