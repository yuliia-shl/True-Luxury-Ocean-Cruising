<!-- ==============================
Файл для редактирования круизов
================================-->
<?php
	//название раздела
	$page = "cruises";
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
	include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';

// Если пришел get запрос, после нажатия на кнопку edit
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

// Если была нажата кнопа вернуться назад
if(isset($_POST['back'])) {
	// Делаем переадресацию на страницу destinations.php
  	header("Location: /admin/cruises.php");
}

// Если была нажата кнопка редактировать
if(isset($_POST['submit'])){
    // Пишем запрос на обновление данных в БД в направлениях
  	$sql = "UPDATE cruises 
            SET title='". $_POST['title'] ."',
                days='". $_POST['days'] ."',
                price='". $_POST['price'] ."',
                destinations_id='" . $_POST["destinations_id"] . "',
                description='" . $_POST["desc"] . "'
            WHERE id =" . $_GET['id'];

    // Выполняем запрос
  	$result = $conn->query($sql);
  	// Перезагружаем эту же страничку
  	header("Location: /admin/modules/cruises/edit_cru.php?id=" . $_GET['id']);
}

?>

<div class="main-panel" id="main-panel">
	<!--breadcrumb block-->
	<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
	    <div class="container-fluid">   
			<nav aria-label="breadcrumb">
	          	<ol class="breadcrumb">
	            	<li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>
	            	<li class="breadcrumb-item"><a href="/admin/cruises.php">Cruises</a></li>
	            	<li class="breadcrumb-item active">EDIT</li>
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
	        <div class="col-md-12">
	            <div class="card">
	                <div class="card-header">
	                    <h4 class="card-title">Edit Cruise</h4>
	                </div>
	                <div class="card-body">

	                    <form method="POST" active="" id="form-edit-products" enctype="multipart/form-data">

	                      <div class="form-group">
	                        <label for="title">Title</label>
	                        <input type="text" value="<?php echo $cru_info['title']; ?>" name="title" class="form-control">
	                      </div>
	                      <div class="form-group">
	                        <label for="days">Days</label>
	                        <input type="text" value="<?php echo $cru_info['days']; ?>" name="days" class="form-control">
	                      </div>
	                      <div class="form-group">
	                        <label for="price">Price per night, $</label>
	                        <input type="text" value="<?php echo number_format ($cru_info['price'], 2, ',' , ' '); ?>" name="price" class="form-control">
	                      </div>
                	      <div class="form-group">
	                        <label for="destinations">Destinations</label>
	                        <select name="destinations_id" class="form-control">
	                        	<?php
		                            $sql = "SELECT * FROM `destinations`";
		                            $result = $conn->query($sql);
		                            while ($destinations = mysqli_fetch_assoc($result)){

		                                echo "<option value='". $destinations['id'] ."'";
		                                if ($cru_info['destinations_id'] == $destinations['id']) {
		                                	echo "selected";
		                                }
	                                	echo ">". $destinations['arrival'] ." TO " . $destinations['departure'] . "'</option>";
		                            }
		                        ?>
	                        </select>
	                      </div>
	                      <div class="form-group">
	                        <label for="desc">Description</label>
	                        <textarea type="text" value="<?php echo $cru_info['desc']; ?>" name="desc" class="form-control"><?php echo $cru_info['description']; ?></textarea>
	                      </div>
	                      <button type="submit" name="submit" id="submit" class="btn btn-primary mb-2">Edit</button>
		                  <button type="submit" name="back" class="btn btn-primary mb-2">Back</button>
	                    </form>
	                </div>
	            </div>     
	      	</div> <!-- col-md-8 --> 
	    </div> <!-- End row --> 
	</div> <!-- End content --> 
	<!-- ===========================
	end Блок с формой для редактирования 
	==============================-->
</div><!-- End main-panel --> 


<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/admin/parts/footer.php';
?> 