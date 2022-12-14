<h2>グループ登録・編集</h2>
<?php
require_once('db_inc.php');
$act = 'insert';
$gid = 0;
$gname=$staff=$room=$detail='';
$pdate = date('Y-1-14');
if (isset($_GET['gid'])){
	$gid = $_GET['gid'];
}

$sql = "SELECT * FROM  tbl_group WHERE gid=$gid";
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
$r = $rs->fetch_assoc();
if ($r){
    $act = 'update';
	list($gname,$staff,$detail) = [$r['gname'],$r['staff'],$r['detail']];
	list($pdate,$gyear,$room,) = [$r['pdate'],$r['gyear'],$r['room']];
}
$staffs = [];
$sql = "SELECT * FROM  tbl_user WHERE urole=2";
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
while ($row = $rs->fetch_assoc()){
	$staffs[ $row['uid'] ] = $row['uname'];
}

?>
<form action="?do=group_save" method="post">
<input type="hidden" name="act" value="<?=$act?>">
<table>
<tr><th>年　　度：</th>
<td><input type="number" name="gyear" min=2020 max=2050 size="80" value="<?=$gyear?>"></td></tr>
<tr><th>発 表 日：</th>
<td><input type="date" name="pdate" size="80" value="<?=$pdate?>"></td></tr>
<tr><th>グループ名：</th>
<td><input type="text" name="labname" size="80" value="<?=$gname?>"></td></tr>
<tr><th>説　　　明：</th>
<td><textarea name="detail" rows="5" cols="80"><?=$detail?></textarea></td></tr>
<tr><th>発表会会場：</th>
<td><input type="text" name="room" size="80" value="<?=$room?>"></td></tr>
<tr><th>世話役教員：</th><td>
<select name="staff">
<?php
foreach ($staffs as $uid=>$name){
    $selected = $uid == $staff ? 'selected' : '';
    echo '<option value="' . $uid . '" ' . $selected . '>'.$name;
} 
?>
</td></tr>
</table>
<input type="submit" value="登録" style="width:6em;">
<input type="reset" value="取消" style="width:6em;">
</form>