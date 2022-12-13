<h2>プログラム確認画面</h2>
<?php
require_once('db_inc.php');
$sql = "SELECT b.*,g.gid FROM tbl_lab b LEFT JOIN tbl_labgroup g ON b.labid=g.labid ORDER BY b.labid";
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);


echo '<table border=1>';
echo '<tr><th>研究室名</th><th>専門分野</th><th>グループ名</th></tr>';
$row= $rs->fetch_assoc();
while ($row) {
	echo '<tr>';
	echo '<td>' . $row['labname']. '</td>';
	echo '<td>' . $row['study']. '</td>';
	$group = empty($row['gid']) ? '' : 'グループ'.$row['gid']; 
	$labid = $row['labid']; 
	$gid = empty($row['gid']) ? 0 : $row['gid']; 
	echo '<td>' . $group . '</td>';
	echo '<td><button style="width:6em;"> <a href="?do=group_edit&labid='.$labid.'&gid='.$gid.'">変更</a> </button></td>';
	echo '</tr>';
	$row= $rs->fetch_assoc();
}
echo '</table>';
?>