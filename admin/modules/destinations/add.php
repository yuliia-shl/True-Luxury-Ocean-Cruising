<!-- ==========================
Файл для добавления Направлений
============================-->
<?php
	//название раздела
	$page = "destinations";
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
	include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';

// Если пришел get запрос, после нажатия на кнопку ADD
if(isset($_GET['id'])){

	// Берем все данные из таблици destinations где id=$_GET["id"]
    $sql = "SELECT * FROM destinations WHERE id=" . $_GET["id"];
    $categories = $conn->query($sql); // Выполняем запрос
    
    // Если строки с sql запроса были найдены
    if ($categories->num_rows > 0) {  
    	// присваиваем переменной des_info полученный массив 
        $des_info = mysqli_fetch_assoc($categories);
    }
}

// Если была нажата кнопка вернуться назад
if(isset($_POST['back'])) {
	// Делаем переадресацию на страницу destinations.php
  	header("Location: /admin/destinations.php");
}

// Если была нажата кнопка редактировать
if(isset($_POST['add'])){
	// Если поля все заполнены
	if($_POST['categori_id'] != "" && $_POST['departure'] != "" && $_POST['arrival'] != "" ){

		// Делаем запрос на добавление направления
		$sql = "INSERT INTO destinations (`id`, `categori_id`, `departure`, `arrival`) 
          		VALUES ( null ,'". $_POST['categori_id'] ."','". $_POST['departure'] ."','". $_POST['arrival'] ."')";       

        // Если запрос выполнился успешно 
	  	if( $conn->query($sql) ){
	  		//делаем переадресацию на странице destinations.php
	  		header("Location: /admin/destinations.php");
	  	}
	}
}

?>


<div class="main-panel" id="main-panel">
	<!--End breadcrumb block-->
	<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
	    <div class="container-fluid">   
			<nav aria-label="breadcrumb">
	          	<ol class="breadcrumb">
	            	<li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>
	            	<li class="breadcrumb-item"><a href="/admin/destinations.php">Destinations</a></li>
	            	<li class="breadcrumb-item active">ADD NEW</li>
	          	</ol>
		    </nav>
		</div>
	</nav>
	<!--End breadcrumb block-->
	<br><br><br><br><br>

	<!-- =======================
	Блок с формой для добавления
	=========================-->
	<div class="content">
	    <div class="row">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">
	                    <h4 class="card-title">Add Destination</h4>
	                </div>
	                <div class="card-body">
	                    <form method="POST" active="" id="form-edit-products" enctype="multipart/form-data">
	                      <div class="form-group">
	                        <label for="arrival">Arrival</label>
	                        <input type="text" name="arrival" class="form-control" id="arrival" value="" required>
	                      </div>
	                      <div class="form-group">
	                        <label for="departure">Departure</label>
	                        <input type="text" name="departure" class="form-control" id="departure" value="" required>
	                      </div>
	                      <div class="form-group">
	                        <label for="categori_id">Сategory</label>
	                        <select name="categori_id" class="form-control" >  
		                        <?php
		                            $categories = "SELECT * FROM `categories`";
		                            $result_categories = $conn->query($categories);

		                            while ($categorie = mysqli_fetch_assoc($result_categories)){
		                                echo "<option value='". $categorie['id'] ."'>". $categorie['title'] ."</option>";
		                            }
		                        ?>
	                        </select>
	                      </div>
	                      <button type="submit" name="add" id="submit" class="btn btn-primary mb-2">Add</button>
	                      <button type="submit" name="back" class="btn btn-primary mb-2">Back</button>
	                    </form>
	                </div>
	            </div>     
	      </div>
	    </div>    
	</div>
	<!-- ===========================
	end Блок с формой для добавления
	==============================-->
</div>


<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?> 