<?php
$sid=$_POST['sid'];
$name = $_FILES['userfile']['name'];
$type = $_FILES['userfile']['type'];
$ext = pathinfo($name, PATHINFO_EXTENSION);
$tmp_name =$_FILES['userfile']['tmp_name'];
$uploaddir = 'files/';
$target=$uploaddir .$sid.'.pdf';
//$target = $uploaddir . "myfile." . $ext;
move_uploaded_file($tmp_name, $target);
echo '<h3>ファイルはアップロードされました</h3>';
?>
