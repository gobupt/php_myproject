<?php

function buildRandomString($type , $length )
{
    if ($type == 1) {
        $chars = join("", range(0, 9));
    } else 
        if ($type == 2) {
            $chars = join("",array_merge(range(0, 9), range("a", "z")));
        } else 
            if ($type == 3) {
                $chars = join("", array_merge(range(0, 9), range("a", "z"), range("A", "Z")));
            }
    if ($length > strlen($chars)) {
        exit("字符串长度不够");
    }
    $chars = str_shuffle($chars);
    return substr($chars, 0, $length);
}