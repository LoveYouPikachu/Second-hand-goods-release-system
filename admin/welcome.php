<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE); 
   session_start();
   include("conn/conn.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>首页</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
    </head>
    <body>
        <div class="x-body">
            <blockquote class="layui-elem-quote">欢迎使用校园闲置物品交易平台管理系统</blockquote>
            <fieldset class="layui-elem-field">
              <legend>后台信息统计</legend>
              <div class="layui-field-box">
                <table class="layui-table" lay-even>
                    <thead>
                        <tr>
                            <th>统计</th>
                            <th>商品数量</th>
                            <th>用户数量</th>
                            <th>学校</th>
                            <th>类别</th>
                            <th>管理员</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>总数</td>
                            <?php 
                                $result=mysql_query("select count(*) as max from shangpin");
                                $re = mysql_fetch_object($result);
                                $max = $re->max; 
                            ?>
                            <td><?php echo "$max";?></td>
                            <?php 
                                $result=mysql_query("select count(*) as max from user");
                                $re = mysql_fetch_object($result);
                                $max = $re->max; 
                            ?>
                            <td><?php echo "$max";?></td>
                            <?php 
                                $result=mysql_query("select count(*) as max from school");
                                $re = mysql_fetch_object($result);
                                $max = $re->max; 
                            ?>
                            <td><?php echo "$max";?></td>
                            <?php 
                                $result=mysql_query("select count(*) as max from type");
                                $re = mysql_fetch_object($result);
                                $max = $re->max; 
                            ?>
                            <td><?php echo "$max";?></td>
                            <?php 
                                $result=mysql_query("select count(*) as max from manager");
                                $re = mysql_fetch_object($result);
                                $max = $re->max; 
                            ?>
                            <td><?php echo "$max";?></td>
                        </tr>
                        <tr>
                            <td>今日</td>
                            <?php 
                                $showtime=date("Y-m-d");
                                $result1=mysql_query("select count(id) as max1 from shangpin where addtime = '$showtime'");
                                $re1 = mysql_fetch_object($result1);
                                $max1 = $re1->max1;?>
                            <td><?php echo "$max1";?></td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>昨日</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                    </tbody>
                </table>
                <table class="layui-table">
                <thead>
                    <tr>
                        <th colspan="2" scope="col">服务器信息</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th width="30%">服务器计算机名</th>
                        <td><span id="lbServerName">http://127.0.0.1/</span></td>
                    </tr>
                    <tr>
                        <td>服务器IP地址</td>
                        <td>192.168.1.1</td>
                    </tr>
                    <tr>
                        <td>服务器域名</td>
                        <td>暂无</td>
                    </tr>
                    <tr>
                        <td>服务器端口 </td>
                        <td>8080</td>
                    </tr>
                    <tr>
                        <td>服务器IIS版本 </td>
                        <td>Microsoft-IIS/6.0</td>
                    </tr>
                    <tr>
                        <td>本文件所在文件夹 </td>
                        <td>D:\WebSite\HanXiPuTai.com\XinYiCMS.Web\</td>
                    </tr>
                    <tr>
                        <td>服务器操作系统 </td>
                        <td>Microsoft Windows NT 5.2.3790 Service Pack 2</td>
                    </tr>
                    <tr>
                        <td>系统所在文件夹 </td>
                        <td>C:\WINDOWS\system32</td>
                    </tr>
                    <tr>
                        <td>服务器的语言种类 </td>
                        <td>Chinese (People's Republic of China)</td>
                    </tr>
                    <tr>
                        <td>.NET Framework 版本 </td>
                        <td>2.050727.3655</td>
                    </tr>
                </tbody>
            </table>
              </div>
            </fieldset>  
        </div>
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