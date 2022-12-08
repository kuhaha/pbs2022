<?php
require_once('db_inc.php');
$act = "update";

$uid = $_SESSION['uid']; //ログイン中のユーザのIDを取得
$sid = strtoupper($uid); //学生であれば、学籍番号（ユーザIDの大文字変換）を求める
$sname = "";
$where = "1";
if (isset($_GET['sid'])){
	$sid =$_GET['sid'];
}
$where = "sid='$sid'";
$sql = "SELECT * FROM tbl_student WHERE ".$where;
//データベースへ問合せのSQL文($sql)を実行する・・・
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
$row= $rs->fetch_assoc();
$sname =$row['sname'];
?>
<h2>卒業研究題目登録・編集</h2>
<form action="?do=eps_pgsave" method="post">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<table>
<tr><td>学籍番号：</td><td>
<?php
if ($act=='insert'){
  echo '<input type="text" name="sid">';//テキストボックス
}else {
  echo '<input type="hidden" name="sid" value="'.$sid.'">';//非表示送信
  echo "<b>$sid</b>";
}
?>
</td></tr>
<tr><td>氏　名：</td><td>
<?php echo $sname;?>
</td></tr>
<tr><td>卒業研究発表題目</td><td>
  <input type="title" name="title">
</td></tr>
<tr><td>開始時間</td><td>
  <input type="time" name="time1">
</td></tr>
<tr><td>終了時間</td><td>
  <input type="time" name="time2">
</td></tr>

<tr>
<td colspan=2><button><a href="?do=eps_list">戻る</a>&nbsp;</button><input type="submit" value="送信">&nbsp;<input type="reset" value="取消"></td>
</tr>

</table>
</form>