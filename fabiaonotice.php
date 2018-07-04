<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/7
 * Time: 9:33
 */
session_start();
$nname = $_POST['nname'];
$uid = $_SESSION['uid'];
$ntype = $_POST['ntype'];
$ncontent = $_POST['content'];
include 'connection.php';
$sql = 'insert into notic(uid,nname,ntype,ncontent) values("'.$uid.'","'.$nname.'","'.$ntype.'","'.$ncontent.'")';
if(mysqli_query($link , $sql)){
    echo '<script language=javascript>alert(\'添加成功！\');history.back();</script>';
}
else{
    echo "<script language=javascript>alert('添加失败！');history.back();</script>";
}



