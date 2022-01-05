<span style="font-family: 'Microsoft YaHei'; font-size: 16px;"><?php
  session_start();
  
  $tel = $_POST['tel'];
  $ver = trim($_POST['verify']);
  
  if ( $ver == $_POST['test']) {
    echo "<script>alert('验证成功!点击跳转');window.location='regester2.php';</script>";
  } else {
    echo "<script language='javascript'>alert('验证失败');history.back();</script>";
    exit;
  }
  //
 ?>
</span>
 