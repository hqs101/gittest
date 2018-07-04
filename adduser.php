<?php
    $uid = $_POST['newuid'];
    $grade = $_POST['grade'];
    include 'connection.php';
    $sql = 'insert into user(uid , grade) values('.$uid.','.$grade.')';
    $sql_basic = 'insert into basicinfo(uid) values('.$uid.')';
    $sql_con = 'insert into contactinfo(uid) values('.$uid.')';
    if(mysqli_query($link , $sql) && mysqli_query($link , $sql_basic) && mysqli_query($link , $sql_con)){
        echo '<script language=javascript>alert(\'添加成功！\');history.back();</script>';
    }
    else{
        echo "<script language=javascript>alert('添加失败！');history.back();</script>";
    }