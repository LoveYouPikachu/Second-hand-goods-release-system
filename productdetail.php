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

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="./css/font.css">
<link rel="stylesheet" href="./css/xadmin.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
<script type="text/javascript" src="./js/xadmin.js"></script>

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
<script type="text/javascript" src="js/jquery-1-4-2.min.js"></script> 
<link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="js/slimbox2.js"></script> 
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
            <form action="#" method="get">
              <input type="text" value=" " name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
              <input type="submit" name="Search" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
            </form>
        </div>
    </div> <!-- END of templatemo_menubar -->
    
    <div id="templatemo_main">
    	<div id="sidebar" class="float_l">
            <div class="sidebar_box"><span class="bottom"></span>
            	<h3>紧急出售 </h3>   
                <div class="content"> 
                	<?php
                    $sql=mysql_query("select * from shangpin where hurry='是' order by id desc limit 0,5",$conn);
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
                    <div class="bs_box">
                        <a href="#"><img src="<?php echo $info[tupian];?>" width="58px" height="58px" alt="image" /></a>
                        <?php } ?>
                         <p class="product_price"><?php echo $info[title];?></p>
                        <p class="product_price">$ <?php echo $info[price];?></p>
                        <p><a href="productdetail.php?title=<?php echo $info[title];?>" class="detail"></a> <p>
                        <div class="cleaner"></div>
                    </div> <?php } ?>
                </div>
            </div>
        </div>
        <div id="content" class="float_r">
        	<h2>商品详情</h2>
            <hr>
            <?php
                    $sql2=mysql_query("select * from shangpin where title='".$_GET[title]."'",$conn);
                    while($info=mysql_fetch_array($sql2))
                    {
                        ?>
            <div class="content_half float_l">
        	<a  rel="lightbox[portfolio]" href="<?php echo $info[tupian]; ?>"><img src="<?php echo $info[tupian]; ?>" alt="image" width="320px" height="260px"/></a>
            </div> <?php } ?>
            <div class="content_half float_r">
                <table>
                <?php
                    $sql2=mysql_query("select * from shangpin where title='".$_GET[title]."'",$conn);
                    while($info=mysql_fetch_array($sql2))
                    {
                        ?>
                    <tr>
                        <td width="200px">标题:&nbsp;&nbsp;<?php echo $info[title]; ?><br><br></td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td width="200px">学校:&nbsp;&nbsp;<?php echo $info[school]; ?><br><br></td>
                    </tr>
                    <tr>
                        <td width="160">价格:&nbsp;&nbsp;$<?php echo $info[price]; ?><br><br></td>
                    </tr>
                    <tr>
                        <td width="200px">发布时间:&nbsp;&nbsp;<?php echo $info[addtime];?><br><br></td>
                    </tr>
                    <tr>
                        <td width="200px">发布者:&nbsp;&nbsp;<?php echo $info[uname];?><br><br></td>
                    </tr>
                    <tr>
                        <td width="200px">联系方式:&nbsp;&nbsp;<?php echo $info[uphone];?><br><br></td>
                    </tr>
                    <tr>
                    <?php } ?>
                </table>
                <div class="cleaner h20"></div>
                    <?php
                    $sql2=mysql_query("select * from shangpin where title='".$_GET[title]."'",$conn);
                    while($info=mysql_fetch_array($sql2))
                    {
                        ?>
                <a href="addcart.php?title=<?php echo $_GET[title];?>" class="addtocart"></a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a title="have"  onclick="x_admin_show('have','have2.php?id=<?php echo $info[id];?>',600,400)" href="javascript:;">我有意向</a> <?php } ?>
			</div>
            <div class="cleaner h30"></div>
            
            <h3>描述<br></h3>
            <?php
                    $sql2=mysql_query("select * from shangpin where title='".$_GET[title]."' order by id desc limit 0,6",$conn);
                    while($info=mysql_fetch_array($sql2))
                    {
                        ?>
            <p><?php echo $info[content]; ?></p>	<?php } ?>
            
          <div class="cleaner h50"></div>
            
            <h3>推荐商品</h3>
            <?php
                    $sql2=mysql_query("select * from shangpin where tuijian='1' order by id desc limit 0,3",$conn);
                    while($info=mysql_fetch_array($sql2))
                    {
                        ?>
        	<div class="product_box">
            	<a href="productdetail.html"><img src="<?php echo $info[tupian]; ?>" alt="" width="120px" height="120px"/></a>
                <h3><?php echo $info[title]; ?></h3>
                <p class="product_price">$<?php echo $info[price]; ?></p>
                <a href="productdetail.php?title=<?php echo $info[title];?>" class="detail"></a> 
                <a href="addcart.php?title=<?php echo $info[title];?>" class="addtocart"></a> 
            </div>    <?php } ?>    	
            
                    <form method="post" action="savereply.php">
                        <table>
                        <?php
                    $sql2=mysql_query("select * from reply where sname='".$_GET[title]."'",$conn);
                    while($info=mysql_fetch_array($sql2))
                    {
                        ?>
                            <tr>
                                <td>用户回复列表：<hr><br></td>
                            </tr> 
                            <tr>
                                <td width="100px"><?php echo $info[uname];?>:&nbsp;&nbsp;&nbsp;<?php echo $info[content];?><br><br></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr><?php } ?>
                           
                        </table>
                        <input type="hidden" name="sname" value="<?php echo $_GET[title];?>">
                        <input type="hidden" name="type" value="sreply">
                        <input type="hidden" name="uname" value="<?php echo $_SESSION[username]?>"

                    </form>    
            </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
    <div id="templatemo_footer">
        

        Copyright © 2020 <a href="#">新疆大学 计信学院 尹杰</a> 
        
    </div> <!-- END of templatemo_footer -->
    
</div> 
</div> 

</body>
</html>