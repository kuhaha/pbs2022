<?php
	require_once('db_inc.php');
	$uid = $_SESSION['uid']; //ログイン中のユーザのIDを取得
	$sid = strtoupper(substr($uid,1,7)); //学生であれば、学籍番号（ユーザIDの大文字変換）を求める
	$gid = 1;
	if (isset($_GET['gid'])){
		$gid=$_GET['gid'];
	}
	echo "<h2>卒業研究発表会グループ{$gid}プログラム</h2>";
	
	$sql = "SELECT * FROM tbl_group WHERE gid=$gid";
	$rs = $conn->query($sql);
	if (!$rs) die('エラー: ' . $conn->error);
	$row= $rs->fetch_assoc();
	if ($row){
		echo "<ul>";
		list($y,$m,$d) = explode("-",$row['pdate']);
		echo "<li><b>日　付：</b>". $y.'年'.$m.'月'.$d."日</li>";
		echo "<li><b>教　室：</b>". $row['room']."</li>";
		echo "</ul>";
	}

	$sql = "SELECT * FROM tbl_student NATURAL JOIN tbl_program NATURAL JOIN tbl_labgroup NATURAL JOIN tbl_lab WHERE gid= ".$gid;
	$sql .=" ORDER BY labid,time1";
	$rs = $conn->query($sql);
	if (!$rs) die('エラー: ' . $conn->error);
	for ($gid = 1; $gid<5; $gid++){
		echo '<button><a href="?do=pg_list&gid=' . $gid . '">グループ'.$gid.'</a></button>';
	}
		echo '<table border=1>';
	echo '<tr><th>学籍番号</th><th>氏名</th><th width="400em">タイトル</th><th>研究室</th><th>開始</th><th>終了</th><th>ダウンロード</th></tr>';
	$row= $rs->fetch_assoc();
	while ($row) {
		echo '<tr>';
		echo '<td>' . $row['sid'] . '</td>';
		echo '<td>' . $row['sname']. '</td>';
		$e_sid = $row['sid'];
		$pdf = 'files/' . $e_sid . '.pdf';
		echo '<td>' . $row['title']. '</td>';
		echo '<td>' . $row['labname']. '</td>';
		echo '<td>' . substr($row['time1'],0,5). '</td>';
		echo '<td>' . substr($row['time2'],0,5). '</td>';
		echo '<td align="center">';
		if (file_exists(BASE_URL .'/'.  $pdf)){
			echo '<a href="'.$pdf.'">PDF</a>';
		}
		else{
			echo "N/A";
		}
		echo '</td>';
		if ($_SESSION['urole'] > 1){
			$e_sid = $row['sid'];
			echo "<td><a href=\"?do=pg_edit&sid={$e_sid}\">登録</a></td>";
		}
		echo '</tr>';
		$row= $rs->fetch_assoc();
	}
	echo '</table>';
?>

