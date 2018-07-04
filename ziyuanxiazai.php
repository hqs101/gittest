<?php
    $conn_ftp = ftp_connect('127.0.0.1') or die('找不到服务器');
    $login_res = ftp_login($conn_ftp , 'boss','123456') or die('登录失败');
    $pwd = ftp_pwd($conn_ftp);//pwd指当前目录upload
    $file_array = ftp_nlist($conn_ftp , $pwd);//获得文件列表，

    echo '<div class="global" style="margin:80px 120px;width: 40%;height: auto;border:1px solid #ccc;padding: 10px;">
        <h1 style="font-size: 21px;color: #47a4e1; margin-left: 10px;">资源下载</h1> ';
    foreach ($file_array as $item){
        switch ($item){
            case '/jx':
                echo '<div style="margin-top:25px;"><img src="./img/home.png" style="height: 29px;width: 30px;float: left;margin-left: 50px;"><a href="ziyuanlist.php?path=jx" style="text-decoration-line: none;height: 40px;text-align:center;float: left;font-size: 18px;">技术文档</a></div><div style="clear: both;"></div>';
                break;
            case '/xm':
                echo '<div ><img src="./img/home.png" style="height: 29px;width: 30px;float: left;margin-left: 50px;"><a href="ziyuanlist.php?path=xm" style="text-decoration-line: none;height: 40px;text-align:center;float: left;font-size: 18px;">项目文档</a></div><div style="clear: both;"></div>';
                break;
            case '/team':
                echo '<div ><img src="./img/home.png" style="height: 29px;width: 30px;float: left;margin-left: 50px;"><a href="ziyuanlist.php?path=team" style="text-decoration-line: none;height: 40px;text-align:center;float: left;font-size: 18px;">团队文档</a></div><div style="clear: both;"></div>';
                break;
        }
    }
echo '</div>';
