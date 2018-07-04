<?php
session_start();
$uid = $_SESSION['uid'];
date_default_timezone_set('Asia/Shanghai');//设置时区
$showtime=date("Y-m-d");//获取系统当前时间
include 'connection.php';
$sql1 = 'select count(*) from kaoqin where kaoqin.uid="'.$uid.'" and time2="'.$showtime.'"';
$sql2 = 'select count(*) from kaoqin where kaoqin.uid="'.$uid.'" and time1="'.$showtime.'"';
$res1 = mysqli_query($link , $sql1);
$res2 = mysqli_query($link , $sql2);
$row1 = mysqli_fetch_array($res1);
$row2 = mysqli_fetch_array($res2);
if($row1[0]!=0){
    echo "<script language=javascript>alert('您已签退，请勿重复签退！');history.back();</script>";
}else{
    $time = date("H:i:s");
    $status = '正常';
    if(strcmp($time,'18:00:00')<0)
        $status = '早退';

    if($row2[0]!=0){
        $sql_update = 'UPDATE kaoqin SET time2 = "'.$showtime.'",status2 = "'.$status.'" where kaoqin.uid="'.$uid.'" and time1="'.$showtime.'"';
        mysqli_query($link , $sql_update);
        if(mysqli_affected_rows($link) >= 0)
            if($status == '正常')
                echo "<script language=javascript>alert('今天又是收获满满的一天！');history.back();</script>";
            else
                echo "<script language=javascript>alert('您已早退，但今天依然是收获满满的一天！');history.back();</script>";
        else{
            echo "<script language=javascript>alert('签退失败，请重新签退1！');history.back();</script>";
        }
    }else{
        $sql_insert = 'insert into kaoqin(uid , time2 , status2) values("'.$uid.'","'.$showtime.'","'.$status.'")';
        mysqli_query($link , $sql_insert);
        if(mysqli_affected_rows($link) >= 0)
            if($status == '正常')
                echo "<script language=javascript>alert('您今天未签到，但今天依然是收获满满的一天！');history.back();</script>";
            else
                echo "<script language=javascript>alert('您今天未签到并且早退，但今天依然是收获满满的一天！');history.back();</script>";
        else{
            echo "<script language=javascript>alert('签退失败，请重新签退2！');history.back();</script>";
        }
    }

}


