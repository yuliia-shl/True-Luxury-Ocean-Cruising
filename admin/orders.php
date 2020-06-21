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
	<nav class="navbar navbar-expand-lg navbar-transparent bg-primary navbar-absolute">
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
							<h5 class="card-title">Orders</h5>
						</div>

		                <table class="table">
		                    <thead class=" text-primary">
		                      <th>id</th>
		                      <!-- <th>Cruises</th> -->
		                      <th>User name</th>
		                      <th>Phone</th>
		                      <th>Email</th>
                   			  <th>Time</th>
		                      <th>Options</th>
                    		  <th>Status</th>
		                      <!-- <th>Address</th> -->
		                    </thead>
		                    <!--Table body-->
		                    <tbody>
	                    	  <?php
	                    		$sql = "SELECT orders.*, users.*
	                    				FROM orders, users 
	                    				WHERE orders.user_id = users.id";
	                    		$result = $conn->query($sql);

	                    		while( $order_info = mysqli_fetch_assoc($result) ) {
			                      ?>
			                      <tr>
			                        <td><?php echo $order_info['id']; ?></td>
			                        <td><?php echo $order_info['name']; ?></td>
			                        <td><?php echo $order_info['phone']; ?></td>
			                        <td><?php echo $order_info['email']; ?></td>
			                        <td><?php echo $order_info['time']; ?></td>
			                        <td>
			                          <div class="btn-group" role="group" aria-label="Basic example">
			                            <a href="/admin/modules/orders/details.php?id=<?php echo $order_info ['id'] ?>" type="button" class="btn btn-outline-primary">INFO</a>
			                          </div>
			                        </td>
			                        <td> 
			                          <div class="btn-group" role="group" aria-label="Basic example">
			                            <?php
			                              if ($order_info['status'] == "0") {
			                                echo "<div class=\"btn btn-danger\">NEW!</div>";
			                              } else {
			                                echo "<div class=\"btn btn-success\">DONE</div>";
			                              }
			                            ?>
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