<?php
    $pid = $_GET['pid'];
    $filename = $_GET['filename'];
    $file=$_SERVER['DOCUMENT_ROOT'].'/upload/xm/'.$pid.'/'.$filename ;
    echo $file;
    if(is_file($file)) {
        header("Content-Type: application/force-download");
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=".basename($file));
        readfile($file);
    }else{
        echo "<script language=javascript>alert('文件不存在！');history.back();</script>";
    }