<?php
$page = "categories";
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';

?>
<div class="main-panel" id="main-panel">
	 <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
	    <div class="container-fluid">       
	      	<nav aria-label="breadcrumb">
	          	<ol class="breadcrumb">
	            	<li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>
	            	<li class="breadcrumb-item active">Categories</li>
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
						<div class="btn btn-success mb-2">
							<a href="/admin/modules/categories/add.php">ADD</a>
						</div> 

		                <table class="table">
		                    <thead class=" text-primary">
		                      <th>id</th>
		                      <th>Title</th>
		                      <!-- <th>Options</th> -->
		                    </thead>
		                    <tbody>
		                    	<?php
		                    		// Делаем вывод категорий 
									$sql = "SELECT * FROM categories";
									$result = $conn->query($sql);
									// пока есть кол-во результатов (категорий)
									while ($row = mysqli_fetch_assoc($result)) {
				                      ?>
					                    <tr>
					                        <td><?php echo $row ['id'] ?></td>
					                        <td><?php echo $row ['title'] ?></td>
					                        <td class="text-right">
					                        	<div class="btn btn-danger mb-2">
					                        		<a href="/admin/modules/categories/delete.php?id=<?php echo $row ['id']; ?>">DELETE</a>
					                        	</div>
					                        	<div class="btn btn-success mb-2">
					                        		<a href="/admin/modules/categories/edit.php?id=<?php echo $row ['id']; ?>">EDIT</a>
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

<?php
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/footer.php';
?>