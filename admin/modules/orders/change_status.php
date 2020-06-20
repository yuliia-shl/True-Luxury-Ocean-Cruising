<?php
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

if( isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST" ){

	// Преобразование формат json в  массив
	$order = json_decode($_POST['data_order'], true);

	$sql = "UPDATE orders 
			SET status=" . $order['status'] . " 
			WHERE id=" . $order['id'];

	$conn->query($sql);
}