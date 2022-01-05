<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE);
 include("conn/conn.php");
 $name=$_POST[name];
 mysql_query("insert into type (name) values ('$name')",$conn);
 echo "<script>alert('商品类型添加成功!');window.location.href='addgoodtype.php';</script>";
?>