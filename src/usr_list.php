<h2>アカウント一覧</h2>

<?php
require_once('db_inc.php');
$sql = "SELECT * FROM tbl_user ORDER BY urole,uid";
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
$row= $rs->fetch_assoc();
echo '<button style="width:10em"><a href="?do=usr_edit">アカウント追加</a></button>';
echo '<table border=1>';
echo '<tr><th>ユーザID</th><th>氏名</th><th>ユーザ種別</th><th>操作</th></tr>';
while ($row) {
	echo '<tr>';
	echo '<td>' . $row['uid'] . '</td>';
	echo '<td>' . $row['uname']. '</td>';
	//echo '<td>' . $row['urole']. '</td>';
	$roles = array(
			1=>'学生',
			2=>'教員',
			9=>'管理者'
	);
	$i  = $row['urole'];     // 数字のユーザ種別をで取得
	echo '<td>' . $roles[$i] . '</td>'; // ユーザ種別名を出力
	echo '<td><button><a href="?do=usr_edit&uid='. $row['uid'].'">編集</a></button>';
	echo '<button><a href="?do=usr_delete&uid='. $row['uid'].'">削除</a></button></td>';

	echo '</tr>';
	$row= $rs->fetch_assoc();
}
echo '</table>';
?>