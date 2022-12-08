<?php
//print_r($_POST);
require_once('db_inc.php');

if (isset($_POST['act'])){
	$act = $_POST['act'];
	$sid = $_POST['sid'];
	$title = $_POST['title'] ;
	$time1 = $_POST['time1'] ;
	$time2 = $_POST['time2'] ;
	// 新規・編集($act)による場合分けでSQL文を作成
	$sql="INSERT INTO tbl_program(sid,title,time1,time2) VALUES('{$sid}',{$title},'{$time1}','{$time2}')";
	if ($act=='update'){
		$sql = "UPDATE tbl_program SET title='{$title}',time1='{$time1}',time2='{$time2}' WHERE sid='{$sid}'";
	}
	//echo $sql;
	// データベースへ問合せのSQL($sql)を実行する・・・
	$rs = $conn->query($sql);
	if (!$rs) die('エラー: ' . $conn->error);

}
?>

<h3>登録しました</h3><br>

