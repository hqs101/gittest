<?php
$conn_ftp = ftp_connect('127.0.0.1') or die('找不到服务器');
$login_res = ftp_login($conn_ftp , 'boss','123456') or die('登录失败');
$path = $_GET['path'];
//从path中取出文件名
$filename = explode('_',explode('/',$path)[2])[1]; //例如：xm/5/4_1.txt
//将下载的文件保存到D:\download目录下
$name_true ='D:\download\\'.$filename;
//取出文件后缀
$ext = explode('.',$filename)[1];
$flag = 0;
switch ($ext){//文件下载时的传输格式
    case 'png':
    case 'jpg':
    case 'gif':
    case 'zip':
    case 'rar':
        $flag = 1;
        break;
}
if(ftp_get($conn_ftp , $name_true ,$path, $flag==0?FTP_ASCII:FTP_ASCII)){
    echo '<script>alert("文件以下载，保存在D:\download目录下");history.back();</script> ';
}else{
    echo '<script>alert("文件下载失败！");history.back();</script>';
}
ftp_close($conn_ftp);