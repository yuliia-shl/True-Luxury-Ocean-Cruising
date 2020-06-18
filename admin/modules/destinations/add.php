<?php
//название раздла
$page = "destinations";

include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';

// Если пришел get запрос, после нажатия на кнопку edit
if(isset($_GET['id'])){

	// Берем все данные из таблици destinations где id=$_GET["id"]
    $sql = "SELECT * FROM destinations WHERE id=" . $_GET["id"];
    
    // Выполняем запрос
    $categories = $conn->query($sql);
    
    // Если строки с sql апроса были найдены
    if ($categories->num_rows > 0) {  
    	// присваюем переменной  des_info полученный массив 
        $des_info = mysqli_fetch_assoc($categories);
    }

}


// Если была нажата кнопа вернуться назад
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

<!-- ==================
Блок с формой для внесения изменений
=====================-->
<div class="main-panel" id="main-panel">
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">
	                    <h4 class="card-title">Edit Category</h4>
	                </div>
	                <div class="card-body">

	                    <form method="POST" active="" id="form-edit-products" enctype="multipart/form-data">
	                      
	                      <div class="form-group">
	                        <label for="arrival">Arrival</label>
	                        <input type="text" name="arrival" class="form-control" id="arrival" value="">
	                      </div>
	                      <div class="form-group">
	                        <label for="departure">Departure</label>
	                        <input type="text" name="departure" class="form-control" id="departure" value="">
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
</div>
<!-- ==================
end Блок с формой для внесения изменений 
=====================-->

<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?> 