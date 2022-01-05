<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE); 
   session_start();
 include("conn/conn.php");
 $url="shoppingcart.php"; 
 $name="$_GET[title]";
 $usname="$_SESSION[username]";
 mysql_query("insert into scart (title,uname)values ('$name','$usname') ",$conn);
 /*echo "<script>alert('用户添加成功!');history.back();</script>";*/
 echo '<script>alert("添加收藏成功！");location.href="'.$url.'"</script>'; 