<h2>希望集計画面</h2>

<?php
require_once('db_inc.php');

// 一覧データを検索するSQL文
$sql = <<< EOM
 SELECT pid, COUNT(*) as people FROM tbl_wish GROUP BY pid UNION
 SELECT pid, 0 as people FROM tbl_program WHERE pid NOT IN (SELECT pid FROM tbl_wish)
 ORDER BY pid
EOM;

$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
echo '<table border=1>';
echo '<tr><div><th>教育プログラム名</th><th>人数</th></div></tr>';
$row= $rs->fetch_assoc();
while ($row) {
 echo '<tr>';
 $upid  = array(
   1=>'総合教育プログラム',
   2=>'応用教育プログラム',
 );
 $i =$row['pid'];
 echo '<td>' . $upid[$i], '</td>';
 echo '<td>' . $row['people']. '</td>';
 $row= $rs->fetch_assoc();
}
echo '</table>';
?>