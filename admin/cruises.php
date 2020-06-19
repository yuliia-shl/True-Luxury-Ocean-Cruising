<?php
$page = "cruises";

include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';
?>

<div class="main-panel" id="main-panel">
	 <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
	    <div class="container-fluid">       
	      	<nav aria-label="breadcrumb">
	          	<ol class="breadcrumb">
	            	<li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>
	              	<!-- <li class="breadcrumb-item"><a href="/admin/category.php">Category</a></li> -->
	            	<li class="breadcrumb-item active">Cruises</li>
	          	</ol>
	      	</nav>
	    </div>
	</nav>
	<br><br><br><br><br>

<!--Table-->
	<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
				<div class="card-body">
	                <div class="table-responsive">
						<div class="btn btn-success">
							<a href="/admin/modules/cruises/add_cru.php">Add Cruises</a>
						</div> 

		                <table class="table">
		                    <thead class="text-primary">
		                      <th>Id</th>
		                      <th>Title</th>
		                      <th>Category Title</th>
		                      <th>Data</th>
		                      <th>Days</th>
		                      <th>Price</th>
		                      <th>Arrival</th>
		                      <th>Departure</th>
		                      <th></th>
		                    </thead>
		                    <tbody>
		                    	<?php
		                    		$sql = "SELECT destinations.arrival, destinations.departure, categories.title cat_title, cruises.*
		                    				FROM destinations, categories, cruises 
		                    				WHERE categories.id = destinations.categori_id && cruises.destinations_id = destinations.id";
		                    				// echo $sql;
		                    		$result = $conn->query($sql);


		                    		while( $info = mysqli_fetch_assoc($result) ) {

				                    	?>
					                      <tr>
					                        <td><?php echo $info['id']; ?></td>
					                        <td><?php echo $info['title']; ?></td>
					                        <td><?php echo $info['cat_title']; ?></td>
					                        <td><?php echo $info['data']; ?></td>
					                        <td><?php echo $info['days']; ?></td>
					                        <td><?php echo $info['price']; ?></td>
					                        <td><?php echo $info['arrival']; ?></td>
					                        <td><?php echo $info['departure']; ?></td>
					                        <td class="text-right">
					                        	<div class="btn btn-danger"><a href="/admin/modules/cruises/delete_cru.php?id=<?php echo $info['id']; ?>">DELETE</a></div>
					                        	<div class="btn btn-success"><a href="/admin/modules/cruises/edit_cru.php?id=<?php echo $info['id']; ?>">EDIT</a></div> 
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