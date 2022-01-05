<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(E_ALL || ~E_NOTICE);
include("conn/conn.php");
 $url="luntanlist.php"; 
$info_del=mysql_query("delete from luntan where id=$_GET[id]");
if($info_del){
    echo '<script>alert("删除成功！");location.href="'.$url.'"</script>'; 
}
?>