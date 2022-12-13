<?php
require_once('db_inc.php');
$act = "update";

$uid = $_SESSION['uid']; //ログイン中のユーザのIDを取得
$labid = strtoupper($uid); //学生であれば、学籍番号（ユーザIDの大文字変換）を求める
$sname = "";
$where = "1";
if (isset($_GET['labid'])){
	$labid =$_GET['labid'];
}
$where = "labid='$labid'";
$sql = "SELECT * FROM tbl_student NATURAL JOIN tbl_lab WHERE " . $where;
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
$row= $rs->fetch_assoc();
$labname =$row['labname'];
?>
<h2>所属グループ登録・編集</h2>
<form action="?do=eps_pgsave" method="post">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<table>
<tr><td>研究室番号：</td><td>
<?php
if ($act=='insert'){
  echo '<input type="text" name="labid">';//テキストボックス
}else {
  echo '<input type="hidden" name="labid" value="'.$labid.'">';//非表示送信
  echo "<b>$labid</b>";
}
?>
</td></tr>
<tr><td>研究室名：</td><td>
<?php echo $labname;?>
</td></tr>
<tr><td>所属グループ</td><td>
  <input type="title" name="title">
</td></tr>

<tr>
<td colspan=2><button><a href="?do=eps_grouplist">戻る</a>&nbsp;</button><input type="submit" value="送信">&nbsp;<input type="reset" value="取消"></td>
</tr>

</table>
</form>