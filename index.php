<?php
  session_start();
  const BASE_URL = __DIR__;
  include('src/page_header.php');
  $action = 'pg_home';
  if (isset($_GET['do'])) {
    $action = $_GET['do'];
  }
  include('src/' . $action . '.php');
  include('src/page_footer.php');
?>