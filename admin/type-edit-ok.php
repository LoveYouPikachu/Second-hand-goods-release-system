<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE);
include("conn/conn.php");

$typeid=$_POST[typeid];
$name=$_POST[name];
$showtime=date("Y-m-d");
$id=$_POST[id];

mysql_query("update type set typeid='$typeid',name='$name',time='$showtime' where id = '$id'",$conn);
echo "<script>alert('修改成功');window.location.href='type-edit.php';</script>";
?>