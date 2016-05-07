<?php
function addalbum($array) {
    $table="house_album";
    if(insert($table, $array)) {
        return true;
    }
    return false;
}