<h2>学生一覧</h2>
<?php
require_once('db_inc.php');

$sql = "SELECT * FROM tbl_lab";
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
echo '<button><a href="?do=st_list">全研究室</a></button>';
while ($row= $rs->fetch_assoc()){
    echo '<button><a href="?do=st_list&labid=' . $row['labid'] . '">'.$row['labname'].'</a></button>';
}
$where = "1";
if (isset($_GET['labid'])){
    $where = "labid=" . $_GET['labid'];
}
$sql = "SELECT * FROM tbl_student NATURAL JOIN tbl_lab WHERE " . $where;
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);
echo '<table border=1>';
echo '<tr><th>学籍番号</th><th>氏名</th><th>研究室</th><th>操作</th></tr>';
$row= $rs->fetch_assoc();
while ($row) {
    echo '<tr>';
    echo '<td>' . $row['sid'] . '</td>';
    echo '<td>' . $row['sname']. '</td>';
    echo '<td>' . $row['labname']. '</td>';
    if ($_SESSION['urole'] > 1){
        echo '<td><a href="?do=st_edit&sid='.$row['sid']. '">編集</a></td>';
    }
    echo '</tr>';
    $row= $rs->fetch_assoc();
}
echo '</table>';
?>

