<?php
function alertmes($mes,$url){
    echo "<script> alert('$mes');</script>";
    echo "<script>location.href='$url';</script>";
}
function go($url) {
    echo "<script>location.href='$url';</script>";
}