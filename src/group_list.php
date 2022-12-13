<h2>グループ一覧</h2>
<?php
require_once('db_inc.php');
$sql = "SELECT g.*, u.uname FROM tbl_group g left join tbl_user u on g.staff=u.uid; ";
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);

echo '<button style="width:10em"><a href="?do=group_edit">グループ追加</a></button>';
echo '<table border=1>';
echo '<tr><th>グループ名</th><th>発表会場</th><th>世話役</th><th>操作</th></tr>';
$row= $rs->fetch_assoc();
while ($row) {
	echo '<tr>';
	echo '<td>' . $row['gname']. '</td>';
	echo '<td>' . $row['room']. '</td>';
	echo '<td>' . $row['uname']. '</td>';
	echo '<td><button style="width:10em;"> <a href="?do=group_edit&gid='. $row['gid'].'">グループ編集</a></button></td>';
	echo '</tr>';
	$row= $rs->fetch_assoc();
}
echo '</table>';
?>