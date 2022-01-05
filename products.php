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
            <form action="search.php" method="post">
              <input type="text" value=" " name="keyword" id="keyword" title="keyword" onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
              <input type="submit" name="Search" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
            </form>
        </div>
    </div> <!-- END of templatemo_menubar -->
    
    <div id="templatemo_main">
        <div id="sidebar" class="float_l">
            <div class="sidebar_box"><span class="bottom"></span>
                <h3>分类浏览</h3>   
                <div class="content"> 
                    <ul class="sidebar_list">
                    <?php
                      $sql=mysql_query("select * from type",$conn);
                        while($info=mysql_fetch_array($sql))
                      {
                        ?>
                        <li><a href="products.php?name=<?php echo $info[name];?>"><?php echo $info[name]; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="sidebar_box"><span class="bottom"></span>
                <h3>紧急出售 </h3>   
                 <div class="content"> 
                    <?php
                    $sql=mysql_query("select * from shangpin where hurry='是' order by id desc limit 0,7",$conn);
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
                        <p><a href="productdetail.php?title=<?php echo $info[title];?>"><?php echo $info[title];?></a><p>
                        <p class="price">$<?php echo $info[price];?></p>
                        <div class="cleaner"></div>
                    </div> <?php } ?>
                </div>
            </div>
        </div>
        <div id="content" class="float_r">
        	<h2> 商品列表</h2>
            <?php
            $sql2=mysql_query("select * from shangpin where type='".$_GET[name]."'",$conn);
                    while($info=mysql_fetch_array($sql2))
                    {
                        ?>
            <div class="product_box">
	            <h3><?php echo $info[title];?></h3>
            	 <a href="productdetail.php?title=<?php echo $info[title];?>"><img src="<?php echo $info[tupian];?>" width="200px" height="150px" alt="Shoes 1" /></a>
                <p><?php echo $info[uname];?></p>
                <p><?php echo $info[school];?></p>
                <p class="product_price">$ <?php echo $info[price];?></p>
                <a href="productdetail.php?title=<?php echo $info[title];?>" class="detail"></a> 
                <a href="addcart.php?title=<?php echo $info[title];?>" class="addtocart"></a> 
            </div> <?php } ?> 	
             
        </div> 
        <div class="cleaner"></div>
    </div> <!-- END of templatemo_main -->
    
    <div id="templatemo_footer">
    	<p><a href="#">Home</a> | <a href="#">Products</a> | <a href="#">About</a> | <a href="#">FAQs</a> | <a href="#">Checkout</a> | <a href="#">Contact Us</a>
		</p>


    	Copyright © 2072 <a href="#">Your Company Name</a> <!-- Credit: www.templatemo.com -->
    </div> <!-- END of templatemo_footer -->
    
</div> <!-- END of templatemo_wrapper -->
</div> <!-- END of templatemo_body_wrapper -->

</body>
</html>