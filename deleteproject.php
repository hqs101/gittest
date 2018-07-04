<?php
    $pid = $_GET['pid'];
    $sql = 'delete from projectinfo where pid = '.$pid;
    include 'connection.php';
    $res = mysqli_query($link , $sql);
    if(mysqli_affected_rows($link) == 1) {
         echo '<script language=javascript>alert(\'删除成功！\')';
         header('location:projectlist.php?key=');
    }else{
        echo "<script language=javascript>alert('删除失败！');history.back();</script>";
    }
    mysqli_close($link);
