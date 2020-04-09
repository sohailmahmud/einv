<?php
require_once('../database/Database.php');
$return = 'winnie';
$name = 'deped';
//save file
$data=date("F j, Y, g-i a");
echo $handleWithCare = '../backup/'.'db-backup-'.$data.' - '.$name.'.sql';
$handle = fopen($handleWithCare,'w+');
fwrite($handle,$return);
fclose($handle);

$db = new Database();



$db->Disconnect();