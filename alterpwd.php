<?php
session_start();
$uid = $_SESSION['uid'];
$newpwd = md5($_POST['pwd1']);
include 'connection.php';
$sql = 'update user set password ="'.$newpwd.'" where uid='.$uid;
mysqli_query($link,$sql);
if(mysqli_affected_rows($link) >= 0){
    echo "<script language=javascript>alert('密码修改成功！');history.back();</script>";
}
else{
    echo "<script language=javascript>alert('密码修改失败！');history.back();</script>";
}