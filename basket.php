<?php
$page = "basket";

include $_SERVER['DOCUMENT_ROOT'] . "/parts/header.php";
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
?>
<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style=" background-image: url(../img/bg-img/all_cruises3.jpg);">
    <div class="bradcumbContent">
        <h2>Your Basket</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Container with Table Basket ##### -->
<section class="rooms-area section-padding-100-0">
    <div class="container">
       
        <!-- Display all selected cruises -->         
        <div class="row" id="products">
            <!-- Таблица выбранных товаров -->  
            <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Categories</th>
                  <th scope="col">Destinations</th>
                  <th scope="col">Data</th>
                  <th scope="col">Days</th>
                  <th scope="col">Tickets</th>
                  <th scope="col">Price</th>
                  <th scope="col">Costs</th>
                  <th scope="col">Options</th>
                </tr>
              </thead>
              <tbody>
                <?php
                
                    // Если корзина заполнена
                    if( isset($_COOKIE['basket']) ){

                        // Преобразовываем json формат в массив
                        $basket = json_decode( $_COOKIE['basket'], true );

                        //выводим из КУКИ какие товары были заказаны
                        // Перебераем массив basket
                        for ($i=0; $i < count( $basket['basket'] ); $i++) { 

                            $sql = "SELECT cruises.*, destinations.arrival, destinations.departure, categories.title title_cat
                                    FROM cruises, destinations, categories
                                    WHERE cruises.destinations_id = destinations.id && 
                                        destinations.categori_id = categories.id &&
                                    cruises.id=" . $basket['basket'][$i]['cruis_id'];
                            // Выполняем запрос
                            $result = $conn->query($sql);
                            // Получаем массив по круизу
                            $cruis = mysqli_fetch_assoc($result);
                            ?>
                            <tr>
                              <th scope="row"><?php echo $i + 1; ?></th>
                              <td><?php echo $cruis['title']; ?></td>
                              <td><?php echo $cruis['title_cat']; ?></td>
                              <td><?php echo $cruis['arrival']; ?> TO <?php echo $cruis['departure']; ?></td>
                              <td><?php echo $cruis['data']; ?></td>
                              <td><?php echo $cruis['days']; ?></td>
                              <td>
                                <input type="text" name="ticket" size="4" 
                                        onchange="changeCountAndCosts(this.value, <?php echo $cruis['price']; ?>,
                                            <?php echo $cruis['id']; ?>)" 
                                        value="<?php echo $basket['basket'][$i]['ticket']; ?>">
                              </td>
                              <td><?php echo $cruis['price']; ?></td>
                              <td id="costs-<?php echo $cruis['id']; ?>"><?php echo $cruis['price'] * $basket['basket'][$i]['ticket']; ?></td>
                              <td><button onclick="deleteCruisBasket(this, <?php echo $cruis['id']; ?>)" class="btn btn-danger">Delete</button></td>
                            </tr>

                            <?php
                        }
                    }
                    
                ?>
                
              </tbody>
            </table>
        </div>
    </div>
</section>
<!-- ##### Container with Table Basket  End ##### -->



<!-- ##### Footer Area Start ##### -->
<?php

include $_SERVER['DOCUMENT_ROOT'] . "/parts/footer.php";

?>