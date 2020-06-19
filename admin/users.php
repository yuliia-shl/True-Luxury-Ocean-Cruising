<?php
	$page = "users";
	include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
	include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';
?>
<div class="main-panel" id="main-panel">
	 <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
	    <div class="container-fluid">       
	      	<nav aria-label="breadcrumb">
	          	<ol class="breadcrumb">
		            <li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>
		            <li class="breadcrumb-item active">Users</li>
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
<!-- 						<div class="btn btn-success mb-2">
							<a href="/admin/modules/categories/add.php">ADD</a>
						</div>  -->

		                <table class="table">
		                    <thead class=" text-primary">
		                      <th>id</th>
						      <th>Name</th>
						      <th>Phone</th>
						      <th>Email</th>
						      <th>Verification</th>
		                      <!-- <th>Options</th> -->
		                    </thead>
		                    <!--Table body-->
						    <tbody>
						      <?php
				            	// Делаем вывод пользователей 
								$sql = "SELECT * FROM users";
								$result = $conn->query($sql);
								// пока есть кол-во результатов (пользователей)
								while ($row = mysqli_fetch_assoc($result)) {
				                  ?>
									<tr>
				                        <td><?php echo $row ['id'] ?></td>
				                        <td><?php echo $row ['name'] ?></td>
				                        <td><?php echo $row ['phone'] ?></td>
				                        <td><?php echo $row ['email'] ?></td>
				                        <?php
							              if ($row['verifided'] == "1") {
							              	echo "<td>YES</td>";  
							              } else {
							              	echo "<td>NO</td>";
							              }
							              ?>
				                    </tr>
				                  <?php
				                }
				              ?>
						    </tbody>
						    <!--Table body-->
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