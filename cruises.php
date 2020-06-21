<?php
$page = "cruises";
include $_SERVER['DOCUMENT_ROOT'].'/configs/configs.php';
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT']. "/parts/header.php";

?>
<!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style=" background-image: url(../img/bg-img/all_cruises3.jpg);">
        <div class="bradcumbContent">
            <h2>All Cruises</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
    
    <section class="rooms-area section-padding-0-0">
        <div class="container">
           <!-- ##### Buttons ##### -->
                    <!-- Buttons -->
                    <div class="palatin-buttons-area mb-50">
                        <h2 class="pt-4">Sort
                            <a href="#" class="btn palatin-btn m-2">All</a>
                            <a href="#" class="btn palatin-btn m-2">Category 1</a>
                            <a href="#" class="btn palatin-btn m-2">Category 2</a>
                            <a href="#" class="btn palatin-btn m-2">Category 3</a>
                        </h2>
                    </div>
            <div class="row justify-content-center" id="list-cruises">
                <?php

                    $sql = "SELECT cruises.*, destinations.departure, destinations.arrival  
                            FROM cruises, destinations 
                            WHERE cruises.destinations_id = destinations.id 
                            LIMIT 6";

                    $result = $conn->query($sql);

                    while( $cruis = mysqli_fetch_assoc($result) ){

                        //выводим карточку товара
                        include $_SERVER['DOCUMENT_ROOT'] . "/parts/cruis_card.php";
                    }

                    ?>
                
            </div>
        </div>
    </section>
    <!-- ##### Rooms Area End ##### -->

    

    <!-- ##### Footer Area Start ##### -->

<?php

$num_activ_link = 0;
/* Подключаем блок с пагинацией */
include $_SERVER['DOCUMENT_ROOT'] . "/parts/pagination.php";

include $_SERVER['DOCUMENT_ROOT'] . "/parts/footer.php";

?>