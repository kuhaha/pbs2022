<?php
require_once('db_inc.php');

if (isset($_GET['id'])){
  $id = $_GET['id'] ;
  $sql = "SELECT * FROM tbl_schedule WHERE id=$id";
  $rs = $conn->query($sql);
  if (!$rs) die('エラー: ' . $conn->error);
  $row= $rs->fetch_assoc();
  if ($row){
    $title = $row['title'];
    $detail = $row['detail'];
    $start = $row['start_date'];
    $end = $row['end_date'];
  }
  $a = 0;
}
?>
<h2>進捗報告(学生)</h2>
<?php
if (isset($title)) {
?>
<form action="?do=ad_save" method="post">
<input type="hidden" name="id" value="<?=$id?>">
<table>
<tr><td>項目名</td><td><?=$title?></td></tr>
<tr><td>期限</td><td><?=$start?>～<?=$end?></td></tr>
<tr><td>報告日</td><td><?=date('Y-m-d')?></td></tr>
<tr><td>詳　細</td><td> <?=$detail?>
</td></tr>
<tr><td>進捗度・自己評価</td><td>
<input type="number" name="achievement" min=0 max=100 value="<?=$a?>">％</td>
</tr>
<tr><td>備考（報告、質問）</td><td>
  <textarea name="reason" rows="8" cols="80"></textarea>
</td></tr>
</table>
<input type="submit" name="a" value="更新"/>
<input type="reset" value="取消"/>
</form>
<?php
}else {
  echo "エラー：項目未定義";
}
?>