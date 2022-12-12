<?php
require_once('db_inc.php');
if (isset($_POST['act'])){
  $act = $_POST['act'];
  if ($_POST['pass1']===$_POST['pass2']){
    $uid = $_POST['uid'];
    $uname = $_POST['uname'];
    $upass = $_POST['pass1'];
    $urole = $_POST['urole'];
    $sql ="INSERT INTO tbl_user VALUES ('{$uid}','{$uname}','{$upass}',$urole)";
    if ($act=='update'){
      $sql = "UPDATE tbl_user SET uname='{$uname}',upass='{$upass}',urole={$urole} WHERE uid='{$uid}'";
    }
    $rs = $conn->query($sql);
    if (!$rs) die('エラー: ' . $conn->error);
    echo '<h3>アカウントが更新されました</h3>';
  }else{
    echo '<h3>エラー：パスワードが一致しないので登録できません</h3>';
  }
}
?>
