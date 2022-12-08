<?php
$sid = strtoupper(substr($uid,1,7)); //学生のユーザIDから、学籍番号を求める
if($_FILES['userfile'])
{
  echo '<h3>ファイルはアップロードされました</h3>';
  //print_r($_FILES['userfile']);
  $name = $_FILES['userfile']['name'];
  $type = $_FILES['userfile']['type'];
  $ext = pathinfo($name, PATHINFO_EXTENSION);
  $tmp_name =$_FILES['userfile']['tmp_name'];
  
  $uploaddir = 'files/';
  $target = $uploaddir . $sid . '.pdf';
  move_uploaded_file($tmp_name, $target);
  echo '<a href="'. $target . '">ダウンロード</a>';
}else{
  echo '<h3>ファイルはアップロードされていません</h3>';
}
?>