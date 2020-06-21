<!-- =============================
Файл отдельной карточки с круизом
===============================-->

<?php
// Название раздела (страницы)
$page = "cruises";
include $_SERVER['DOCUMENT_ROOT'].'/parts/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';

if(isset($_GET['id'])){
    $sql = "SELECT cruises.*, destinations.departure, destinations.arrival  
            FROM cruises, destinations 
            WHERE  cruises.id= '" . $_GET["id"] . "' AND cruises.destinations_id = destinations.id";
            $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $cruis = mysqli_fetch_assoc($result);
      ?>
        <!-- ##### Breadcumb Area Start ##### -->
        <section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style="  background-image: url(/img/bg-img/<?php echo $cruis['images']; ?>);">
            <div class="bradcumbContent">
                <!-- Post Title -->
                <h2><?php echo $cruis['title']; ?></h2>
            </div>
        </section>
        <!-- ##### Breadcumb Area End ##### -->

        <!-- ##### Book Now Area Start ##### -->
        <div class="book-now-area">
            <!-- Button -->
            <!-- <button type="submit">Book Now</button> -->
        </div>

        <!-- ##### Blog Area Start ##### -->
        <div class="blog-area section-padding-0-100">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="palatin-blog-posts">
                    <!-- ##### Single Blog Post ##### -->
                    <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Post Content -->
                        <div class="post-content">
                        <!-- Post Date-->
                        <a href="#" class="post-date btn palatin-btn"><?php echo $cruis['data']; ?></a>

                        <!-- Post Destination -->
                        <a href="#" class="post-title"><?php echo $cruis['departure']; ?> TO <?php echo $cruis['arrival']; ?></a>
                        <!-- Post Meta -->
                        <div class="post-meta d-flex justify-content-center">
                            <!-- Days -->
                            <a href="#" class="post-catagory"><?php echo $cruis['days']; ?> days</a>
                            <!-- Price -->
                            <a href="#" class="post-comments">$ <?php echo $cruis['price'] * $cruis['days']; ?></a>
                        </div>
                        
                        <!-- Description -->
                        <p><?php echo $cruis['description']; ?></p>
                        </div>
                    </div>
                </div>
              </div>
              <div class="col-12">
                <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="700ms">
                    <button class="book-room-btn btn palatin-btn" onclick="addToBasket(this)" data-id="<?php echo $cruis['id'];?>">BOOK NOW</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ##### Blog Area End ##### -->
      <?php
    }
}
?>

<!-- ##### Footer Area Start ##### -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/parts/footer.php";
?>