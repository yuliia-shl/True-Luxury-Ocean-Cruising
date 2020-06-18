<?php
/* 
1. Создать список с пагинацией - done
2. Написать запрос, узнать количество тоаров - done
3. Вывести столько ссылок сколько у нас будет товаров / 6
4. Сделать активным переключатель страниц

*/

$sql = "SELECT * FROM cruises";
$result = $conn->query($sql);
/* определяем количество товаров в БД */
$count_rows = $result->num_rows;
?>

<!-- Блок пагинации -->
<nav aria-label="Bootstrap 4" class="m-3">

    <ul class="pagination justify-content-center" id="pagination">
    	
    	<?php
    	/* определяем количество страниц с товарами */
    	$count_link = ceil( $count_rows / 6 ) - 1;
    	$num_link = 0;
    	
    	// В цикле выводим список ссылок (пагинацию)
    	while ( $num_link <= $count_link ) {
        		?>

        		<li class="page-link 
        			<?php if( $num_activ_link == 0){
        				echo 'active';
        				$num_activ_link = 1;
        			}?>" id="page-<?php echo $num_link + 1; ?>">
	        		<div id="pagination-block" data-link="/modules/cruises/get_more.php?page=<?php echo $num_link; ?>" onclick="goToPage(this);"><?php echo $num_link + 1; ?></div>
	        	</li>

        		<?php
        	$num_link ++;
        }
    	?>
       <!-- Передаем значение, общее количество страниц -->
        <input type="hidden" name="" id="cnt_link" value="<?php echo $count_link + 1; ?>">
    </ul>
</nav>