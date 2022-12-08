<h2>希望登録画面</h2>

<?php
require_once('db_inc.php');

$uid = $_SESSION['uid']; //ログイン中のユーザのIDを取得
$sid = strtoupper($uid); //学籍番号（ユーザIDの大文字変換）を求める

$act = 'insert';// 新規登録の場合
$pid = 0;
$reason = '';

$sql = "SELECT * FROM tbl_wish WHERE sid='{$sid}'";
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
$row= $rs->fetch_assoc();
if ($row){ // 既存アカウントを編集するために、問合せ結果を$pid,$reasonに代入
  $act = 'update';
  $pid = $row['pid'];
  $reason = $row['reason'];
}
?>
<form action="?do=eps_save" method="post">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<h4>希望コース</h4><br>

<?php

$codes = array(1=>'総合教育', 2=>'応用教育',);
foreach ($codes as $key => $value){
	if ($key==$pid){
		echo '<input type="radio" name="pid" value="' . $key .'">' . $value;
	}else{
		echo '<input type="radio" name="pid" value="' . $key .'">' . $value;
	}
}
?>
<br>
 <textarea name="reason" rows="4" cols="40"><?php echo $reason;?></textarea>
<br>
<input type="submit" value="提出"><input type="reset" value="取消">
</form>
