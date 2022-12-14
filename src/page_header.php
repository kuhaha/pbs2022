<!DOCTYPE html>
<html><head>
<meta http-equiv="Content-TYPE" content="text/html; charset=UTF-8">
<meta http-equiv="Cache-Control" content="no-cache">
<link rel="stylesheet" TYPE="text/css" href="css/style.css">
</head>
<body>
<div class="wrapper">
<div id="navbar">

<?php
if (isset($_SESSION['urole'])){
  echo $_SESSION['uname'].'&nbsp;&nbsp;';
  echo '[<a href="?do=pg_home">HOME</a>]&nbsp';
  $menu = array();
  if ($_SESSION['urole']==1){  //学生
    $menu = array(   //学生メニュー
      '進捗報告'  => 'ad_schedule',
      '進捗確認'  => 'ad_list1', 
      'プログラム確認'  => 'pg_list',
      '資料提出'  => 'file_upload',
      );
  }elseif($_SESSION['urole']==2 ) { //教員 
    $menu = array(   
    	'進捗状況確認' => 'ad_list2',
      '発表情報登録' => 'pg_list', 
    );
  }else if ($_SESSION['urole']==9){
    $menu = array(
      'グループ登録' => 'group_list',   
    	'研究室登録' => 'lab_list',
    	'学生登録' => 'st_list',
      'アカウント登録' => 'usr_list',
    );
  }
  foreach($menu as $label=>$action){
    echo  '[<a href="?do=' . $action . '">' . $label . '</a>]&nbsp;' ;
  }
  echo  '[<a href="?do=sys_logout">ログアウト</a>]&nbsp;' ;
}else{
  echo  '[<a href="?do=sys_login">ログイン</a>]' ;
}
?>
</div>
