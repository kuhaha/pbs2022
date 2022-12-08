<?php
require_once('db_inc.php');
$uid=$_SESSION['uid'];
$sid=strtoupper(substr($uid,1));
echo "<h2>進捗状況確認</h2>";
// 一覧データを検索するSQL文
$sql = "SELECT * FROM tbl_progress ORDER BY sid,schedule_id";
$sql ="SELECT p.*,s.sname,c.title
FROM tbl_progress p,tbl_student s,tbl_schedule c
WHERE p.sid=s.sid AND p.schedule_id=c.id AND p.sid='$sid'
ORDER BY s.sid,schedule_id";
//データベースへ問合せのSQL文($sql)を実行する・・・
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);

// 問合せ結果を表形式で出力する
echo '<table border=1>';
// まず、ヘッド部分（項目名）を出力
echo '<tr><th width="10%">報告日</th><th width="15%">項目名</th><th width="10%">進捗状況</th><th width="35%">理由</th><th>教員コメント</th></tr>';
$row= $rs->fetch_assoc();
while ($row) {
 echo '<tr>';
 echo '<td>' . $row['report_date'].'</td>';
 echo '<td>' . $row['title'] . '</td>';
 echo '<td>' . $row['achievement']. '％</td>';
 echo '<td>' . $row['reason'].'</td>';
 echo '<td>' . $row['advice'].'</td>';
 echo '</tr>';
 $row= $rs->fetch_assoc();
}
echo '</table>';
?>