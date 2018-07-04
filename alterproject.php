<?php
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $uid = $_POST['uid'];
    $endtime = $_POST['endtime'];

    include 'connection.php';
    $sql_projectinfo = 'update projectinfo set pname="'.$pname.'",uid="'.$uid.'",endtime="'.$endtime.'" where pid = "'.$pid.'"';
    if(mysqli_query($link , $sql_projectinfo)){
        //删除该项目的全部工作信息

        mysqli_query($link , $sql_del);$sql_del = 'delete from work where pid = '.$pid;
        if(mysqli_affected_rows($link)>=1){
            //删除完工作信息后开始添加新的工作信息
            //插入做需求分析工作信息
            $xq = $_POST['xq'];
            foreach ($xq as $item)//每个任务可能有多个用户做，循环输出做需求分析的人
            {
                $sql = 'insert into work(pid , uid , worktask) values("'.$pid.'","'.$item.'","需求分析")';
                mysqli_query($link , $sql);
            }
            //插入做系统设计工作信息
            $sj = $_POST['sj'];
            foreach ($sj as $item)
            {
                $sql = 'insert into work(pid , uid , worktask) values("'.$pid.'","'.$item.'","系统设计")';
                mysqli_query($link , $sql);
            }
            //插入做编码实现工作信息
            $sx = $_POST['sx'];
            foreach ($sx as $item)
            {
                $sql = 'insert into work(pid , uid , worktask) values("'.$pid.'","'.$item.'","编码实现")';
                mysqli_query($link , $sql);
            }
            //插入做系统测试工作信息
            $cs = $_POST['cs'];
            foreach ($cs as $item)
            {
                $sql = 'insert into work(pid , uid , worktask) values("'.$pid.'","'.$item.'","系统测试")';
                mysqli_query($link , $sql);
            }
            header('location:projectlist.php?key=');
        }else{
            echo "<script language=javascript>alert('项目信息修改失败！');history.back();</script>";
        }
    } else{
        echo "<script language=javascript>alert('项目信息修改失败！');history.back();</script>";
    }