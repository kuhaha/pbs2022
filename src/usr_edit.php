<h2>アカウント登録・編集</h2>
<?php
require_once('db_inc.php');
$act = 'insert';// 新規登録の場合
$uid = $uname = ''; $urole = 1;
if (isset($_GET['uid'])){
	$uid = $_GET['uid'] ;
	$sql = "SELECT * FROM tbl_user WHERE uid='{$uid}'";
  $rs = $conn->query($sql);
  if (!$rs) die('エラー: ' . $conn->error);
  $row= $rs->fetch_assoc();
	if ($row){ // 既存アカウントを編集するために、変数に代入
		$act = 'update';
		$uname = $row['uname'];
		$urole = $row['urole'];
	}
}
?>
<form action="?do=usr_save" method="post">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<table>
<tr><td>ユーザID：</td><td>
<?php
if ($act=='insert'){
  echo '<input type="text" name="uid">';
}else {
  echo '<input type="hidden" name="uid" value="'.$uid.'">';//非表示送信
  echo "<b>$uid</b>";
}
?>
</td></tr>
<tr><td>氏　名：</td><td>
  <input type="text" name="uname" size="50em" value="<?php echo $uname;?>">
</td></tr>
<tr><td>パスワード</td><td>
  <input type="password" name="pass1" size="50em">
</td></tr>
<tr><td>（再入力）</td><td>
  <input type="password" name="pass2" size="50em">
</td></tr>
<tr><td>ユーザ種別</td><td>
<?php
  $codes = array(1=>'学生', 2=>'教員', 9=>'管理者');
  foreach ($codes as $key => $value){
    if ($key==$urole){
      echo '<input type="radio" name="urole" value="' . $key .'" checked>' . $value;
    }else{
      echo '<input type="radio" name="urole" value="' . $key .'">' . $value;
    }
  }
?>
</td></tr>
</table>
<input type="submit" value="登録"><input type="reset" value="取消">
</form>