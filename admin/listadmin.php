<?php
$row=getalladmin();
if(!$rows) {
    alertmes("sorry,没有管理员请添加", "");
}