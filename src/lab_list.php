<h2>研究室一覧</h2>
<?php
require_once('db_inc.php');
$sql = "SELECT * FROM tbl_lab";
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);

echo '<button style="width:10em"><a href="?do=lab_edit">研究室追加</a></button>';
echo '<table border=1>';
echo '<tr><th>研究室名</th><th>専門分野</th><th>グループ名</th><th>操作</th></tr>';
$row= $rs->fetch_assoc();
while ($row) {
	echo '<tr>';
	echo '<td>' . $row['labname']. '</td>';
	echo '<td>' . $row['study']. '</td>';
	$group = empty($row['gid']) ? '' : 'グループ'.$row['gid']; 
	$labid = $row['labid']; 
	$gid = empty($row['gid']) ? 0 : $row['gid']; 
	echo '<td>' . $group . '</td>';
	echo '<td><button style="width:6em;"> <a href="?do=lab_edit&labid='.$labid.'&gid='.$gid.'">編集</a> </button></td>';
	echo '</tr>';
	$row= $rs->fetch_assoc();
}
echo '</table>';
?>