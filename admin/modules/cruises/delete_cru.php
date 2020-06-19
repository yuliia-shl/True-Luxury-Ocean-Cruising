<!-- ==========================
Файл для удаления круизов
============================-->
<?php
//название раздела
$page = "cruises";
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';


if (isset($_GET['id'])) {
	// Формируем запрос на удаление из БД
	$sql = "DELETE FROM `cruises` WHERE `id` =" . $_GET['id'];
	if ($conn->query($sql)) {
		echo "<h3>successfully deleted!</h3>";
		header('Location: /admin/cruises.php');
	}
}

include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?> 
