<?php
// токен бота
define('TELEGRAM_TOKEN', '1179545366:AAGlGOTB9lkdxxFMZqtKMoVy2HV5epzek6g');
  
// внутренний айди
define('TELEGRAM_CHATID', '682557841');

$user_id = null;

if( isset($_COOKIE['login']) ){
	$user_id = $_COOKIE['login'];
}

?>