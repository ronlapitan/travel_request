<?php
require_once 'utils/meekrodb.2.3.class.php';
DB::$user = 'ronlapitan';
DB::$password = 'R162262c';
DB::$dbName = 'iwep_div_one_db';
session_start();

function check_is_ajax($script) {
  $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND
  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
  if(!$isAjax) {
    trigger_error('Access denied - not an AJAX request...' . ' (' . $script . ')', E_USER_ERROR);
  }
}

?>
