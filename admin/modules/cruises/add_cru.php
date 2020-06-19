<!-- ==========================
Файл для добавления круизов
============================-->
<?php
//название раздела
$page = "cruises";
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';

// Если пришел get запрос, после нажатия на кнопку Add
if(isset($_GET['id'])){

	// Берем все данные из таблици cruises где id=$_GET["id"]
    $sql = "SELECT * FROM cruises WHERE id=" . $_GET["id"];
    $cruises = $conn->query($sql); // Выполняем запрос
    var_dump($sql);
    // Если строки с sql запроса были найдены
    if ($cruises->num_rows > 0) {  
    	// присваиваем переменной cru_info полученный массив 
        $cru_info = mysqli_fetch_assoc($cruises);
    }
}

// Если была нажата кнопка вернуться назад
if(isset($_POST['back'])) {
	// Делаем переадресацию на страницу destinations.php
  	header("Location: /admin/cruises.php");
}

// Если была нажата кнопка Добавить 
if ( isset($_POST["add"])) {
	// Если поля все заполнены
	if($_POST['title'] != "" && $_POST['days'] != "" && $_POST['price'] != "" ){

		// Формируем запрос на добавление в БД
		$sql = "INSERT INTO cruises (id, title, days, price) 
		VALUES (null, '" . $_POST["title"] . "', '" . $_POST["days"] . "', '" . $_POST["price"] . "')";
		var_dump($sql);
		 // Если запрос выполнился успешно 
	  	if( $conn->query($sql) ){
	  		//делаем переадресацию на странице cruises.php
	  		header("Location: /admin/cruises.php");
	  	}
	}
}

?>


<div class="main-panel" id="main-panel">
	<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
	    <div class="container-fluid">   
			<nav aria-label="breadcrumb">
	          	<ol class="breadcrumb">
	            	<li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>
	            	<li class="breadcrumb-item"><a href="/admin/cruises.php">Cruises</a></li>
	            	<li class="breadcrumb-item active">Add Cruise</li>
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
	                    <h4 class="card-title">Add Cruise</h4>
	                </div>
	                <div class="card-body">

	                    <form method="POST" active="" id="form-edit-products" enctype="multipart/form-data">

	                      <div class="form-group">
	                        <label for="title">Title</label>
	                        <input type="text" name="title" class="form-control">
	                      </div>
	                      <div class="form-group">
	                        <label for="days">Days</label>
	                        <input type="text" name="days" class="form-control">
	                      </div>
	                      <div class="form-group">
	                        <label for="price">Price</label>
	                        <input type="text" name="price" class="form-control">
	                      </div>
                	      <div class="form-group">
	                        <label for="arrival">Arrival</label>
	                        <select name="arrival" class="form-control">
	                        	<?php
		                            $arrival = "SELECT * FROM `destinations`";
		                            $result_arrival = $conn->query($arrival);

		                            while ($arrival = mysqli_fetch_assoc($result_arrival)){
		                                echo "<option value='". $arrival['categori_id'] ."'>'". $arrival['arrival'] ."'</option>";
		                            }
		                        ?>
	                        </select>
	                      </div>
	                      <div class="form-group">
	                        <label for="departure">Departure</label>
	                        <select name="departure" class="form-control">
	                        	<?php
		                            $destinations = "SELECT * FROM `destinations`";
		                            $result_destinations = $conn->query($destinations);

		                            while ($destinations = mysqli_fetch_assoc($result_destinations)){
		                                echo "<option value='". $destinations['categori_id'] ."'>'". $destinations['departure'] ."'</option>";
		                            }
		                        ?>
	                        </select>
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
	                      <!-- <button type="submit" name="back" class="btn btn-primary mb-2">Back</button> -->
	                      <a href="/admin/cruises.php" type="button" class="btn btn-primary mb-2">Back</a>
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