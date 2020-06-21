 <div class="palatin-buttons-area mb-50">
    <h2 class="pt-4">Sort
        <?php
        $sql_cruises = "SELECT * FROM cruises";
        $result_cruises = $conn->query($sql_cruises);
        /* определяем количество круизов в БД */
        $count_cruises = $result_cruises->num_rows;
        $count_page = ceil( $count_cruises / 6 );

        $sql = "SELECT * FROM categories";
        $result = $conn->query($sql);
        ?>
            <div id="categori-<?php echo 0; ?>" 
                    class="btn palatin-btn m-2 categori" 
                    data-linkcat="/modules/categories/page_cruis.php?cat_id=all" 
                    onclick="sortCategori(this, 0, <?php echo $result->num_rows; ?>);">
                    All
                        
            </div>
        
        <?php

        while( $categories = mysqli_fetch_assoc( $result ) ) {
            ?>
            
            <div id="categori-<?php echo $categories['id']; ?>" 
                    class="btn palatin-btn m-2 categori" 
                    data-linkcat="/modules/categories/page_cruis.php?cat_id=<?php echo $categories['id']; ?>" 
                    onclick="sortCategori(this, <?php echo $categories['id']; ?>, <?php echo $result->num_rows; ?>,
                    <?php echo $count_page; ?>);">

                    <?php echo $categories['title']; ?>
                        
            </div>
            
            <?php
        }

        ?>

       
    </h2>
</div>