<?php
    include  'connection.php';
    $path = $_GET['path']; //是team、jx、xm
    $conn_ftp = ftp_connect('127.0.0.1') or die('找不到服务器');
    $login_res = ftp_login($conn_ftp , 'boss','123456') or die('登录失败');
    $file_array = ftp_nlist($conn_ftp , $path);//是文件列表路径,例如jx、team
echo '<div class="global" style="margin:80px 120px;width: 50%;height: auto;border:1px solid #ccc;padding: 10px;">
        <h1 style="font-size: 21px;color: #47a4e1; margin-left: 10px;">资源下载</h1> ';
    if($path != 'xm'){
        foreach ($file_array as $item){//file_array获得文件列表形式：jx/3-1.txt是$item，前面还有时间戳
            //echo $item.'<br>';
            $filename =explode('_',explode('/',$item)[1])[1] ;//[1]是数组下标
            echo '<div style="margin-top:25px;"><img src="./img/home.png" style="height: 29px;width: 30px;float: left;margin-left: 50px;"><a href="xiazaifile.php?path='.$item.'" style="text-decoration-line: none;height: 30px;text-align:center;float: left;font-size: 18px;">'.$filename.'</a></div><div style="clear: both;"></div>';
        }
    }else{
        foreach ($file_array as $item){
           //echo $item.'<br>';
            //按照pid查询项目的名称

            $pid =  explode('/',$item)[1];
            $sql = 'select pname from projectinfo where pid = '.$pid;
            $res = mysqli_query($link , $sql);
            $row = mysqli_fetch_array($res);
            $pname = $row[0];
            echo '<div style="margin-top:25px;"><img src="./img/home.png" style="height: 29px;width: 30px;float: left;margin-left: 50px;"><a href="projectfilelist.php?path='.$pid.'" style="text-decoration-line: none;height: 30px;text-align:center;float: left;font-size: 18px;">'.$pname.'</a></div><div style="clear: both;"></div>';
//项目文档上传项目发布里进行指定路径，项目文档下载显示的是项目名
        }
    }
