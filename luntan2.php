<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE); 
   session_start();
    if($_SESSION[username] == ""){
      echo "<script>alert('您还没有登录,请先登录!');window.location.href='userlogin.php';</script>";
      exit;
   }
   include("conn/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新疆大学二手发布平台</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="./css/font.css">
<link rel="stylesheet" href="./css/xadmin.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="./js/xadmin.js"></script>
<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "top_nav", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

</head>

<body>

<div id="templatemo_body_wrapper">
<div id="templatemo_wrapper">

	<div id="templatemo_header">
        <div id="site_title"><h1><a href="#">新疆大学二手发布平台</a></h1></div>
        <div style="left: 600px; position: absolute; top: 90px;">
            <p><a href="#">用 户 名:&nbsp;&nbsp;<?php echo $_SESSION[username]; ?></a> </p>
        </div>
        <div class="cleaner"></div>
    </div> 
    
    <div id="templatemo_menubar">
    	<div id="top_nav" class="ddsmoothmenu">
            <ul>
                <li><a href="index.php" class="selected">首页</a></li>
                <li><a href="fabu.php">发布闲置</a></li>
                <li><a href="mygoods.php">我的闲置</a></li>
                <li><a href="luntan.php">闲置求购</a></li>
                <li><a href="shoppingcart.php">购物车</a></li>
                <li><a href="myinfo.php">我的消息</a></li>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of ddsmoothmenu -->
        <div id="templatemo_search">
            <form action="luntan2.php" method="post">
              <input type="text"  name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
              <input type="submit" name="Search" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
            </form>
        </div>
    </div> 
    
    <div id="templatemo_main">
        <button class="layui-btn" onclick="x_admin_show('发布求购信息','./luntan-add.php',800,600)"><i class="layui-icon"></i>发布求购信息</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="myluntan.php">我的求购</a><br>

    <hr>
                <table class="table table-bordered" align="center">
                    <tbody>
                    <?php
                    $sql2=mysql_query("select * from luntan where title like '%$_POST[keyword]%' or content like '%$_POST[keyword]%'",$conn);
                    while($info=mysql_fetch_array($sql2))
                    {
                        ?>
                        <tr>
                            <td width="10%"> </td>
                            <td width="10%"><?php echo $info[school];?><hr></td>
                            <td width="10%"> </td>
                            <td width="10%"> </td>
                            <td width="30%"><a title="查看"  onclick="x_admin_show('查看','luntandetail.php?id=<?php echo $info[id];?>',600,400)" href="javascript:;"><?php echo $info[title];?><hr></a></td>
                            <td width="10%"><?php echo $info[uname];?><hr></td>
                            <td width="10%"><a title="查看"  onclick="x_admin_show('查看','luntandetail.php?id=<?php echo $info[id];?>',600,400)" href="javascript:;">详情<hr></td>
                            <td width="10%"><a title="have"  onclick="x_admin_show('have','have.php?id=<?php echo $info[id];?>',600,400)" href="javascript:;">我有此闲置<hr></td>
                        </tr> <?php } ?>
                    </tbody>
                </table>

</div> 

</body>
</html>