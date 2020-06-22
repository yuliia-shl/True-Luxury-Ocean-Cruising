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
	if($_POST['title'] != "" && $_POST['days'] != "" && $_POST['price'] != "" && $_POST['desc'] != ""){

		// Формируем запрос на добавление в БД
		$sql = "INSERT INTO cruises (id, title, data, days, price, destinations_id, description, images) 
		VALUES (null, '" . $_POST["title"] . "', current_timestamp(), '" . $_POST["days"] . "', '" . $_POST["price"] . "', '" . $_POST["destinations_id"] . "',  '" . $_POST["desc"] . "', '". $_FILES['images']['name'] ."')";
		echo $sql;
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
                        <label for="price">Price per night, $</label>
                        <input type="text" name="price" class="form-control">
                      </div>
            	        <div class="form-group">
                        <label for="destinations">Destinations</label>
                        <select name="destinations_id" class="form-control">
                        	<?php
                            $sql = "SELECT * FROM `destinations`";
                            $result = $conn->query($sql);

                            while ($destinations = mysqli_fetch_assoc($result)){
                                echo "<option value='". $destinations['id'] ."'>'". $destinations['arrival'] ." TO " . $destinations['departure'] . "'</option>";
                            }
	                        ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea type="text" name="desc" class="form-control"></textarea>
                      </div>
                      <div>
                        <p>Change pictures</p>
                        <input name="images" type="file" />
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