<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>系统统计</title>
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />

        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
    </head>
    <body>
        <div class="x-body">
            <!-- 为 ECharts 准备一个具备大小（宽高）的 DOM -->
            <div id="main" style="width: 100%;height:400px;"></div>
        </div>
        <script src="//cdn.bootcss.com/echarts/3.3.2/echarts.min.js" charset="utf-8"></script>
        <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));
        // 指定图表的配置项和数据
        <?php $showtime=date("Y-m-d H:i:s"); ?>
        var option = {
            title: {
                text: '折线图堆叠'
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data:['用户','商品','闲置求购','通知','类别']
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: ['<?php echo $q6=date("Y-m-d",time()-518400); ?>','<?php echo $q5=date("Y-m-d",time()-432000); ?>','<?php echo $q4=date("Y-m-d",time()-345600); ?>','<?php echo $q3=date("Y-m-d",time()-259200); ?>','<?php echo $q2=date("Y-m-d",time()-172800); ?>','<?php echo $q1=date("Y-m-d",time()-86400); ?>','<?php echo $showtime=date("Y-m-d"); ?>']
            },
            yAxis: {
                type: 'value'
            },
            series: [
                {
                    name:'用户',
                    type:'line',
                    stack: '总量',
                    data:[120, 132, 101, 134, 90, 230, 210]
                },
                {
                    name:'商品',
                    type:'line',
                    stack: '总量',
                    data:[220, 182, 191, 234, 290, 330, 310]
                },
                {
                    name:'闲置求购',
                    type:'line',
                    stack: '总量',
                    data:[150, 232, 201, 154, 190, 330, 410]
                },
                {
                    name:'通知',
                    type:'line',
                    stack: '总量',
                    data:[320, 332, 301, 334, 390, 330, 320]
                },
                {
                    name:'类别',
                    type:'line',
                    stack: '总量',
                    data:[820, 932, 901, 934, 1290, 1330, 1320]
                }
            ]
        };

        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    </script>
    <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
        </script>
    </body>
</html>

<!-- 这里是统计数据库的语句，目前是数量太少所以没有形成动态更新 -->

 <!-- $showtime=date("Y-m-d");
                  $result1=mysql_query("select count(id) as max1 from user where addtime like '%$showtime%'");
                  $re1 = mysql_fetch_object($result1);
                  $max1 = $re1->max1;  -->
                  