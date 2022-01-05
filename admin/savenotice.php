<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE);
 include("conn/conn.php");
 $url="notice-add.php"; 
 $title=$_POST[title];
 $content=$_POST[content];
 $showtime=date("Y-m-d");
 mysql_query("insert into notice (title,content,addtime) values ('$title','$content','$showtime')",$conn);
 /*echo "<script>alert('用户添加成功!');history.back();</script>";*/
 echo '<script>alert("通知添加成功！");location.href="'.$url.'"</script>'; 