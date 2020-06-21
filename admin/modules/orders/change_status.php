<!-- ============================
Файл для изменения статуса заказа
==============================-->
<?php
//название раздела
$page = "orders"; 
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';

// Если пришел get запрос
if (isset($_GET['id'])) {
	$sql = "UPDATE orders SET status = '1' WHERE orders.id=" . $_GET['id'];
	// Если запрос выполнился успешно 
	if ($conn->query($sql)) {
		header("Location: /admin/orders.php");
	} else {
		echo "<h2>error</h2>";
	}
}
?>
