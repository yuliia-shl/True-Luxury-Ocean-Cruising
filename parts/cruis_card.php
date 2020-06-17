<!-- Карточка с круизом -->
<div class="col-12 col-md-6 col-lg-4">

    <div class="single-rooms-area wow fadeInUp" data-wow-delay="100ms">
        <!-- Thumbnail -->
        <div class="bg-thumbnail bg-img" style="background-image: url(img/bg-img/<?php echo $cruis['images']; ?>);"></div>
        <!-- Price -->
        <p class="price-from">From $<?php echo $cruis['price']; ?>/night</p>
        <!-- Rooms Text -->
        <div class="rooms-text">
            <div class="line"></div>
            <h4><?php echo $cruis['title']; ?></h4>
            <p><?php echo $cruis['data']; ?></p>
            <p><?php echo $cruis['days']; ?> days/$<?php echo $cruis['price'] * $cruis['days']; ?></p>
            <p><?php echo $cruis['departure']; ?> TO <?php echo $cruis['arrival']; ?></p>
          
        </div>
        <!-- Book Room -->
        <a href="#" class="book-room-btn btn palatin-btn">request a quote</a>
    </div>
</div>