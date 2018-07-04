<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');
    include 'connection.php';
    $uid = $_POST['uid'];
    //md5()函数加密结果是：32位 小写
    $pwd = md5($_POST['pwd']);
    $sql = 'select grade from user where uid = "'.$uid.'" and password = "'.$pwd.'"';
    $res = mysqli_query($link , $sql);
    if(mysqli_num_rows($res) < 1){
        header('location:index.php?info=err');
    }
    else{
        while($row = mysqli_fetch_array($res)){
            $grade = $row['grade'];
            $_SESSION['uid'] = $uid;
            $_SESSION['grade'] = $grade;
            echo $grade;
            switch($grade){
                case '1': header('location:adminindex.php');break;
                case '2': header('location:managerindex.php');break;
                case '3': header('location:userindex.php');break;
                default: header('location:error.html');
            }
        }
    }


