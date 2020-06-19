<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/configs.php';

function message_to_telegram($text) {
    $data = [
        'chat_id' => TELEGRAM_CHATID,
        'text' => $text,
        'parse_mode' => "HTML"
    ];
     
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage' );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $data ); 
 
    $result = curl_exec( $ch );
    curl_close( $ch );
}

function send_message_to_email() {
    $text = "<h1>Hello</h1><br> <p>New order</p>" ;
    mail($_POST['email'], 'Your orders', $text);
}


message_to_telegram("New order");
send_message_to_email();
header("Location: /basket.php");
?>
