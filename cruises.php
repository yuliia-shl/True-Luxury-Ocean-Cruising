<?php

include $_SERVER['DOCUMENT_ROOT'] . "/parts/header.php";
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
?>
    
    <section class="rooms-area section-padding-100-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-6">
                    <div class="section-heading text-center">
                        <div class="line-"></div>
                        <h2>All Cruises</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris sceleri sque, at rutrum nulla dictum. Ut ac ligula sapien.</p>
                    </div>
                </div>
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