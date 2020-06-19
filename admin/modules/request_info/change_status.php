<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
$page = "request_info"; 
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';

if (isset($_GET['id'])) {
	$sql = "UPDATE message SET status = 'Sent' WHERE id=" . $_GET['id'] . ";";
if ($conn->query($sql)) {
	header("Location: /admin/request_info.php");
}
}
?>

<?php 
 include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/footer.php';
?> 