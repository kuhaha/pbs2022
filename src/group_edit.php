<h2>グループ登録・変更画面</h2>
<?php
require_once('db_inc.php');
if (!isset($_GET['labid'])){
	die("エラー：研究室番号が指定されていません");
}
$labid = $_GET['labid'];
$e_gid = isset($_GET['gid']) ? $_GET['gid'] : 0;

$groups = [];
$sql = "SELECT * FROM  tbl_group";
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
while ($row = $rs->fetch_assoc()){
	$groups[ $row['gid'] ] = $row['gname'];
}
 
$sql = "SELECT * FROM tbl_lab WHERE labid=" . $labid;
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' .$sql. $conn->error);
$row = $rs->fetch_assoc();
if ($row){
	$labname = $row['labname'];
	echo '<table >';
	echo '<tr><th>研究室</th>';
	echo '<td>' . $labname . '</td></tr>';
	echo '<tr><th>所属グループ</th>';
	echo '<td>';
	foreach ($groups as $gid => $gname) {
		$checked = ($gid == $e_gid) ? 'checked' : '';
		echo '<input type="radio" name="gid" value="' . $gid . '" ' . $checked . '>' . $gname;
	}
	echo '</td></tr>';
	echo '</table>';
}
?>