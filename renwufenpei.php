<?php
/**
 * Created by PhpStorm.
 * User: xuyuge
 * Date: 2018/5/8
 * Time: 15:51
 */
    $pid = $_POST['pid'];
    include  'connection.php';
    //插入做需求分析工作信息
    $xq = $_POST['xq'];
    foreach ($xq as $item)
    {
        $sql = 'insert into work(pid , uid , worktask) values("'.$pid.'","'.$item.'","需求分析")';
        $res = mysqli_query($link , $sql);
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
    echo "<script language=javascript>alert('任务分配完成！');history.back();</script>";