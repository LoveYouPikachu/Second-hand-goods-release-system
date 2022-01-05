<?php
	$conn = mysql_connect("localhost","root","root") or die("数据库连接失败".mysql_error());
	mysql_select_db("db_buy",$conn) or die ("数据库选择失败".mysql_error());
	mysql_query("set character set utf8");
    mysql_query("set names utf8");
?>