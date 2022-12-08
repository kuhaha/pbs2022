<h2>発表情報登録・編集画面</h2>
<?php

require_once('db_inc.php');
$uid = $_SESSION['uid']; 

$where = "1";
if (isset($_GET['gid'])){
	$where = "gid=".$_GET['gid'];
}
$sql = "SELECT * FROM tbl_student NATURAL JOIN tbl_program NATURAL JOIN tbl_labgroup NATURAL JOIN tbl_lab WHERE ".$where;
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);

echo '<table border=1>';
echo '<tr><th>学籍番号</th><th>氏名</th><th>研究室</th><th>ボタン</th></tr>';

//学籍番号(sid)、氏名(sname)、性別(sex)、GPA(gpa)、修得単位数(credit)を一覧表示
$row= $rs->fetch_assoc();

while ($row) {
	echo '<tr>';
	echo '<td>' . $row['sid'] . '</td>';
	$sid = $row['sid'];
	echo '<td>' . $row['sname']. '</td>';
	echo '<td>' . $row['labname']. '</td>';
	echo '<td>' .'<button><a href="?do=pg_edit&sid=' . $sid . '">編集</a></button></td>';

	echo '</tr>';
	$row= $rs->fetch_assoc();
	
}
echo '</table>';

?>

