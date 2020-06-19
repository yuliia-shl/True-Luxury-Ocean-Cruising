
<?php
$page = "categories";
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';

// // Если была нажата кнопка Добавить и поле Название не пустое
if ( isset($_POST["add"]) && $_POST["title"] != ""  ) {
		// Формируем запрос на добавление в БД
		$sql = "INSERT INTO categories (title) VALUES ('" . $_POST["title"] . "')";
		if ( $conn->query($sql) ) { // Если запрос выполнился успешно 
			echo "<h3>successfully added!</h3>";
			header('Location: /admin/categories.php');
		} else {
	        echo "<h2>Error!</h2>";
	    }
}

?>


<div class="main-panel" id="main-panel">
	<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
	    <div class="container-fluid">   
			<nav aria-label="breadcrumb">
	          	<ol class="breadcrumb">
	            	<li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>
	            	<li class="breadcrumb-item"><a href="/admin/categories.php">Categories</a></li>
	            	<li class="breadcrumb-item active">Add Category</li>
	          	</ol>
		    </nav>
		</div>
	</nav>
	<br><br><br><br><br>
	
	<!-- =======================
	Блок с формой для добавления
	=========================-->
	<div class="content">
	    <div class="row">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">
	                    <h4 class="card-title">Add Category</h4>
	                </div>
	                <div class="card-body">

	                    <form method="POST" active="" id="form-edit-products" enctype="multipart/form-data">
	                      
	                      <div class="form-group">
	                        <label for="title">Title</label>
	                        <input type="text" name="title" class="form-control">
	                      </div>
	                     
	                      <button type="submit" name="add" id="submit" class="btn btn-primary mb-2">Add</button>
	                      <!-- <button type="submit" name="back" class="btn btn-primary mb-2">Back</button> -->
	                      <a href="/admin/categories.php" type="button" class="btn btn-primary mb-2">Back</a>
	                    </form>
	                </div>
	            </div>     
	      	</div> <!-- col-md-8 --> 
	    </div> <!-- End row --> 
	</div> <!-- End content --> 
	<!-- ===========================
	end Блок с формой для добавления 
	==============================-->
</div><!-- End main-panel --> 


<?php
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?>