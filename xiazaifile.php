<?php
    $conn_ftp = ftp_connect('127.0.0.1') or die('找不到服务器');
    $login_res = ftp_login($conn_ftp , 'boss','123456') or die('登录失败');
    $path = $_GET['path'];//传过来的文件的名字就是路径，是上一个页面的item，形如：jx/4_1.txt
    $path = iconv('utf-8','GBK',$path);
    //将下载的文件保存到D:\download目录下
    $name_true ='D:\download\\'.explode('_',explode('/',$path)[1])[1] ;//例如：jx/4_1.txt
    $ext = explode('.',$path)[1];      //取出文件后缀
    $flag = 0;
    switch ($ext){
        case 'png':
        case 'jpg':
        case 'gif':
        case 'zip':
        case 'rar':
           $flag = 1;
            break;
    }
    if(ftp_get($conn_ftp , $name_true ,$path, $flag==0?FTP_ASCII:FTP_BINARY)){//下载成功返回true，否则返回false。ftp_binary是图片、音频、视频等二进制文件。ftp_ascii是可读文件。比如word/txt.
        echo '<script>alert("文件以下载，保存在D:\download目录下");history.back();</script> ';
    }else{
        echo '<script>alert("文件下载失败！");history.back();</script>';
    }
    ftp_close($conn_ftp);