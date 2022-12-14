<h2>学生登録・編集</h2>
<?php
require_once('db_inc.php');
$act = 'insert';
$sid = $sname = ''; $labid = 0;
if (isset($_GET['sid'])){
	$sid = $_GET['sid'] ;
	$sql = "SELECT * FROM tbl_student WHERE sid='{$sid}'";
    $rs = $conn->query($sql);
    if (!$rs) die('エラー: ' . $conn->error);
    $row= $rs->fetch_assoc();
	if ($row){ 
		$act = 'update';
		$sname = $row['sname'];
		$labid = $row['labid'];
	}
}
// 研究室IDと研究室名を配列にする
$labs = [];
$sql = "SELECT * FROM  tbl_lab";
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
while ($row = $rs->fetch_assoc()){
	$labs[ $row['labid'] ] = $row['labname'];
}
?>
<form action="?do=st_save" method="post">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<table>
<tr><td>学籍番号：</td><td>
<?php
if ($act=='insert'){
  echo '<input type="text" name="sid">';
}else {
  echo '<input type="hidden" name="sid" value="'.$sid.'">';//非表示送信
  echo "<b>$sid</b>";
}
?>
</td></tr>
<tr><td>氏　名：</td><td>
  <input type="text" name="sname" size="50em" value="<?php echo $sname;?>">
</td></tr>
<tr><td>所属研究室</td><td>
<?php
  foreach ($labs as $key => $value){
    if ($key==$labid){
      echo '<input type="radio" name="urole" value="' . $key .'" checked>' . $value;
    }else{
      echo '<input type="radio" name="urole" value="' . $key .'">' . $value;
    }
    echo '<br>';
  }
?>
</td></tr>
</table>
<input type="submit" value="登録" style="width:6em;">
<button style="width:6em;"><a href="?do=st_list" onclick="history.back();return false;">戻る</a></button>
</form>