<?php
    session_start();
    $uid = $_SESSION['uid'];
    $pid = $_POST['pid'];
    $ntype = $_POST['ntype'];
    include  'connection.php';
    //文件数组，存储传过来上传的文件指针
    $fileArray = $_FILES['aboutfile'];//$_FILES[aboutfle]是一个数组，里面的元素是文件，获得名为ff 的div中的文件
   // echo $fileArray['tmp_name'][0];第一个文件的临时文件路径D:\wamp\tmp\php7BA2.tmp
   //echo $fileArray['name'][0];文件本身名字
    //根据上传类型设置上传的路径
    $path = '';
    if($ntype == '技术文档')
        $path = './upload/jx';
    else if($ntype == '团队文档')
        $path = './upload/team';
    else if($ntype == '项目文档' && $pid != 0)//$pid是select的名字
        $path = './upload/xm/'.$pid;
    else
        echo "<script language=javascript>alert('请选择上传文件类型！');history.back();</script>";
    //循环处理上传文件
    for($i=0 ; $i<count($fileArray['name']) ; $i++){
        //判断文件上传是否有错误
        if($fileArray['error'][$i]>0)//如果文件上传错误，error值大于零
        {
            switch ($fileArray['error'][$i]){//error值是switch判断条件
                case 1:
                    $err_info = '上传文件大小超过服务器预设值大小！';
                    break;
                case 2:
                    $err_info="上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值";
                    break;
                case 3:
                    $err_info="文件只有部分被上传";
                    break;
                case 4:
                    $err_info="没有文件被上传";
                    break;
                case 6:
                    $err_info="找不到临时文件夹";//文件上传到apache的临时文件夹
                    break;
                case 7:
                    $err_info="文件写入失败";//把文件的内容从内存写到硬盘里，断电内存清空
                    break;
                default:
                    $err_info="未知的上传错误";
                    break;//跳出循环也不执行后面的代码，返回到for循环，进行下一次遍历
            }
            continue;//跳到for循环
        }
      //过滤文件大小
        if($fileArray['size'][$i]>2*1024*1024){//1024字节（byte）=1kb,1024kb=1M,1024M=1G
            continue;
        }
        //处理文件名称,返回上传文件的名称-->PATHINFO_BASENAME参数返回文件的真实名字
        $docname ='';
        do{
            $docname = rand(1,10).'_'.pathinfo($fileArray['name'][$i],PATHINFO_BASENAME);//pathinfo以数组的形式返回文件的文件名，（文件名）
            $docname = iconv('utf-8','GBK',$docname);//转换字符编码，防止上传出现乱码问题，文件上传使用GBK编码
        }while(file_exists($path.'/'.$docname));//先执行后循环，条件不符就跳出
        //上传文件
        if(is_uploaded_file($fileArray['tmp_name'][$i])){
            if(move_uploaded_file($fileArray['tmp_name'][$i],$path.'/'.$docname)){//将临时文件移动到目标目录下
                //插入数据
                $docname = iconv('GBK','utf-8',$docname);//转换字符编码，防止插入数据库出现乱码问题，插入数据使用utf-8编码
                if($ntype == '项目文档'){
                    //在source表插入数据
                    $sql_insert = 'insert into source(uid , pid , sname , stype , stime) values("'.$uid.'","'.$pid.'","'.$docname.'","'.$ntype.'","'.date('Y-m-d H:m:s').'")';
                    if(mysqli_query($link , $sql_insert)){
                             //更新projectinfo表的项目进度
                            $sql_proinfo = 'select pid , worktask from work where uid = "'.$uid.'" and pid = "'.$pid.'"';//查出登录人所在项目负责的任务，只有负责该项目指定任务的人（账号）才能上传相关文档，修改项目进度。
                            $res_proinfo = mysqli_query($link , $sql_proinfo);
                            if(mysqli_num_rows($res_proinfo) == 0)
                            {
                                echo '<script>alert("在该项目中未承担任务，无法上传");history.back();</script>';
                                exit();
                            }
                            $sql_jindu = 'select pschedule from projectinfo where pid = "'.$pid.'"';
                            $res_jindu = mysqli_query($link , $sql_jindu);
                            $row_jindu = mysqli_fetch_array($res_jindu);
                            while( $row_proinfo = mysqli_fetch_array($res_proinfo)){//同一个人在一个项目里有多个任务，他可以加入多个项目。
                                if($row_proinfo[1] == '需求分析' && $row_jindu[0] == 0){
                                    $sql = 'update projectinfo set pschedule = 25 where pid = "'.$pid.'"';
                                    $res = mysqli_query($link , $sql);
                                    if(mysqli_affected_rows($link) == 1){
                                        //更新work表的任务状态
                                        $sql_renwu = 'update work set workstatus="end" where uid = "'.$uid.'" and pid = "'.$pid.'" and worktask = "需求分析"';
                                        if(mysqli_query($link , $sql_renwu)){
                                            echo '<script>alert("文件'.($i+1).'上传成功,工作完成,项目进度更新成功");history.back();</script>';
                                        }else
                                            echo '<script>alert("文件'.($i+1).'上传成功,工工作任务状态更新失败,项目进度更新成功");history.back();</script>';
                                    }else
                                        echo '<script>alert("文件'.($i+1).'上传成功,项目进度更新失败");history.back();</script>';
                                }else if($row_proinfo[1] == '系统设计' && $row_jindu[0] == 25){
                                    $sql = 'update projectinfo set pschedule = 50 where pid = "'.$pid.'"';
                                    $res = mysqli_query($link , $sql);
                                    if(mysqli_affected_rows($link) == 1){
                                        //更新work表的任务状态
                                        $sql_renwu = 'update work set workstatus="end" where uid = "'.$uid.'" and pid = "'.$pid.'" and worktask = "系统设计"';
                                        if(mysqli_query($link , $sql_renwu)){
                                            echo '<script>alert("文件'.($i+1).'上传成功,工作完成,项目进度更新成功");history.back();</script>';
                                        }else
                                            echo '<script>alert("文件'.($i+1).'上传成功,工作任务状态更新失败,项目进度更新成功");history.back();</script>';
                                    }else
                                        echo '<script>alert("文件'.($i+1).'上传成功,项目进度更新失败");history.back();</script>';
                                }else if($row_proinfo[1] == '编码实现' && $row_jindu[0] == 50){
                                    $sql = 'update projectinfo set pschedule = 80 where pid = "'.$pid.'"';
                                    $res = mysqli_query($link , $sql);
                                    if(mysqli_affected_rows($link) == 1){
                                        //更新work表的任务状态
                                        $sql_renwu = 'update work set workstatus="end" where uid = "'.$uid.'" and pid = "'.$pid.'" and worktask = "编码实现"';
                                        if(mysqli_query($link , $sql_renwu)){
                                            echo '<script>alert("文件'.($i+1).'上传成功,工作完成,项目进度更新成功");history.back();</script>';
                                        }else
                                            echo '<script>alert("文件'.($i+1).'上传成功,工作任务状态更新失败,项目进度更新成功");history.back();</script>';
                                    }else
                                        echo '<script>alert("文件'.($i+1).'上传成功,项目进度更新失败");history.back();</script>';
                                }else if($row_proinfo[1] == '系统测试' && $row_jindu[0] == 80){
                                    $sql = 'update projectinfo set pschedule = 100 where pid = "'.$pid.'"';
                                    $res = mysqli_query($link , $sql);
                                    if(mysqli_affected_rows($link) == 1){
                                        //更新work表的任务状态
                                        $sql_renwu = 'update work set workstatus="end" where uid = "'.$uid.'" and pid = "'.$pid.'" and worktask = "系统测试"';
                                        if(mysqli_query($link , $sql_renwu)){
                                            echo '<script>alert("文件'.($i+1).'上传成功,工作完成,项目进度更新成功");history.back();</script>';
                                        }else
                                            echo '<script>alert("文件'.($i+1).'上传成功,工作任务状态更新失败,项目进度更新成功");history.back();</script>';
                                    }else
                                        echo '<script>alert("文件'.($i+1).'上传成功,项目进度更新失败");history.back();</script>';
                                }else{
                                    echo '<script>alert("文件'.($i+1).'上传成功,但项目进度未到该阶段，未更新项目进度信息");history.back();</script>';
                                }//更新项目进度，必须是负责该项目具体任务阶段的人上传文档（指定work中的人），（项目运行阶段类型与文档类型对应），（人上传文档类型与其负责的任务阶段对应）,更新source表、work表、projectinfo表之间没有顺序。
                            }
                    }else{
                        echo '<script>alert("文件'.($i+1).'插入失败");history.back();</script>';//$i是文件数组的下标，判断第几个文件上传失败
                    }
                }else{
                    //是技术文档或者是团队文档，直接插入source表
                    $sql_insert = 'insert into source(uid , sname , stype , stime) values("'.$uid.'","'.$docname.'","'.$ntype.'","'.date('Y-m-d H:m:s').'")';
                    mysqli_query($link , $sql_insert);
                    if(mysqli_affected_rows($link)>0)
                        echo '<script>alert("上传记录'.($i+1).'上传成功");history.back();</script>';
                    else
                        echo '<script>alert("上传记录'.($i+1).'插入失败");history.back();</script>';
                }
            }else{
                echo '<script>alert("文件'.($i+1).'上传失败");history.back();</script>';
            }
        }else{
            echo '<script>alert("文件'.($i+1).'不是上传类型的文档");history.back();</script>';//不是上传类型的文档
        }
    }
