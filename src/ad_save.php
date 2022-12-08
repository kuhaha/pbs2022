<?php
require_once('db_inc.php');
$uid=$_SESSION['uid'];
$sid = strtoupper(substr($uid,1,7));
$id = $_POST['id'];
$r = $_POST['reason'] ;
$a = $_POST['achievement'] ;

//print_r($_POST);
$sid=strtoupper(substr($uid,1));
//echo $sid;

$sql="INSERT INTO tbl_progress(sid,schedule_id,achievement,reason,report_date) VALUES('{$sid}',{$id},'{$a}','{$r}',curdate())";
//echo $sql;
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
echo "<h3>登録しました。</h3>";
?>