<?php
    $uid = $_GET['uid'];
    include 'connection.php';
    //查询基本信息
    $basicsql = 'select name ,  sage , sex , workclass , worktype from basicinfo where uid= '.$uid;
    $resbasic = mysqli_query($link , $basicsql);
    $basicrow = mysqli_fetch_array($resbasic);
    //查询联系信息
    $contactsql = 'select phone , email , address , workphone from contactinfo where uid= '.$uid;
    $rescontact = mysqli_query($link , $contactsql);
    $contactrow = mysqli_fetch_array($rescontact);
?>
<html>
<head>
    <link href="css/alterpersoninfoform.css" type="text/css" rel="stylesheet">
    <script>
        function check() {
           var reg_age = new RegExp('^[1-9][0-9]{0,2}$');
           var reg_phone = new RegExp('^1[0-9]{10}$');// /d是代表0-9的数字
           var reg_email = new RegExp('^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+');
           var age = document.getElementById('age').value;
           var phone = document.getElementById('phone').value;
           var email= document.getElementById('email').value;
            if(!reg_age.test(age)){
                alert("成员年龄输入格式不正确");
                document.getElementById('age').focus();
                document.getElementById('age').value='';
                return false;
            }
            if(!reg_phone.test(phone)){
                alert("成员联系方式输入格式不正确");
                document.getElementById('phone').focus();

                return false;
            }
            if(!reg_email.test(email)){
                alert("用户邮箱输入格式不正确");
                document.getElementById('email').focus();

                return false;
            }

            return true;


        }
    </script>
    <style>
        .file {
            position: relative;
            display: inline-block;
            background: #D0EEFF;
            border: 1px solid #99D3F5;
            border-radius: 4px;
            padding: 4px 12px;
            overflow: hidden;
            color: #1E88C7;
            text-decoration: none;
            text-indent: 0;
            line-height: 20px;
            margin-top: 20px;
            margin-left: 10px;

        }
        .file input {
            position: absolute;
            font-size: 100px;
            right: 0;
            top: 0;
            opacity: 0;
        }
        .file:hover {
            background: #AADFFD;
            border-color: #78C3F3;
            color: #004974;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <!--全局-->
    <div class="global">
        <!--基本信息块-->
        <form action="alterpersoninfo.php" method="post" onsubmit="return check()" enctype="multipart/form-data">
            <div>
                <div class="basicinfo">
                    <div class="lable1"></div><span class="lable2">基本信息</span>
                    <div class="cc">
                        <span class="bianqian">用户ID：</span><input class="id1" value="<?php echo $uid;?>" type="text" name="uid" readonly="readonly"><br>
                        <span class="bianqian">姓&nbsp;&nbsp;&nbsp;&nbsp;名：</span><input name="name" class="id" value="<?php echo $basicrow[0];?>" type="text"><br>
                        <span class="bianqian">年&nbsp;&nbsp;&nbsp;&nbsp;龄：</span><input id="age" name="age" class="id" value="<?php echo $basicrow[1];?>" type="text"><br>
                        <span class="bianqian">性&nbsp;&nbsp;&nbsp;&nbsp;别：</span>
                        <select name="sex" class="id">
                            <option value="男" <?php echo $basicrow[2]=='男'?'selected':'';?>>男</option>
                            <option value="女" <?php echo $basicrow[2]=='女'?'selected':'';?>>女</option>
                        </select><br>
                        <span class="bianqian">类&nbsp;&nbsp;&nbsp;&nbsp;别：</span>
                        <select name="workclass" class="id">
                            <option value="软件开发" <?php echo $basicrow[3]=='软件开发'?'selected':'';?>>软件开发</option>
                            <option value="软件测试" <?php echo $basicrow[3]=='软件测试'?'selected':'';?>>软件测试</option>
                            <option value="架构师" <?php echo $basicrow[3]=='架构师'?'selected':'';?>>架构师</option>
                            <option value="系统维护" <?php echo $basicrow[3]=='系统维护'?'selected':'';?>>系统维护</option>
                            <option value="文档整理" <?php echo $basicrow[3]=='文档整理'?'selected':'';?>>文档整理</option>
                            <option value="需求分析" <?php echo $basicrow[3]=='需求分析'?'selected':'';?>>需求分析</option>
                            <option value="后勤保障" <?php echo $basicrow[3]=='后勤保障'?'selected':'';?>>后勤保障</option>
                            <option value="团队负责人" <?php echo $basicrow[3]=='团队负责人'?'selected':'';?>>团队负责人</option>
                            <option value="项目负责人" <?php echo $basicrow[3]=='项目负责人'?'selected':'';?>>项目负责人</option>
                        </select><br>
                        <span class="bianqian">状&nbsp;&nbsp;&nbsp;&nbsp;态：</span>
                        <select name="worktype" class="id">
                            <option value="在职" <?php echo $basicrow[4]=='在职'?'selected':'';?>>在职</option>
                            <option value="实习" <?php echo $basicrow[4]=='实习'?'selected':'';?>>实习</option>
                        </select><br>
                        <span class="bianqian">头&nbsp;&nbsp;&nbsp;&nbsp;像：</span>
                        <a href="javascript:;" class="file">选择文件
                            <input type="file" name="photo" id="photo">
                        </a>

                    </div>
                </div>
                <!--联系信息块-->
                <div class="connectinfo">
                    <div class="lable1"></div><span class="lable2">联系信息</span>
                    <div style="margin-left: 20px;" class="cc1">
                        <span class="bianqian">电&nbsp;&nbsp;&nbsp;&nbsp;话：</span><input id="phone" name="phone" class="id" value="<?php echo $contactrow[0];?>" type="text"><br>
                        <span class="bianqian">邮&nbsp;&nbsp;&nbsp;&nbsp;箱：</span><input id="email" name="email" class="id" value="<?php echo $contactrow[1];?>" type="text"><br>
                        <span class="bianqian">地&nbsp;&nbsp;&nbsp;&nbsp;址：</span><input name="address" class="id" value="<?php echo $contactrow[2];?>" type="text"><br>
                        <span class="bianqian">办公室电话：</span><input name="workphone" class="id"  value="<?php echo $contactrow[3];?>" type="text"><br>
                    </div>
                </div>
                <!--工作信息块-->
                <div>
                </div>
            </div>
            <div class="but">
                <input class="button1" type="submit" value="提 交"><input class="button2" type="reset" value="取 消">
            </div>
        </form>
    </div>
</body>
</html>