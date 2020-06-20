<!-- ================================
Файл Вывода заказов в Личном кабинете
==================================-->
<?php

// Если пользователь авторизован
if(isset($_COOKIE['login'])) {
	// вытягиваем из БД users где user_id совпадают с куки
	// вытягиваем из БД orders где user_id совпадают с куки
    $sql_us = "SELECT * FROM users WHERE id =" . $_COOKIE["login"];
    $result_us = $conn->query($sql_us);
    $users = mysqli_fetch_assoc($result_us);


	// вытягиваем из БД orders где user_id совпадают с куки
	// вытягиваем из БД user с таким же айди, как user_id в orders
	$sql_ord = "SELECT * FROM orders WHERE user_id=" . $users ['id'];
    $result_ord = $conn->query($sql_ord);
    $row_ord = mysqli_fetch_assoc($result_ord);



	// Если масив заказа существует
    if (isset($row_ord['cruis_list'])) {
        // помещаем в переменную массив из БД (преобразованный из json формата) 
        $cruise_order = json_decode($row_ord['cruis_list'], true);

        // подсчитываем сколько в массиве обьектов и сколько значений у обьектов
        for ($i = 0; $i < count($cruise_order['basket']); $i++) {
            // Вытягиваем инфо из 3х таблиц
            $sql_cru = "SELECT cruises.*, destinations.departure, destinations.arrival, categories.title cat_title
	            FROM cruises, destinations, categories
	            WHERE cruises.id= '" . $cruise_order['basket'][$i]['cruis_id'] . "'  AND cruises.destinations_id = destinations.id AND destinations.categori_id = categories.id";
	        // Получаем результат
            $result_cru = $conn->query($sql_cru);
            $cruise = mysqli_fetch_assoc($result_cru);
          ?>
    	  <tbody>
			<td class="center"><?php echo $cruise['data']; ?></td>
            <td class="left"><?php echo $cruise['title']; ?></td>
            <td class="left"><?php echo $cruise['cat_title']; ?></td>
            <td class="left"><?php echo $cruise['departure']; ?> TO <?php echo $cruise['arrival']; ?></td>
            <td class="right"><?php echo $cruise_order['basket'][$i]['days']; ?></td>
            <td class="center"><?php echo number_format ($cruise['price'] * $cruise_order['basket'][$i]['days'],2, ',' , ' '); ?></td>
          </tbody>
			<!--Table body-->
          <?php
        }
    } else {
    	echo "<p>You currently have no booked cruises. Please use the <a style=\"color: blue\" href=\"/cruises.php\"> cruise finder </a> to find cruises you are interested in and use the Book Cruise link to add them to your order list.</p>";
    }
}
?>
