<?php 
$modals = glob('modal/*.php');
foreach ($modals as $m) {
  require_once($m);
}
 ?>