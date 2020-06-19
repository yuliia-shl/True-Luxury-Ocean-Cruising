<?php
//название раздела
$page = "categories";
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';


if (isset($_GET['id'])) {
	// Формируем запрос на удаление из БД
	$sql = "DELETE FROM `categories` WHERE `id` =" . $_GET['id'];
	if ($conn->query($sql)) {
		echo "<h3>successfully deleted!</h3>";
		header('Location: /admin/categories.php');
	}
}

include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?> 
