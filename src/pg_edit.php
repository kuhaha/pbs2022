<?php
  require_once('db_inc.php');
  if (isset($_GET['sid'])){
    $sid =$_GET['sid'];
  }else{
    die("学籍番号が与えられていません");
  }
  $sql = "SELECT * FROM tbl_student WHERE sid='$sid'";
  $rs = $conn->query($sql);
  if (!$rs) die('エラー: ' . $conn->error);
  $row= $rs->fetch_assoc();
  if ($row){
    $sname =$row['sname'];
  }else{
    die("学籍番号が正しくありません");
  } 

  $sql = "SELECT * FROM tbl_program WHERE sid='$sid'";
  $rs = $conn->query($sql);
  if (!$rs) die('エラー: ' . $conn->error);
  $row= $rs->fetch_assoc();
  $title =$time1 =$time2 ='';
  if ($row) {
    $title =$row['title'];
    $time1 =$row['time1'];
    $time2 =$row['time2'];
  }else{
    die("学籍番号が正しくありません");
  } 

?>
<h2>卒業研究題目・時間登録</h2>
<form action="?do=pg_save" method="post">
<table>
<tr><td>学籍番号：</td><td><?=$sid?>
<input type="hidden" name="sid" value="<?=$sid?>">
</td></tr>
<tr><td>氏　　名：</td><td><?=$sname?></td></tr>
<tr><td>発表題目：</td><td>
  <input type="text" name="title" value="<?=$title?>" size="100">
</td></tr>
<tr><td>発表時間：</td><td>
   <input type="time" name="time1" value="<?=$time1?>">～
   <input type="time" name="time2" value="<?=$time2?>">
</td></tr>
<tr>
<td colspan=2><input type="submit" style="width:6em;" value=" 送　信 ">&nbsp;&nbsp;
<button style="width:6em;"><a href="?do=pg_list">戻る</a></button></td>
</tr>
</table>
</form>