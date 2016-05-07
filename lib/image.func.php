<?php
require_once 'string.func.php';

/**
 * 生成验证码
 * @param string $sess_name
 * @param number $length
 * @param number $type
 */
function verifyImage($sess_name = "verify",$length = 4,$type = 3)
{
    session_start();
    $width = 80;
    $height = 30;
    $image = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);
    imagefilledrectangle($image, 1, 1, $width - 2, $height - 2, $white);
    $chars = buildRandomString($type, $length);
    $_SESSION[$sess_name] = $chars;
    $fontfile = "../fonts/SIMYOU.TTF";
    for ($i = 0; $i < $length; $i ++) {
        $size = mt_rand(14, 18);
        $angle = mt_rand(- 15, 15);
        $x = 5 + $i * $size;
        $y = mt_rand(20, 26);
        $color = imagecolorallocate($image, mt_rand(50, 90), mt_rand(80, 200), mt_rand(90, 180));
        $text = substr($chars, $i, 1);
        imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
    }
    ob_clean();
    header("content-type:image/gif");
    imagegif($image);
    imagedestroy($image);
}
/**
 * 生成略缩图
 * @param unknown $filename
 * @param string $destination
 * @param real $scale
 * @param string $dst_w
 * @param string $dst_h
 * @param string $isreservedsource
 * @return string
 */
function thumb($filename,$destination=null,$scale=0.5,$dst_w=null,$dst_h=null,$isreservedsource=TRUE) {
    list($src_w,$src_h,$imagetype)=getimagesize($filename);
    if(is_null($dst_w)||is_null($dst_h)) {
        $dst_w=ceil($src_w*$scale);
        $dst_h=ceil($dst_h*$scale);
    }
    $mime=image_type_to_mime_type($imagetype);
    $createfun=str_replace("/", "createfrom", $mime);
    $outfun=str_replace("/", null, $mime);
    $src_image=$createfun($filename);
    $dst_image=imagecreatetruecolor($dst_w, $dst_h);
    imagecopyresampled($dst_image, $src_image, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
    if($destination&&!file_exists(dirname($destination))) {
        mkdir(dirname($destination),0777,true);
    }
    $dstfilename=$destination==null?getuniname().".".getext($filename):$destination;
    $outfun($dst_image,$dstfilename);
    imagedestroy($src_image);
    imagedestroy($dst_image);
    if(!$isreservedsource) {
        unlink($filename);
    }
    return $dstfilename;
}