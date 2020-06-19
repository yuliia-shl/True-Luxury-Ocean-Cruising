<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';

// Если пришел ПОСТ запрос
if( isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST" ){
	
	$sql = "SELECT * FROM cruises WHERE id=" . $_POST['id'];

	$result = $conn->query($sql);
	$cruis = mysqli_fetch_assoc($result);

	/*============================
	 Добавление круиза в корзину
	============================*/
	// Если корзина уже существует
	if( isset($_COOKIE['basket']) ){
		// Преобразовываем формат JSON в массив
		$basket = json_decode($_COOKIE['basket'], true);

		// Флаг добавлять новый круиз или нет
		$issetCruis = 0; 

		// Циклом проходим по всему масиву корзины
		for ($i=0; $i < count($basket["basket"]); $i++) { 
			// Если круиз в корзине уже существует
			if($basket["basket"][$i]["cruis_id"] == $cruis['id']){
				
				// Меняем флаг, что такой круиз уже существует
				$issetCruis = 1;
			}
		}

		// Если круиза такого нету в корзине
		if($issetCruis != 1){

			// Добавляем еще один выбранный круиз в корзину
			$basket['basket'][] = [ 
							"cruis_id" => $cruis['id'],
							"days" => $cruis['days'] ];
		}

	// Если корзина пуста		
	} else {
		// Добавляем  первый выбранный круиз в корзину
		$basket = [ 'basket' => [ 
								["cruis_id" => $cruis['id'],
								"days" => $cruis['days'] ] ]
								];
	}

	// Преобразование массива в формат json
	$jsonProduct = json_encode($basket);

	// Очистка куки
	setcookie("basket", "", 0, "/");

	// Добавляем куки
	setcookie("basket", $jsonProduct, time() + 60 * 60, "/");
	
	// Если такой круиз уже есть в корзине
	if($issetCruis == 1) {
		$info = [ 'info' =>
								["count" => count($basket['basket']),
								"echo_info" => "Такой круиз уже есть в корзине" ]
								];
	} else {
		$info = [ 'info' => 
								["count" => count($basket['basket']),
								"echo_info" => "" ]
								];
	}

	// это эхо нам будет показано в аякс запросе, кол. товаров и вывод сообщения
	echo json_encode($info);

}

?>