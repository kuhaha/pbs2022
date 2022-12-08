<?php
require_once('db_inc.php');
$id = $_POST['id'];
$ad = $_POST['advice'] ;
$sql="UPDATE tbl_progress SET advice='{$ad}',`read`=now() WHERE id=$id";
//echo $sql;
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
echo "<h3>登録しました。</h3>";
?>