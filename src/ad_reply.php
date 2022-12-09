<?php
require_once('db_inc.php');
if (isset($_GET['id'])){
  $id = $_GET['id'] ;

  $sql = "SELECT * FROM tbl_schedule WHERE id='{$id}'";
  $sql ="SELECT p.*,s.sname,c.title,c.detail
FROM tbl_progress p,tbl_student s,tbl_schedule c
WHERE p.sid=s.sid AND p.schedule_id=c.id AND p.id='{$id}'
ORDER BY s.sid,schedule_id";
  //echo $sql;
  // データベースへ問合せのSQL($sql)を実行する・・・
  $rs = $conn->query($sql);
  if (!$rs) die('エラー: ' . $conn->error);

  $row= $rs->fetch_assoc();
  if ($row){
    $title = $row['title'];
    $detail = $row['detail'];
    $sid = $row['sid'];
    $sname = $row['sname'];
    $reason = $row['reason'];
    $achievement = $row['achievement'];
  }
}
?>
<h2>教員コメント</h2>

<form action="?do=ad_reply_save" method="post">
<input type="hidden" name="id" value="<?=$id?>">
<table>
<tr><th>学籍番号</th><td><?=$sid?></td></tr>
<tr><th>氏名</th><td><?=$sname?></td></tr>
<tr><th>項目名</th><td><?=$title?></td></tr>
<tr><th>進捗状況</th><td><?=$achievement?></td></tr>
<tr><th>理由</th><td><?=$reason?></td></tr>
<tr><th>コメント</th><td>
  <textarea name="advice" rows="4" cols="40"></textarea>
</td></tr>
</table>
  <input type="submit" name="a" value="更新"/>
<input type="reset" value="取消"/>
</form>