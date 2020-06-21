<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'].'/configs/configs.php';

if( isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST" ){

	if(isset($user_id)){// Если пользователь авторизировался, перезаписываем его телефон

		$sql = "UPDATE `users` SET `phone`= '". $_POST['phone'] ."' WHERE id = " . $user_id;
		$conn->query($sql);
		
	} else {// Если пользователя нету в БД users

		// Добавляем пользователя в таблицу users
		$sql = "INSERT INTO users (name, phone, email) VALUES ('". $_POST['name'] ."', '". $_POST['phone'] ."', '". $_POST['email'] ."')";
		

		if($conn->query($sql)){
			echo "User add";
			$user_id = $conn->insert_id;
		}
	}

	// Делаем запрос на добавление заказов в БД
	$sql = "INSERT INTO orders (`user_id`, `cruis_list`)
			VALUES ('". $user_id ."', '". $_COOKIE['basket']."')";

	// Выполняем запрос
	if($conn->query($sql)){
		setcookie("basket", "", 0, "/");
		header("Location: /modules/basket/send_message.php");
	}
}

?>