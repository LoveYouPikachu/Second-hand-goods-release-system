<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE);
 include("conn/conn.php");
 $url="type-add.php"; 
 $id=$_POST[typeid];
 $name=$_POST[typename];
 $showtime=date("Y-m-d");
 mysql_query("insert into lttype (id,name,addtime) values ('$id','$name','$showtime')",$conn);
 /*echo "<script>alert('用户添加成功!');history.back();</script>";*/
 echo '<script>alert("提交成功！");location.href="'.$url.'"</script>'; 