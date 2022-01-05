<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE); 
   session_start();
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
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
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
                <li><a href="index.php">首页</a></li>
                <li><a href="fabu.php">发布闲置</a></li>
                <li><a href="mygoods.php">我的闲置</a></li>
                <li><a href="luntan.php">闲置求购</a></li>
                <li><a href="shoppingcart.php" class="selected">我的收藏</a></li>
                <li><a href="myinfo.php">我的消息</a></li>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of ddsmoothmenu -->
        <div id="templatemo_search">
            <form action="#" method="get">
              <input type="text" value=" " name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
              <input type="submit" name="Search" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
            </form>
        </div>
    </div> <!-- END of templatemo_menubar -->
    
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
        	<div class="sidebar_box"><span class="bottom"></span>
                <h3>系统通知</h3>   
                <div class="content"> 
                    <ul class="sidebar_list">
                    <?php
                      $sql=mysql_query("select * from notice",$conn);
                        while($info=mysql_fetch_array($sql))
                      {
                        ?>
                        <li class="first"><a title="have"  onclick="x_admin_show('have','notice.php?id=<?php echo $info[id];?>',600,400)" href="javascript:;"><?php echo $info[title];?></a></li><?php } ?>
                    </ul>
                </div>
            </div>
            
        </div>
        <div id="content" class="float_r">
        	<h2>您当前的位置：我的收藏</h2>
        	<table width="680px" cellspacing="0" cellpadding="5">
                      <tr bgcolor="#ddd">
                            <th width="220" align="center">图片</th> 
                            <th width="180" align="center">标题</th> 
                            <th width="100" align="center">类型</th> 
                            <th width="40" align="center">价格</th> 
                            <th width="100" align="center">联系方式</th> 
                            
                            <th width="90"> </th>
                            
                      </tr>
                      <?php
                    $sql=mysql_query("select * from shangpin where title in (select title from scart where uname='".$_SESSION[username]."')",$conn);
                    while($info=mysql_fetch_array($sql))
                    {
                        ?>
                    <?php
                    if($info[tupian]=="")
                    {
                         echo "暂无图片!";
                    }
                    else
                    {
                        ?>
                        <tr>
                            <td><img src="<?php echo $info[tupian];?>" width="170px" height="135px" /></td> <?php } ?>
                            <td><?php echo $info[title]; ?></td> 
                            <td align="center"><?php echo $info[type]; ?> </td> 
                            <td align="center">$<?php echo $info[price]; ?> </td> 
                            <td align="center"><?php echo $info[uphone]; ?> </td>
                            <td align="center"> <a href="delcart.php?id=<?php echo $info[id];?>"><img src="images/remove_x.gif" alt="remove" /><br />删除</a> </td>
                        </tr><?php } ?>
                    
                    </table>
                    <div style="float:right; width: 215px; margin-top: 20px;">
                    
					<!-- <p><a href="checkout.html">Proceed to checkout</a></p>
                                        <p><a href="javascript:history.back()">Continue shopping</a></p> -->
                    	
                    </div>
			</div>
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
    <div id="templatemo_footer">
        

        Copyright © 2020 <a href="#">新疆大学 计信学院 尹杰</a> 
    	
    </div> <!-- END of templatemo_footer -->
    
</div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper ".$_SESSION[username]."-->
</body>
</html>