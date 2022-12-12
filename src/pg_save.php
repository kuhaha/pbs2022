<?php
//print_r($_POST);
require_once('db_inc.php');

$sid = $_POST['sid'];
$title = $_POST['title'] ;
$time1 = $_POST['time1'] ;
$time2 = $_POST['time2'] ;
$sql="REPLACE INTO tbl_program(sid,title,time1,time2) VALUES('$sid','$title','$time1','$time2')";
// echo $sql;
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
else{
	header("Location:?do=pg_list");
}
?>


