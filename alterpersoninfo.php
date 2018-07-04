<?php
    //获取基本信息
    $uid = $_POST['uid'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $worktype = $_POST['worktype'];
    $workclass = $_POST['workclass'];
    //获取联系信息
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $workphone = $_POST['workphone'];
    //上传图像
    $photo = '';
    //判断是否有上传文件
    if(!empty($_FILES['photo']['tmp_name'])){//头像input的名字是photo
    //获取文件大小
    $file_size = $_FILES['photo']['size'];
    if($file_size>2*1024*1024){
        echo "<script language=javascript>alert('文件超过2M！');history.back();</script>";
    }else{
        //判断是否上传到服务器
        if(is_uploaded_file($_FILES['photo']['tmp_name'])){
            $upload_file = $_FILES['photo']['tmp_name'];
            $uploadpath = $_SERVER['DOCUMENT_ROOT'].'/upload/photo';
            if(!file_exists($uploadpath)){
                mkdir($uploadpath);
            }
            //设置文件名
            $truename = $_FILES['photo']['name'];
            $filename = time().rand(1,100).substr($truename,strrpos($truename,"."));
            $movefile = $uploadpath.'/'.$filename;
            if(move_uploaded_file($upload_file,iconv("utf-8","gb2312",$movefile))){
                $photo = $filename;//命名相关材料
            }else{
                echo "<script language=javascript>alert('上传失败');history.back();</script>";
                //echo $truename;
                exit();
            }
        }
    }
}
    include 'connection.php';
    $sql1= 'update basicinfo set name ="'.$name.'",sage='.$age.',sex="'.$sex.'",worktype="'.$worktype.'",workclass="'.$workclass.'",photo="'.$photo.'" where uid='.$uid;
    $sql2 = 'update contactinfo set phone="'.$phone.'",email="'.$email.'",address="'.$address.'",workphone="'.$workphone.'" where uid='.$uid;
    $res1 = mysqli_query($link , $sql1);
    if(mysqli_affected_rows($link)>=0){
        mysqli_query($link , $sql2);
        if(mysqli_affected_rows($link)>=0){
            echo "<script language=javascript>alert('修改成功！');</script>";
            header('location:userlist.php?key=');
        }else{
            echo "<script language=javascript>alert('联系信息修改失败！');history.back();</script>";
        }
    }else{
        echo "<script language=javascript>alert('基本信息修改失败！');history.back();</script>";
    }