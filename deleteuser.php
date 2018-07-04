<?php
    $uid = $_GET['uid'];
    include 'connection.php';
    $sql1 = 'delete from user where uid='.$uid;
    $sql2 = 'delete from basicinfo where uid='.$uid;
    $sql3 = 'delete from contactinfo where uid='.$uid;
    $res1 = mysqli_query($link , $sql1);
    if(mysqli_affected_rows($link) == 1){
        $res2 = mysqli_query($link , $sql2);
        if(mysqli_affected_rows($link) == 1){
            $res3 = mysqli_query($link , $sql3);
            if(mysqli_affected_rows($link) == 1) {
                echo '<script language=javascript>alert(\'删除成功！\')';
                header('location:userlist.php?key=');
            }else{
                echo "<script language=javascript>alert('删除失败！');history.back();</script>";
            }
        }else{
            echo "<script language=javascript>alert('删除失败！');history.back();</script>";
        }
    }else{
        echo "<script language=javascript>alert('删除失败！');history.back();</script>";
    }