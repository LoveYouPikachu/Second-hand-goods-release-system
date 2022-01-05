<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE);
 include("conn/conn.php");
 $url="goodlist.php"; 
 mysql_query("update shangpin set tuijian=0 where  id=$_GET[id]",$conn);
 /*echo "<script>alert('用户添加成功!');history.back();</script>";*/
 echo '<script>alert("设置成功！");location.href="'.$url.'"</script>'; 
 // tuijian=0 and