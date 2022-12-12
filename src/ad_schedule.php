<?php
require_once('db_inc.php');

$sql = "SELECT * FROM tbl_schedule ORDER BY start_date";  
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
echo "<h2>スケジュール</h2>";
// 問合せ結果を表形式で出力する
echo '<table border=1>';
echo '<tr><th width="10%">開始日</th><th width="10%">締切日</th><th width="20%">項目</th><th width="40%">説明</th><th>操作</th></tr>';
$row= $rs->fetch_assoc();
while ($row) {
  echo '<tr>';
  echo '<td>' . $row['start_date'].'</td>';
  echo '<td>' . $row['end_date']. '</td>';
  echo '<td>' . $row['title']. '</td>';
  echo '<td>' . $row['detail']. '</td>';
  echo '<td><a href="?do=ad_report&id='.$row['id'].'">報告</a></td>';
  echo '</tr>';
  $row= $rs->fetch_assoc();
}
echo '</table>';
?>

