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
                  <th scope="col">Tickets</th>
                  <th scope="col">Price</th>
                  <th scope="col">Costs</th>
                  <th scope="col">Options</th>
                </tr>
              </thead>
              <tbody>
                <?php
                /*
                    // Если корзина заполнена
                    if( isset($_COOKIE['basket']) ){

                        $basket = json_decode( $_COOKIE['basket'], true );

                        //выводим из КУКИ какие товары были заказаны
                        for ($i=0; $i < count( $basket['basket'] ); $i++) { 

                            $sql = "SELECT * FROM products WHERE id=" . $basket['basket'][$i]['product_id'];
                            $result = $conn->query($sql);
                            $product = mysqli_fetch_assoc($result);
                            ?>
                            <tr>
                              <th scope="row"><?php echo $product['id']; ?></th>
                              <td><?php echo $product['title']; ?></td>
                              <td>
                                <input type="text" name="count" 
                                        onchange="changeCountAndCosts(this.value, <?php echo $product['price']; ?>,
                                            <?php echo $product['id']; ?>)" 
                                        value="<?php echo $basket['basket'][$i]['count']; ?>">
                              </td>
                              <td><?php echo $product['price']; ?></td>
                              <td id="costs-<?php echo $product['id']; ?>"><?php echo $product['price'] * $basket['basket'][$i]['count']; ?></td>
                              <td><button onclick="deleteProductBasket(this, <?php echo $product['id']; ?>)" class="btn btn-danger">Delete</button></td>
                            </tr>

                            <?php
                        }
                    }
                    */
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