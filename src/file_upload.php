<?php
require_once('db_inc.php');
$uid = $_SESSION['uid'];
$sid = strtoupper(substr($uid,1,7)); //学生であれば、学籍番号（ユーザIDの大文字変換）を求める
$sql = "SELECT * FROM tbl_program WHERE sid='{$sid}'";
// echo $sql;
$rs = $conn->query($sql);
echo "<h2>資料アップロード</h2>";
if (!$rs) die('エラー: ' . $conn->error);
$row= $rs->fetch_assoc();
if ($row){ 
  $title = $row['title'];
  $time1 = $row['time1'];
  $time2 = $row['time2'];
?>
<h3>発表題目：<?=$title?></h3>
<h4>学籍番号：<?=$sid?></h4>
<h4>発表時間：<?=substr($time1,0,5)?>～<?=substr($time2,0,5)?></h4>
</ul>
<form method="post" action="?do=file_save" enctype="multipart/form-data">
<input type="hidden" name="sid" value="<?=$sid?>">
<input name="userfile" type="file">
<input type="submit" value="OK">&nbsp;
<button><a href="?do=pg_list">戻る</a></button>
</form>
<?php
}else{
  echo "<h3>発表情報が登録されていません。</h3>";
}
?>