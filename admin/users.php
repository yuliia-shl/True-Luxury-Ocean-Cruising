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
              <!-- <li class="breadcrumb-item"><a href="/admin/category.php">Category</a></li> -->
            <li class="breadcrumb-item active">Users</li>
          </ol>
      </nav>
    </div>
  </nav>
  <br><br><br><br><br>
  <!--Table-->
	<div class="card-body table-full-width table-responsive">  
		<table class="table table-striped w-auto">
		  <!--Table head-->
		  <thead>
		    <tr>
		      <th>#id</th>
		      <th>Name</th>
		      <th>Phone</th>
		      <th>Email</th>
		      <th>Verification</th>
		    </tr>
		  </thead>
		  <!--Table head-->

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
			                ?>
			              	<td>YES</td> 
			                <?php
			              } else {
			                ?>
			              	<td>NO</td>
			                <?php  
			              }
			              ?>
                        <!-- <td><?php echo $row ['email'] ?></td> -->
                    </tr>
                  <?php
                }
            ?>
		  </tbody>
		  <!--Table body-->
		</table>
	</div>
	<!--Table-->
</div>


<?php
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/footer.php';
?>