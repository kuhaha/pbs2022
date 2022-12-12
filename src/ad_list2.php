<?php
require_once('db_inc.php');
echo "<h2>進捗状況確認(教員用)</h2>";
$sql ="SELECT p.*,s.sname,c.title
FROM tbl_progress p,tbl_student s,tbl_schedule c
WHERE p.sid=s.sid AND p.schedule_id=c.id
ORDER BY s.sid,schedule_id";

$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
$row= $rs->fetch_assoc();

echo '<table border=1>';
echo '<tr><th width="10%">学籍番号</th><th width="10%">氏名</th><th width="10%">報告日</th><th width="15%">項目名</th><th width="10%">進捗状況</th><th width="35%">理由</th><th>操作</th></tr>';

while ($row) {
 echo '<tr>';
 echo '<td>' . $row['sid'] . '</td>';
 echo '<td>' . $row['sname'].'</td>';
 echo '<td>' . $row['report_date'].'</td>';
 echo '<td>' . $row['title'] . '</td>';
 echo '<td>' . $row['achievement']. '％</td>';
 echo '<td>' . $row['reason'].'</td>';
 echo '<td><a href="?do=ad_reply&id='.$row['id'].'">返信</a></td>';
 echo '</tr>';
 $row= $rs->fetch_assoc();
}
echo '</table>';
?>