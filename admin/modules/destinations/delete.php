<?php
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

// Если пришел get запрос, после нажатия на кнопку delet
if(isset($_GET['id'])){

	// Пишем запрос на удаление выбранного направления
    $sql = "DELETE FROM `destinations` WHERE id=" . $_GET["id"];

    // Выполняем запрос
	$conn->query($sql);
    
    // Делаем переадресацию на страницу destinations.php
  	header("Location: /admin/destinations.php");
}
?>