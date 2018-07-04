<?php // content="text/plain; charset=utf-8"
require_once ('Jpgraph/src/jpgraph.php');
require_once ('Jpgraph/src/jpgraph_bar.php');
include 'connection.php';

//获取项目完成的进度
$sql1 = 'select pschedule from projectinfo where pstatus in ("on","end") order by pid;';
$res1 = mysqli_query($link , $sql1);
//获取项目未完成的进度
$sql2 = 'select 100-pschedule from projectinfo where pstatus in ("on","end") order by pid;';
$res2 = mysqli_query($link , $sql2);
//获取项目列表
$sql3 = 'select pname from projectinfo where pstatus in ("on","end") order by pid;';
$res3 = mysqli_query($link , $sql3);

$data1y = array();
for($i = 0 ; $i < mysqli_num_rows($res1) ; $i++)
    $data1y[$i] = mysqli_fetch_array($res1)[0];

$data2y = array();
for($j = 0 ; $j < mysqli_num_rows($res2) ; $j++)
    $data2y[$j] = mysqli_fetch_array($res2)[0];//把未完成进度变成一个数组

$name = array();
for($k = 0 ; $k < mysqli_num_rows($res3) ; $k++)
    $name[$k] =iconv('utf-8','gb2312',mysqli_fetch_array($res3)[0]) ;//把name变成一个数组

// Create the graph. These two calls are always required
$graph = new Graph(500,350);  //大小 宽*高
$graph->SetScale("textlin"); //设置刻度模式 还有intint、linlin、log、lin、textlog等其他模式

$graph->SetShadow();
$graph->img->SetMargin(60,30,40,80); //设置图表边距，就跟css里margin属性是一样的
// Create the bar plots
$b1plot = new BarPlot($data1y);  //创建新的BarPlot对象 各种不同图表就是通过调用不通对象实现的,BarPlot就是柱状的，还有LinePlot线性图,PiePlot饼状图
$b1plot->SetFillColor("blue"); //设置图的颜色
$b1plot->SetLegend('Finished');
$b1plot->value->Show();          //展示
$b2plot = new BarPlot($data2y);  //一样的
$b2plot->SetFillColor("orange");
$b2plot->SetLegend('Going ON');
$b2plot->value->Show();
// Create the grouped bar plot
$gbplot = new AccBarPlot(array($b1plot,$b2plot)); //开始画图了
$graph->Add($gbplot);  //在统计图上绘制曲线
$graph->title->Set(iconv_arr(iconv('utf-8','gb2312','项目进度展示')));  // 设置图表标题 这里iconv_arr是我自己加的，为了支持我们伟大的中文要把你的当前编码转化为html实体
$graph->xaxis->title->Set(iconv_arr(iconv('utf-8','gb2312','项目'))); //设置X轴标题
$graph->yaxis->title->Set(iconv_arr(iconv('utf-8','gb2312','进度'))); //设置Y轴标题
$graph->title->SetFont(FF_SIMSUN,FS_BOLD);  //设置标题字体，这里字体默认是FF_FONT1，为了中文换成FF_SIMSUN
$graph->yaxis->title->SetFont(FF_SIMSUN,FS_BOLD); //设置y轴标题字体
$graph->xaxis->title->SetFont(FF_SIMSUN,FS_BOLD); //设置x轴标题字体
$graph->xaxis->SetTickLabels(iconv_arr($name));//X轴项目名
$graph->Stroke();  //输出图像
function iconv_arr($data){//中文字符转码
    if(is_array($data)){
        foreach($data as $k=>$v){
            $data[$k] = iconv_arr($v);
        }
    }else{
        $data = mb_convert_encoding($data, "utf-8","gb2312" );
    }
    return $data;
}