<?php
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";

if( isset($_GET['cat_id']) ) {
	$cat_id = $_GET['cat_id'];
	//$offset = $page * 6;

	// Если все категории
	if($cat_id == "all"){

		$sql = "SELECT cruises.*, destinations.departure, destinations.arrival  
                            FROM cruises, destinations 
                            WHERE cruises.destinations_id = destinations.id 
                            LIMIT 6";
    // Если одна из категорий                       
	} else {
		// Выбераем круизы по определленой категории
		$sql = "SELECT cruises.*, destinations.departure, destinations.arrival, destinations.categori_id 
			FROM cruises 
			INNER JOIN destinations 
			ON cruises.destinations_id = destinations.id 
			WHERE destinations.categori_id= ". $cat_id;
	}

	$result = $conn->query($sql);

	while( $cruis = mysqli_fetch_assoc($result) ){

		//выводим карточку товара
		include $_SERVER['DOCUMENT_ROOT'] . "/parts/cruis_card.php";
	}
}


?>