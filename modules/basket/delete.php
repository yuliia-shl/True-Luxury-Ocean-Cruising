<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
/*
	1. Добавить кнопку удаления товара
	2. Пройтись по всему масиву товаров
	3. Проверить id товара и удалить товар
*/

// Если пришел ПОСТ запрос
if( isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST" ){

	// Если корзина существует
	if($_COOKIE['basket']){
		// Преобразовываем формат JSON в массив
		$basket = json_decode($_COOKIE['basket'], true);

		// Проходим циклом по всему массиву корзины
		for ($i=0; $i < count($basket['basket']); $i++) { 

			// Если выбранное id совпадает с id корзины
			if($basket['basket'][$i]['product_id'] == $_POST['id']){
				// удаляем из корзины круиз
				unset($basket['basket'][$i]);
				// сортируем массив, чтоб при удалении круиза все id перезаписались попорядку 
				// и не было пропусков в нумерации id
				sort($basket['basket']);
			}

		}

	}
	
	// Преобразование массива в формат json
	$jsonProduct = json_encode($basket);

	// Очистка куки
	setcookie("basket", "", 0, "/");

	// Добавляем куки
	setcookie("basket", $jsonProduct, time() + 60 * 60, "/");
	
	// это эхо нам будет показано в аякс запросе, кол. круизов
	echo json_encode([
		"count" => count($basket['basket'])
	]);

}
?>