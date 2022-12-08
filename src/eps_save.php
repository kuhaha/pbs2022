<?php
require_once('db_inc.php');
$uid = $_SESSION['uid']; //ログイン中のユーザのIDを取得
$sid = strtoupper($uid); //学籍番号（ユーザIDの大文字変換）を求める

if (isset($_POST['act'])){
  $act = $_POST['act'];
  $pid = $_POST['pid'];
  $reason = $_POST['reason'] ;
  $sql="INSERT INTO tbl_wish VALUES('{$sid}',{$pid},'{$reason}',now())";
  if ($act=='update'){
    $sql = "UPDATE tbl_wish SET pid={$pid},reason='{$reason}',answered=now() WHERE sid='{$sid}'";
  }
  $rs = $conn->query($sql);
  if (!$rs) die('エラー: ' . $conn->error);

}
?>
<h3>登録しました</h3>