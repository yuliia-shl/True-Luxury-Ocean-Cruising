<?php
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

// Был ли отправлен ПОСТ запрос
if( isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST" ){

	$cost = null;

	// Преобразование формат json в  массив
	$cruis = json_decode($_POST['data_cruis'], true);

	// Если корзина сформирована
	if($_COOKIE['basket']){
		// Преобразовываем JSON в массив
		$basket = json_decode($_COOKIE['basket'], true);
		
		// Проходим циклом по всему масиву корзины
		for ($i=0; $i < count($basket['basket']); $i++) { 

			// Если id выбранного круиза совпадает с id круиза в корзине
			if($basket['basket'][$i]['cruis_id'] == $cruis['id']){
				// меняем количество и общую стоимость товара в корзине
				$basket['basket'][$i]['days'] = $cruis['days'];

				$cost = $cruis['days'] * $cruis['price'];
				
			}
		}
	}

	// Преобразование массива в формат json
	$jsonProduct = json_encode($basket);

	// Очистка куки
	setcookie("basket", "", 0, "/");

	// Добавляем куки
	setcookie("basket", $jsonProduct, time() + 60 * 60, "/");

	// это эхо нам будет показано в аякс запросе, кол. товаров
	echo json_encode([
		"cost" => $cost
	]);
}
?>