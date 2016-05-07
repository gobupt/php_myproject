<?php
/**
 * 生成上传文件数组
 * @return unknown
 */
function buildinfo() {
    foreach ($_FILES as $v) {
          if(empty($v['tmp_name'][0]))
             return ; 
    }
    $i = 0;
    foreach ($_FILES as $v) {
        if(is_string($v['name'])) {
            $files[$i]=$v;
        }else {
            foreach ($v['name'] as $key=>$val) {
                $files[$i]['name']=$val;
                $files[$i]['size']=$v['size'][$key];
                $files[$i]['tmp_name']=$v['tmp_name'][$key];
                $files[$i]['error']=$v['error'][$key];
                $files[$i]['type']=$v['type'][$key];
                $i++;
            }
        }
        $i++;
    }
    return $files;
}
/**
 * 上传一个文件
 * @param unknown $fileinfo
 * @param string $path
 * @param unknown $allowext
 * @param string $img
 * @return string
 */
function uploadfile($fileinfo,$path,$allowext,$img) {
    if($fileinfo['error']==UPLOAD_ERR_OK) {
        $ext=getext($fileinfo['name']);
        if(!in_array($ext, $allowext)) {
            $extflag=1;
            $mes="文件拓展名出错";
        }
        if($img) {
            $info=getimagesize($fileinfo['tmp_name']);
            if(!$info) {
               $imgflag=1;
               $mes="上传的文件不是图片"; 
            }
        }
        $filename=getuniname().".".$ext;
        if(!file_exists($path)) {
            mkdir($path,0777,true);
        }
        $destination=$path."/".$filename;
        if(is_uploaded_file($fileinfo['tmp_name']) &&!isset($extflag) &&!isset($imgflag)) {
            if(move_uploaded_file($fileinfo['tmp_name'], $destination)) {
                $mes = "文件上传成功";
                $files['name']=$filename;
            }
            else {
                $mes = "文件移动失败";
            }
        }if(!is_uploaded_file($fileinfo['tmp_name'])) {
            $mes = "文件不是通过HTTP POST方式上传上来的";
        }
    }else {
        switch ($fileinfo['error']) {
            case 1:
                $mes="超过了配置文件上传文件的大小";
                break;
            case 2:
                $mes="超过了表单设置上传文件的大小";
                break;
            case 3:
                $mes="文件部分被上传";
                break;
            case 4:
                $mes="没有文件被上传";
                break;
            case 6:
                $mes="没有找到临时目录";
                break;
            case 7:
                $mes="文件不可写";
                break;
            case 8:
                $mes="由于PHP的拓展程序中断了文件上传";
                break;
        }
    }
    return $files;
}
/**
 * 上传多个文件
 * @return string 文件名（二维数组）
 */
function upload($path="uploads",$allowext = array("gif","jpeg","jpg","png","wbmp"),$img=true) {
    $files=buildinfo();
    if(!($files&&is_array($files))) return ;
    foreach ($files as $fileinfo) {
        $file[]=uploadfile($fileinfo,$path,$allowext,$img);
    }
    return $file;
}




