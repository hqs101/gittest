<?php
session_start();
$uid = $_SESSION['uid'];
date_default_timezone_set('Asia/Shanghai');//设置时区
$showtime=date("Y-m-d");//获取系统当前时间
include 'connection.php';
$sql1 = 'select count(*) from kaoqin where kaoqin.uid="'.$uid.'" and time1="'.$showtime.'"';
$res = mysqli_query($link , $sql1);
$row = mysqli_fetch_array($res);
if($row[0]!=0){
    echo "<script language=javascript>alert('您已签到，请勿重复签到！');history.back();</script>";
}else{
    $time = date("H:i:s");
    $status = '正常';
    if(strcmp($time,'08:00:00')>0)
        $status = '迟到';
    $sql_insert = 'insert into kaoqin(uid , time1 , status1) values("'.$uid.'","'.$showtime.'","'.$status.'")';
    mysqli_query($link , $sql_insert);
    if(mysqli_affected_rows($link) >= 0)
        if($status == '正常')
             echo "<script language=javascript>alert('今天又是充满希望的一天！');history.back();</script>";
        else
            echo "<script language=javascript>alert('您已迟到，但今天依然是充满希望的一天！');history.back();</script>";
    else{
        echo "<script language=javascript>alert('签到失败，请重新签到！');history.back();</script>";
    }
}

