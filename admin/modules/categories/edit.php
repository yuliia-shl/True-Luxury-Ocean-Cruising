<!-- ============================
Файл для редактирования Категорий
==============================-->
<?php
//название раздела
$page = "categories";
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';

// Если пришел get запрос, после нажатия на кнопку edit
if(isset($_GET['id'])){
	// Берем все данные из таблици categories где id=$_GET["id"]
    $sql = "SELECT * FROM categories WHERE id=" . $_GET["id"];
    $result_cat = $conn->query($sql); // Выполняем запрос в БД
    
    // Если строки с sql запроса были найдены
    if ($result_cat->num_rows > 0) {  
    	// присваюем переменной  row_cat полученный массив 
        $row_cat = mysqli_fetch_assoc($result_cat);
    }
}

// Если была нажата кнопка Изменить и поле Название не пустое
if ( isset($_POST["edit"]) && $_POST["title"] != ""  ) {
	// Формируем запрос на добавление в БД
	$sql = "UPDATE categories SET title = '" . $_POST["title"] . "' WHERE id= '" . $_GET["id"] . "'";;
	if ( $conn->query($sql) ) {
		// echo "<h3>successfully edited!</h3>";
		// Перезагружаем эту же страничку
		header("Location: /admin/modules/categories/edit.php?id=" . $_GET['id']);
	} else {
        echo "<h2>Error!</h2>";
    }
}
?>

<div class="main-panel" id="main-panel">
	<!-- breadcrumb block-->
	<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
	    <div class="container-fluid">   
			<nav aria-label="breadcrumb">
	          	<ol class="breadcrumb">
	            	<li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>
	            	<li class="breadcrumb-item"><a href="/admin/categories.php">Categories</a></li>
	            	<li class="breadcrumb-item active">Edit Category</li>
	          	</ol>
		    </nav>
		</div>
	</nav>
	<!-- End breadcrumb block-->
	<br><br><br><br><br>
	<!-- =======================
	Блок с формой для редактирования
	=========================-->
	<div class="content">
	    <div class="row">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">
	                    <h4 class="card-title">Edit Category</h4>
	                </div>
	                <div class="card-body">
	                    <form method="POST" active="" id="form-edit-products" enctype="multipart/form-data">
	                      <div class="form-group">
	                        <label for="title">Title</label>
	                        <input type="text" name="title" class="form-control" value="<?php echo $row_cat['title']; ?>" required>
	                      </div>
	                     
	                      <button type="submit" name="edit" id="submit" class="btn btn-primary mb-2">Edit</button>

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