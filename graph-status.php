<?php
    include 'connection.php';
    $sql = 'select pstatus, count(pid) from projectinfo group by pstatus';
    $array_status = array();
    $array_num = array();
    $res = mysqli_query($link , $sql);
    for($i = 0 ; $i< mysqli_num_rows($res) ; $i++){
        $row = mysqli_fetch_array($res);
        $array_status[$i] = $row[0];//存状态
        $array_num[$i] = $row[1];//存数据
    }

    //画图
require_once ('Jpgraph/src/jpgraph.php');
require_once ('Jpgraph/src/jpgraph_bar.php');
require_once ('jpgraph/src/jpgraph_line.php');
require_once ('Jpgraph/src/jpgraph_pie.php');
require_once ('Jpgraph/src/jpgraph_pie3d.php');
$num = $array_num;    //设置统计数据
$graph = new PieGraph(500, 350);
$graph->SetShadow();
$graph->title->Set(iconv_arr(iconv('utf-8','gb2312','项目状态')));
$graph->title->SetFont(FF_SIMSUN, FS_BOLD);

$pieplot = new PiePlot3D($num);   //创建3D饼图对象
$pieplot->SetCenter(0.5, 0.5);
$department = $array_status;//设置文字框对应的内容
$pieplot->SetLegends($department);
$graph->legend->SetFont(FF_SIMSUN, FS_BOLD);//设置字体
$graph->legend->SetLayout(LEGEND_HOR);
$graph->legend->Pos(0.5, 0.98, 'center', 'bottom');//图例文字框的位置
$graph->Add($pieplot);//将3D饼图添加到统计图对象中
$graph->Stroke();//输出图像
function iconv_arr($data)
{
    if (is_array($data)) {
        foreach ($data as $k => $v) {
            $data[$k] = iconv_arr($v);
        }
    } else {
        $data = mb_convert_encoding($data, "utf-8", "gb2312");
    }
    return $data;
}