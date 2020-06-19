<!-- ==============================
Файл для редактирования Направлений
================================-->
<?php
	//название раздела
	$page = "destinations";
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
	include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';

// Если пришел get запрос, после нажатия на кнопку edit
if(isset($_GET['id'])){

	// Берем все данные из таблици destinations где id=$_GET["id"]
    $sql = "SELECT * FROM destinations WHERE id=" . $_GET["id"];
    $categories = $conn->query($sql); // Выполняем запрос
    
    // Если строки с sql апроса были найдены
    if ($categories->num_rows > 0) {  
    	// присваиваем переменной des_info полученный массив 
        $des_info = mysqli_fetch_assoc($categories);
    }
}

// Если была нажата кнопа вернуться назад
if(isset($_POST['back'])) {
	// Делаем переадресацию на страницу destinations.php
  	header("Location: /admin/destinations.php");
}

// Если была нажата кнопка редактировать
if(isset($_POST['submit'])){
    // Пишем запрос на обновление данных в БД в направлениях
  	$sql = "UPDATE destinations 
            SET arrival='". $_POST['arrival'] ."',
                departure='". $_POST['departure'] ."',
                categori_id='". $_POST['categori_id'] ."'              
            WHERE id =" . $_GET['id'];

    // Выполняем запрос
  	$result = $conn->query($sql);
  	// Перезагружаем эту же страничку
  	header("Location: /admin/modules/destinations/edit.php?id=" . $_GET['id']);
}

?>

<div class="main-panel" id="main-panel">
	<!--breadcrumb block-->
	<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
	    <div class="container-fluid">   
			<nav aria-label="breadcrumb">
	          	<ol class="breadcrumb">
	            	<li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>
	            	<li class="breadcrumb-item"><a href="/admin/destinations.php">Destinations</a></li>
	            	<li class="breadcrumb-item active">EDIT</li>
	          	</ol>
		    </nav>
		</div>
	</nav>
	<!--End breadcrumb block-->
	<br><br><br><br><br>

	<!-- ===============================
	Блок с формой для внесения изменений
	=================================-->
	<div class="content">
	    <div class="row">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">
	                    <h4 class="card-title">Edit Destination</h4>
	                </div>
	                <div class="card-body">
	                    <form method="POST" active="" id="form-edit-products" enctype="multipart/form-data">
		                    <div class="form-group">
		                      <label for="arrival">Arrival</label>
		                      <input type="text" name="arrival" class="form-control" id="arrival" value="<?php echo $des_info['arrival']; ?>">
		                    </div>
		                    <div class="form-group">
		                      <label for="departure">Departure</label>
		                      <input type="text" name="departure" class="form-control" id="departure" value="<?php echo $des_info['departure']; ?>">
		                    </div>
	                      	<div class="form-group">
		                        <label for="categori_id">Сategory</label>
		                        <select name="categori_id" class="form-control" >  

		                          <?php
		                            $categories = "SELECT * FROM `categories`";
		                            $result_categories = $conn->query($categories);
		                            while ($categorie = mysqli_fetch_assoc($result_categories)){

		                                echo "<option value='". $categorie['id']."'";
		                                if ($des_info['categori_id'] == $categorie['id']){
		                                    echo "selected";
		                                }
		                                echo ">". $categorie['title'] ."</option>";
		                            }
		                          ?>

		                        </select>
	                        </div>
		                    <button type="submit" name="submit" id="submit" class="btn btn-primary mb-2">Edit</button>
		                    <button type="submit" name="back" class="btn btn-primary mb-2">Back</button>
	                    </form>
	                </div>
	            </div>     
	      </div>
	    </div>    
	</div>
</div>
<!-- ====================================
end Блок с формой для внесения изменений 
=======================================-->

<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?> 