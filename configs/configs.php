<?php
// токен бота
define('TELEGRAM_TOKEN', '1227145730:AAG9gPa4xtpbCUP958bgNJJPJnXSPACgO3w');
  
// внутренний айди
define('TELEGRAM_CHATID', '968732510');

$user_id = null;

if( isset($_COOKIE['login']) ){
	$user_id = $_COOKIE['login'];
}

?>