<?php
$page = "basket";

include $_SERVER['DOCUMENT_ROOT'] . "/parts/header.php";
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
?>
<!-- ##### Header ##### -->
<section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style=" background-image: url(../img/bg-img/all_cruises1.jpg);">
    <div class="bradcumbContent">
        <h2>YOUR BASKET</h2>
    </div>
</section>
<!-- ##### Header End ##### -->

<!-- ##### Container with Table Basket ##### -->
<section class="contact-form-area mb-100">
    <div class="container">

        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <div class="line-"></div>
                    <h2>Request</h2>
                </div>
            </div>
        </div>
       
        <!-- Display all selected cruises -->         
        <div class="row" id="cruises">
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
                  <th scope="col">Price, $</th>
                  <th scope="col">Costs, $</th>
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
                              <th scope="row"><?php echo $i + 1 ; ?></th>
                              <td><?php echo $cruis['title']; ?></td>
                              <td><?php echo $cruis['title_cat']; ?></td>
                              <td><?php echo $cruis['arrival']; ?> -- TO -- <?php echo $cruis['departure']; ?></td>
                              <td><?php echo $cruis['data']; ?></td>
                              <td>
                                <input type="text" name="days" size="4" 
                                        onchange="changeCountTicketsAndCosts(this.value, <?php echo $cruis['price']; ?>,
                                            <?php echo $cruis['id']; ?>)" 
                                        value="<?php echo $basket['basket'][$i]['days']; ?>">
                              </td>
                              <td><?php echo $cruis['price']; ?></td>
                              <td id="cost-<?php echo $cruis['id']; ?>">
                                <?php echo $cruis['price'] * $basket['basket'][$i]['days']; ?>
                              </td>
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

    <!-- ##### Form Basket ##### -->
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/parts/form_basket.php";
    ?>
    <!-- ##### Form Basket  End ##### -->

</section>
<!-- ##### Container with Table Basket  End ##### -->


<!-- ##### Footer Area Start ##### -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/parts/footer.php";
?>
<!-- ##### Footer Area Start   End##### -->