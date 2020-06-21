<!-- ===================================
Файл для вывода подробной инфо о заказах
=====================================-->

<?php
//название раздела
$page = "orders"; 
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';

// Если пришел get запрос
if (isset($_GET['id'])) {
	$sql = "SELECT orders.time, orders.cruis_list, orders.status, orders.id id_ord, users.*
		FROM orders, users 
		WHERE orders.user_id = users.id
		AND orders.id=" . $_GET['id'];
	$result = $conn->query($sql);
	$row_ord = mysqli_fetch_assoc($result);
}
?>

<div class="main-panel" id="main-panel">
	<!-- breadcrumb block-->   
	<nav class="navbar navbar-expand-lg navbar-transparent bg-primary navbar-absolute">
	    <div class="container-fluid">
	      <nav aria-label="breadcrumb">
	          <ol class="breadcrumb">
	          	<li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>
	            <li class="breadcrumb-item"><a href="/admin/orders.php">Orders</a></li>
	            <li class="breadcrumb-item active">INFO</li>
	          </ol>
	      </nav>
	    </div>
	</nav>
	  <!--End breadcrumb block-->
	<br><br><br><br><br>
	<!--Table-->

	<!-- ===================================
	Блок с формой для просмотра с иформации
	=====================================-->
	<div class="content">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="card">
	            	<div class="card-header">
	                    <h4 class="card-title">Details</h4>
	                </div>

	                <div class="card-body">
	                    <form method="GET" active="" id="form-edit-products" enctype="multipart/form-data">
	                      <div class="row">
                    		<div class="col-md-3 pr-1">
			                    <div class="form-group">
			                        <label for="form_name">Name</label>
			                        <input type="text" name="name" class="form-control" disabled="" id="form_name" value="<?= $row_ord['name'] ?>">
			                    </div>
			                </div>
			                <div class="col-md-3 pr-1">
			                    <div class="form-group">
			                        <label for="form_email">Email</label>
			                        <input type="text" name="mail" class="form-control" disabled="" id="form_email" value="<?= $row_ord['email'] ?>">
			                    </div>
			                </div>
			                <div class="col-md-2 pr-1">
			                    <div class="form-group">
			                        <label for="form_phone">Phone</label>
			                        <input type="text" name="phone" class="form-control" disabled="" id="form_phone" value="<?= $row_ord['phone'] ?>">
			                    </div>
			                </div>
			                <div class="col-md-1 pr-1">
			                    <div class="form-group">
			                        <label for="form_email">Order id</label>
			                        <input type="text" name="mail" class="form-control" disabled="" id="form_email" value="<?= $row_ord['id_ord'] ?>">
			                    </div>
			                </div>
			                <div class="col-md-2 pr-1">
			                    <div class="form-group">
			                        <label for="form_email">Order time</label>
			                        <input type="text" name="mail" class="form-control" disabled="" id="form_email" value="<?= $row_ord['time'] ?>">
			                    </div>
			                </div>
						  </div>
						</form>
					</div><!-- ./card-body -->
					
					<div class="table-responsive">
		                <table class="table">
		                    <thead class=" text-primary">
		                      <th>id</th>
		                      <th>Departs date</th>
		                      <th>Title</th>
		                      <th>Category</th>
                   			  <th>Destination</th>
		                      <th>Day</th>
                    		  <th>Price</th>
		                    </thead>
		                    <?php
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
						    	  	<td class="center"><?php echo $cruise['id']; ?></td>
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
						    }
			                      ?>
		                </table>
	                </div>
	                <div class="container">
					  <div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							 <?php
			            	if ($row_ord['status'] == "0") {
			             	 ?>
				                <a href="/admin/modules/orders/change_status.php?id=<?php echo $_GET['id']; ?>" type="button" class="btn btn-danger">CLICK TO COMPLETE THE ORDER!</a>
				              	<?php
				            } else {
				            	echo "<div class=\"btn btn-success\">ORDER ALREADY DONE</div>";
				            }
				         		?>
		         			<a href="/admin/orders.php" type="button" class="btn btn-primary mb-2">Back</a>
			          </div>
				  		</div>
				  	</div> 
				</div> <!-- /.card -->
			</div> <!-- ./col-md-12 -->
		</div><!-- ./row -->
	</div>
	<!-- =======================================
	END блока с формой для просмотра с иформации
	=========================================-->
</div> <!-- ./main-panel -->

<?php 
 include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/footer.php';
?> 
