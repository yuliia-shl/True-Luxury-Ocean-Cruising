<?php

include $_SERVER['DOCUMENT_ROOT'] . "/parts/header.php";
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
?>
<!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style=" background-image: url(../img/bg-img/all_cruises3.jpg);">
        <div class="bradcumbContent">
            <h2>All Cruises</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
    
    <section class="rooms-area section-padding-100-0">
        <div class="container">
           

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