<!-- <h2>結果確認画面</h2> -->
<?php
// require_once('db_inc.php');

// $uid = $_SESSION['uid']; //ログイン中のユーザのIDを取得
// $sid = strtoupper($uid); //学生であれば、学籍番号（ユーザIDの大文字変換）を求める

// // 希望プログラムを検索するSQL文
// $sql = "SELECT * FROM tbl_wish WHERE sid='{$sid}'";
// //データベースへ問合せのSQL文($sql)を実行する・・・
// $rs = mysql_query($sql, $conn);
// if (!$rs) die ('エラー: ' . mysql_error());

// //問合せ結果があれば希望(pid)を求め、変数$pidに代入。空の場合は、0（未提出）を$pidに代入。
// $row= mysql_fetch_array($rs);
// if($row){
//  $pid = $row['pid'];
// }else if (!$row){
//  $pid = 0;
// }

// // 一覧データを検索するSQL文
// $sql = "SELECT * FROM tbl_student WHERE sid='{$sid}'";
// //データベースへ問合せのSQL文($sql)を実行する・・・
// $rs = mysql_query($sql, $conn);
// if (!$rs) die ('エラー: ' . mysql_error());

// // 問合せ結果を表形式で出力する。
// echo '<table border=1>';
// echo '<tr><th>学籍番号</th><th>氏名</th><th>性別</th><th>GPA</th><th>取得単位数</th><th>本人希望</th><th>配属結果</th></tr>';

// // 学籍番号(sid)、氏名(sname)、性別(sex)、GPA(gpa)、修得単位数(credit)、本人希望($pid)、配属結果(decided)の一覧表示
// $row = mysql_fetch_array($rs) ;
// while ($row) {
//  echo '<tr>';
//  echo '<td>' . $row['sid'] . '</td>';
//  echo '<td>' . $row['sname']. '</td>';
//  //echo '<td>' . $row['sex']. '</td>';
//  $usex  = array(
//    1=>'男',
//    2=>'女',
//  );
//  $i =$row['sex'];
//  echo '<td>' . $usex[$i], '</td>';
//  echo '<td>' . $row['gpa']. '</td>';
//  echo '<td>' . $row['credit']. '</td>';
//     $upid = array(
//      0=>'未提出',
//    1=>'総合教育',
//    2=>'応用教育',
//  );
//  $j=$pid;
//  echo '<td>' . $upid[$j]. '</td>';
//  $udecided = array(
//    //0 =>'未提出',
//    1 =>'総合教育',
//    2 =>'応用教育',
//  );
//  $s=$row['decided'];
//  echo '<td>' . $udecided[$s]. '</td>';
//  echo '</tr>';
//  $row = mysql_fetch_array($rs);//次の行へ
// }
// echo '</table>';

// ?>