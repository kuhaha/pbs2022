<?php
  require_once('db_inc.php');
  if (isset($_GET['sid'])){
    $sid =$_GET['sid'];
  }else{
    die("学籍番号が与えられていません");
  }

  $act = "update";
  $sql = "SELECT * FROM tbl_student WHERE sid='$sid'";
  $rs = $conn->query($sql);
  if (!$rs) die('エラー: ' . $conn->error);
  $row= $rs->fetch_assoc();
  if ($row)  
  {
    $sname =$row['sname'];
  }else{
    die("学籍番号が正しくありません");
  } 

?>
<h2>卒業研究題目登録・編集</h2>
<form action="?do=eps_pgsave" method="post">
<table>
<tr><td>学籍番号：</td><td><?=$sid?>
<input type="hidden" name="sid" value="<?=$sid?>">
</td></tr>
<tr><td>氏　　名：</td><td><?=$sname?></td></tr>
<tr><td>発表題目：</td><td>
  <input type="title" name="title">
</td></tr>
<tr><td>発表時間：</td><td>
   <input type="time" name="time1">～
  <input type="time" name="time2">
</td></tr>
<tr>
<td colspan=2><button><a href="?do=pg_list">戻る</a>&nbsp;</button><input type="submit" value="送信">&nbsp;<input type="reset" value="取消"></td>
</tr>

</table>
</form>