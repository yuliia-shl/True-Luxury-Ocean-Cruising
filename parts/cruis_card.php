<!-- Карточка с круизом -->
<div class="col-12 col-md-6 col-lg-4">

    <div class="single-rooms-area wow fadeInUp" data-wow-delay="100ms">
        <!-- Thumbnail -->
        <div class="bg-thumbnail bg-img" style="background-image: url(/img/bg-img/<?php echo $cruis['images']; ?>);"></div>
        <!-- Price -->
        <p class="price-from">From $<?php echo $cruis['price']; ?>/night</p>
        <!-- Rooms Text -->
        <div class="rooms-text">
            <div class="line"></div>
            <!-- Ccылка на страничку с круизом -->
            <h4><a href="#"<?php echo $cruis['title']; ?></a></h4>

            <p><?php echo $cruis['data']; ?></p>
            <p><?php echo $cruis['days']; ?> days/$<?php echo $cruis['price'] * $cruis['days']; ?></p>
            <p><?php echo $cruis['departure']; ?> TO <?php echo $cruis['arrival']; ?></p>
          
        </div>

        <!-- Add to the basket -->
        <button class="book-room-btn btn palatin-btn" onclick="addToBasket(this)" data-id="<?php echo $cruis['id'];?>">request a quote</button>
    </div>
</div>