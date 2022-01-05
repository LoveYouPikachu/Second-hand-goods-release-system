<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE);
 include("conn/conn.php");
 $url="goodlist.php"; 
 mysql_query("update shangpin set agree=1 where agree=0 and id=$_GET[id]",$conn);
 /*echo "<script>alert('用户添加成功!');history.back();</script>";*/
 echo '<script>alert("设置成功！");location.href="'.$url.'"</script>'; 