<?php
require_once '../include.php';
$title=$_POST['title'];
$source=$_POST['source'];
$content=$_POST['content'];
$pubtime=time();
$array=array(
    "title"=>$title,
    "source"=>$source,
    "content"=>$content,
    "pubtime"=>$pubtime
);
$table = house_news;
if(empty($title)) $flag1=1;
if(empty($source)) $flag2=1;
if(empty($content)) $flag3=1;
if($flag1) {
    alertmes("标题不能为空", "news.php");
}else if($flag2) {
    alertmes("来源不能为空", "news.php");
}else if($flag3) {
    alertmes("内容不能为空", "news.php");
}else {
    if(insert($table, $array))
        alertmes("发布成功", "news.php");
}