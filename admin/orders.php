<!-- ============================
Файл для вывода Заказов из БД
==============================-->
<?php
	//название раздела
	$page = "orders";
	include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
	include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';
?>

<div class="main-panel" id="main-panel">
	<!--breadcrumb block-->
	<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
	    <div class="container-fluid">       
	      	<nav aria-label="breadcrumb">
	          	<ol class="breadcrumb">
	            	<li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>
	            	<li class="breadcrumb-item active">Orders</li>
	          	</ol>
	      	</nav>
	    </div>
	</nav>
	<!--End breadcrumb block-->
	<br><br><br><br><br>
  
	<!--Table-->
	<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
				<div class="card-body">
	                <div class="table-responsive">
	                	<div class="card-header ">
						<!-- <div class="btn btn-success"> -->
							<h5 class="card-title">Orders</h5>
						</div>

		                <table class="table">
		                    <thead class=" text-primary">
		                      <th>id</th>
		                      <th>Cruises</th>
		                      <th>User name</th>
		                      <th>Phone</th>
		                      <th>Address</th>
		                    </thead>
		                    <tbody>
	                    	  <?php
	                    		$sql = "SELECT orders.*, users.name, users.phone
	                    				FROM orders, users 
	                    				WHERE orders.user_id = users.id";
	                    		$result = $conn->query($sql);

	                    		while( $order_info = mysqli_fetch_assoc($result) ) {

	                    			
			                      ?>
			                      <tr>
			                        <td><?php echo $order_info['id']; ?></td>
			                        <td>

			                        	<!-- Table List Cruises -->
			                        	<table class="table">
						                    <thead class="thead-light">
						                      <th>Title</th>
						                      <th>Data</th>
						                      <th>Days</th>
						                      <th>Cost</th>
						                    </thead>
						                    <tbody>
   
				                        	<?php 
				                        	$orders = json_decode($order_info['cruis_list'], true);

				                        	$i = 0;
				                        	

				                        	while( $i < count($orders['basket'])){

				                        		$sql_cruis = "SELECT * FROM cruises WHERE id= '" . $orders['basket'][$i]['cruis_id'] . "'";
				                        		$result_cruis = $conn->query($sql_cruis);

				                        		while( $cruis = mysqli_fetch_assoc($result_cruis) ){
				                        			
				                        			?>

				                        			 <tr class="table-warning	">
								                        <td ><?php echo $cruis['title']; ?></td>
								                        <td><?php echo $cruis['data']; ?></td>
								                        <td><?php echo $orders['basket'][$i]['days']; ?></td>
								                        <td>
								                        	<?php echo $cruis['price'] * $orders['basket'][$i]['days']; ?>
								                        	<br>/<?php echo  $orders['basket'][$i]['days'];  ?> days
								                        </td>
								                        	
								                    </tr>

										            <?php
				                        		}

				                        		$i++;
				                        	}

				                        	?>
				                        		</tbody>
							                </table>
			                        </td>
			                        <td><?php echo $order_info['name']; ?></td>
			                        <td><?php echo $order_info['phone']; ?></td>
			                        <td><?php echo $order_info['address']; ?></td>
			                       
			                        <td> 
                                        <div class="btn-group" role="group">
                                          <div id="orders-new-<?php echo $order_info['id']; ?>" 
                                            class="btn <?php if($order_info['status'] == 0){ echo "btn-success"; }else{ echo "btn-danger"; }?>" onclick="changeStatus(<?php echo $order_info['id']; ?>, 0)">New</div>

                                          <div id="orders-sent-<?php echo $order_info['id']; ?>" 
                                            class="btn <?php if($order_info['status'] == 1){ echo "btn-success"; }else{ echo "btn-danger"; }?>" onclick="changeStatus(<?php echo $order_info['id']; ?>, 1)">Sent to customer</div>
                                          
                                        </div>
                                    </td>
			                      </tr>
				                  <?php
		                     	}
	                    	  ?>
		                    </tbody>
		                </table>
	                </div>
	              </div>
              </div>
            </div>
        </div>
    </div>
    <!--End Table-->
</div>

<script src="assets/js/main.js"></script>

<?php
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/footer.php';
?>