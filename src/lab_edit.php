<h2>研究室登録・編集</h2>
<?php
require_once('db_inc.php');
$labid = $gid = 0;
if (isset($_GET['labid'])){
	$labid = $_GET['labid'];
}
if (isset($_GET['labid'])){
	$gid = $_GET['gid'];
}

$groups = [];
$sql = "SELECT * FROM  tbl_group";
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
while ($row = $rs->fetch_assoc()){
	$groups[ $row['gid'] ] = $row['gname'];
}

$act = 'insert';
$labname = $study='';
$e_gid = 0;
$sql = "SELECT * FROM tbl_lab WHERE labid=" . $labid;
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' .$sql. $conn->error);
$row = $rs->fetch_assoc();

if ($row){
	$act = 'update';
	$labname = $row['labname'];
	$study = $row['study'];
	$e_gid = $row['gid'];
}
echo '<table >';
echo '<tr><th>研究室名</th>';
echo '<td><input type="text" name="labname" size="80" value="' . $labname . '"></td></tr>';
echo '<tr><th>専門分野</th>';
echo '<td><input type="text" name="study" size="100" value="' . $study . '"></td></tr>';
echo '<tr><th>所属グループ</th>';
echo '<td>';
foreach ($groups as $gid => $gname) {
	$checked = ($gid == $e_gid) ? 'checked' : '';
	echo '<input type="radio" name="gid" value="' . $gid . '" ' . $checked . '>' . $gname;
}
echo '</td></tr>';
echo '</table>';

?>