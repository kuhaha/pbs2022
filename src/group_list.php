<h2>プログラム確認画面</h2>
<?php

require_once('db_inc.php');
$uid = $_SESSION['uid']; //ログイン中のユーザのIDを取得
$sid = strtoupper($uid); //学生であれば、学籍番号（ユーザIDの大文字変換）を求める
$where = "1";
if (isset($_GET['gid'])){
	$where = "gid=".$_GET['gid'];
}

$sql = "SELECT * FROM tbl_student NATURAL JOIN tbl_program NATURAL JOIN tbl_labgroup NATURAL JOIN tbl_lab WHERE ".$where;
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);

for ($gid = 1; $gid<5; $gid++){
	echo '<button><a href="?do=eps_grade&gid=' . $gid . '">グループ'.$gid.'</a></button>';
}
echo '<table border=1>';
echo '<tr><th>学籍番号</th><th>氏名</th><th>タイトル</th><th>研究室</th><th>開始</th><th>終了</th></tr>';
$row= $rs->fetch_assoc();
while ($row) {
	echo '<tr>';
	echo '<td>' . $row['sid'] . '</td>';
	echo '<td>' . $row['sname']. '</td>';
	echo '<td>' . $row['title']. '</td>';
	echo '<td>' . $row['labname']. '</td>';
	echo '<td>' . substr($row['time1'],0,5). '</td>';
	echo '<td>' . substr($row['time2'],0,5). '</td>';
	echo '</tr>';
	$row= $rs->fetch_assoc();
}
echo '</table>';
?>

?>

