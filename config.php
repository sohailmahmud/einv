<?php  
if(session_status() == PHP_SESSION_NONE)
{
	session_start();//start session if session not start
}
function printQuery($res){
	echo '<pre>';
		print_r($res);
	echo '</pre>';
}
$class = glob('class/*.php');
foreach ($class as $c) {
	require_once($c);
}
