<h2>プログラム確認画面</h2>
<?php

require_once('db_inc.php');
$uid = $_SESSION['uid']; //ログイン中のユーザのIDを取得

$where = "1";
if (isset($_GET['gid'])){
	$where = "gid=".$_GET['gid'];
}

// 一覧データを検索するSQL文
$sql = "SELECT * FROM tbl_lab NATURAL JOIN tbl_program NATURAL JOIN tbl_labgroup  WHERE ".$where;
//データベースへ問合せのSQL文($sql)を実行する・・・
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);

// 問合せ結果を表形式で出力する。

//for ($gid = 1; $gid<5; $gid++){
	//echo '<button><a href="?do=eps_grade&gid=' . $gid . '">グループ'.$gid.'</a></button>';
//}


echo '<table border=1>';

echo '<tr><th>学籍番号</th><th>氏名</th><th>研究室</th><th>ボタン</th></tr>';

//学籍番号(sid)、氏名(sname)、性別(sex)、GPA(gpa)、修得単位数(credit)を一覧表示
$row= $rs->fetch_assoc();

while ($row) {
	echo '<tr>';
	echo '<td>' . $row['uid'] . '</td>';
	echo '<td>' . $row['name']. '</td>';
	//echo '<td>' . $row['sex']. '</td>';
	//$usex  = array(
			//1=>'男',
			//2=>'女',
	//);
	$sid =$row['sid'];


	//echo '<td>' . $use[$i], '</td>';
	//echo '<td>' . $row['title']. '</td>';
	echo '<td>' . $row['labname']. '</td>';
	//echo '<td>' . substr($row['time1'],0,5). '</td>';
	//echo '<td>' . substr($row['time2'],0,5). '</td>';

	echo '<td>' .'<button><a href="?do=eps_decide&sid=' . $sid . '">編集</a></button></td>';

	echo '</tr>';
	$row= $rs->fetch_assoc();
}
echo '</table>';

?>

