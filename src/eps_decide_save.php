<?php
require_once('db_inc.php');

$decided = $_POST["decided"];
$sid = $_POST["sid"];
$sql = "UPDATE tbl_student SET decided='{$decided}' WHERE sid='{$sid}'";
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);

header('Location:?do=eps_list');
exit();

?>