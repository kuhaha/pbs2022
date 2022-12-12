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
<table>
<tr><th>発表題目：</th><td><?=$title?></td></tr>
<tr><th>学籍番号：</th><td><?=$sid?></td></tr>
<tr><th>発表時間：</th><td><?=substr($time1,0,5)?>～<?=substr($time2,0,5)?></td></tr>
<form method="post" action="?do=file_save" enctype="multipart/form-data">
<input type="hidden" name="sid" value="<?=$sid?>">
<tr><th>発表時間：</th><td><input name="userfile" type="file"></td></tr>
<tr><th></th><td><input type="submit" value="　OK　">　
<button><a href="?do=pg_list">　戻る　</a></button></td></tr>
</form>
</table>
<?php
}else{
  echo "<h3>発表情報が登録されていません。</h3>";
}
?>