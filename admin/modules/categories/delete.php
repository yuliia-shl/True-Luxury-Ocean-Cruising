<!-- ======================
Файл для Удаления Категорий
=========================-->
<?php
//название раздела
$page = "categories";
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';

// Если пришел get запрос, после нажатия на кнопку delete
if (isset($_GET['id'])) {
	// Формируем запрос на удаление из БД
	$sql = "DELETE FROM `categories` WHERE `id` =" . $_GET['id'];
	// Если запрос выполнился успешно 
	if ($conn->query($sql)) {
		echo "<h3>successfully deleted!</h3>";
		header('Location: /admin/categories.php');
	}
}

?> 
