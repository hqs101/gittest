<?php
    //设置pid
    $id_sql = 'select max(pid) from projectinfo';
    include 'connection.php';
    $res = mysqli_query($link , $id_sql);
    $pid = mysqli_fetch_array($res)[0] + 1;//
    //获取基础信息
    $pname = $_POST['pname'];
    $uid = $_POST['uid'];
    $jianjie = $_POST['jianjie'];
    $endtime = $_POST['endtime'];
    $aboutfile = '';
    //判断是否有上传文件
    if(!empty($_FILES['cailiao']['tmp_name'])){//相关材料input的名字是cailiao,$_FILES和$_POST是一个类型的，$_FILES是一个数组，cailiao是数组名，$_FILES里面的参数还有size，name，tmp_name等。$_FILES['cailiao']['tmp_name']可理解成一个二维数组。如果不上传文件就不判断，没限制非要上传文件。
        //获取文件大小
        $file_size = $_FILES['cailiao']['size'];
        if($file_size>2*1024*1024){
            echo "<script language=javascript>alert('文件超过2M！');history.back();</script>";
            exit();
        }else{
            //判断是否上传到服务器
            if(is_uploaded_file($_FILES['cailiao']['tmp_name'])){//is_uploaded_file($_FILES['cailiao']['tmp_name']已上传到服务器
                $upload_file = $_FILES['cailiao']['tmp_name'];
                $uploadpath = $_SERVER['DOCUMENT_ROOT'].'/upload/xm/'.$pid;
                if(!file_exists($uploadpath)){
                    mkdir($uploadpath);//创建文件夹
                }
                //设置文件名
                $truename = $_FILES['cailiao']['name'];
                $filename = rand(1,10).'_'.time().substr($truename,strrpos($truename,"."));//substr($truename,strrpos($truename,".")获取文件的后缀名
                $movefile = $uploadpath.'/'.$filename;
                if(move_uploaded_file($upload_file,iconv("utf-8","gb2312",$movefile))){
                    $aboutfile = $filename;//命名相关材料
                }else{
                    echo "<script language=javascript>alert('上传失败');history.back();</script>";
                    //echo $truename;
                    exit();//上传失败其实是移动失败，根据上传成功的流程判断，不判断是否上传文件，或是上传成功没。
                }
            }
        }
    }
//插入数据
$sql = 'insert into projectinfo(pid , pname , uid , pdescribe,endtime,jieshaofile) values('.$pid.',"'.$pname.'","'.$uid.'","'.$jianjie.'","'.$endtime.'","'.$aboutfile.'")';
mysqli_query($link , $sql);

if(mysqli_affected_rows($link) >= 1){
    echo "<script language=javascript>alert('项目发布成功!');history.back();</script>";
}
else{
    echo "<script language=javascript>alert('项目发布失败!');history.back();</script>";
}

