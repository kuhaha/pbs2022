<h2>グループ登録・変更画面</h2>
<?php

require_once('db_inc.php');
$uid = $_SESSION['uid']; //ログイン中のユーザのIDを取得

$where = "1";
if (isset($_GET['gid'])){
	$where = "gid=".$_GET['gid'];
}

$sql = "SELECT * FROM tbl_lab NATURAL JOIN tbl_program NATURAL JOIN tbl_labgroup NATURAL JOIN tbl_group  WHERE ".$where;
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
$row= $rs->fetch_assoc();
echo '<table border=1>';
echo '<tr><th>研究室</th><th>グループ名</th><th>ボタン</th></tr>';
while ($row) {
	echo '<tr>';
	echo '<td>' . $row['labname'] . '</td>';
	echo '<td>' . $row['gname']. '</td>';
	echo '<td>' .'<button><a href="?do=eps_group_grade&labid=' . $row['labid'] . '">編集</a></button></td>';
	echo '</tr>';
	$row= $rs->fetch_assoc();
}
echo '</table>';
?>