<!-- ============================
Файл для изменения статуса письма
==============================-->

<?php
//название раздела
$page = "request_info"; 
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';

// Если пришел get запрос
if (isset($_GET['id'])) {
	$sql = "UPDATE message SET status = 'DONE' WHERE id=" . $_GET['id'] . ";";
	// Если запрос выполнился успешно 
	if ($conn->query($sql)) {
		header("Location: /admin/request_info.php");
	}
}
?>

<?php 
 include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/footer.php';
?> 