<?php
    $pid = $_GET['path']; //形如1/2/3/4/5/6
    $conn_ftp = ftp_connect('127.0.0.1') or die('找不到服务器');
    $login_res = ftp_login($conn_ftp , 'boss','123456') or die('登录失败');
    //ftp_chdir($conn_ftp , 'xm/'.$pid);//ftp_chdir指定跳到xm/下的某一个文件夹下面，文件夹下的文件，mkdir创建文件夹
    //$pwd = ftp_pwd($conn_ftp);
    $file_array = ftp_nlist($conn_ftp , 'xm/'.$pid);
echo '<div class="global" style="margin:80px 120px;width: 40%;height: auto;border:1px solid #ccc;padding: 10px;">
        <h1 style="font-size: 21px;color: #47a4e1; margin-left: 10px;">资源下载</h1> ';
    foreach ($file_array as $item){
        $filename = explode('/',$item)[2];
       $showname = explode('_',$filename)[1];
        echo '<div ><img src="./img/home.png" style="height: 29px;width: 30px;float: left;margin-left: 50px;"><a href="projectxiazaifile.php?path='.$item.'" style="text-decoration-line: none;height: 40px;text-align:center;float: left;font-size: 18px;">'.$showname.'</a></div><div style="clear: both;"></div>';
    }
    echo '</div>';
