<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';

// Если пришел ПОСТ запрос
if( isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST" ){
	
	$sql = "SELECT * FROM cruises WHERE id=" . $_POST['id'];

	$result = $conn->query($sql);
	$cruis = mysqli_fetch_assoc($result);

	/*
	product: 1,
	count: 3

	*/

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
				$basket["basket"][$i]["count"]++;
				// Меняем флаг, что такой круиз уже существует
				$issetCruis = 1;
			}
		}

		// Если круиза такого нету в корзине
		if($issetCruis != 1){

			// Добавляем еще один выбранный круиз в корзину
			$basket['basket'][] = [ 
							"cruis_id" => $cruis['id'],
							"ticket" => 1 ];
		}

	// Если корзина пуста		
	} else {
		// Добавляем  первый выбранный круиз в корзину
		$basket = [ 'basket' => [ 
								["cruis_id" => $cruis['id'],
								"ticket" => 1 ] ]
								];
	}

	// Преобразование массива в формат json
	$jsonProduct = json_encode($basket);

	// Очистка куки
	setcookie("basket", "", 0, "/");

	// Добавляем куки
	setcookie("basket", $jsonProduct, time() + 60 * 60, "/");
	
	// это эхо нам будет показано в аякс запросе, кол. товаров
	echo json_encode([
		"count" => count($basket['basket'])
	]);
}

?>