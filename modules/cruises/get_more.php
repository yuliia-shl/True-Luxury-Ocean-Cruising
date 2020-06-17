<?php
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

$page = $_GET['page'];
$offset = $page * 6;

$sql = "SELECT cruises.*, destinations.departure, destinations.arrival  
                            FROM cruises, destinations 
                            WHERE cruises.destinations_id = destinations.id 
                            LIMIT 6 
                            OFFSET " . $offset;

$result = $conn->query($sql);

while( $cruis = mysqli_fetch_assoc($result) ){

	//выводим карточку товара
	include $_SERVER['DOCUMENT_ROOT'] . "/parts/cruis_card.php";
}

?>