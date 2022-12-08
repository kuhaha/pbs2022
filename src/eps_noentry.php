<h2>未登録者⼀覧画面</h2>

<?php
require_once('db_inc.php');
$sql ="SELECT * FROM tbl_student WHERE sid NOT IN (SELECT sid FROM tbl_wish)";
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
echo '<table border=1>';
echo '<tr><div><th>学籍番号</th><th>氏名</th><th>性別</th><th>GPA</th><th>取得単位数</th></div></tr>';
$row= $rs->fetch_assoc();
while ($row) {
 echo '<tr>';
 echo '<td>' . $row['sid'] . '</td>';
 echo '<td>' . $row['sname']. '</td>';
 $usex  = array(
   1=>'男',
   2=>'女',
 );
 $i =$row['sex'];
 echo '<td>' . $usex[$i], '</td>';
 echo '<td>' . $row['gpa']. '</td>';
 echo '<td>' . $row['credit']. '</td>';
 echo '</tr>';
 $row= $rs->fetch_assoc();
}
echo '</table>';
?>