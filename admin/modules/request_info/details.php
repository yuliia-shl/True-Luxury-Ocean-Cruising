<!-- ===================================
Файл для вывода подробной инфо о письмах
=====================================-->
<?php
//название раздела
$page = "request_info"; 
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';

// Если пришел get запрос
if (isset($_GET['id'])) {
	$sql_sms = $sql = "SELECT message.*, users.name, users.phone, users.email 
                        FROM message, users
                        WHERE message.user_id = users.id && message.id =" . $_GET['id'];

	$result_sms = $conn->query($sql_sms);
	$row_sms = mysqli_fetch_assoc($result_sms);

	//Берем из БД смс с таким же айди 
	$sql = "SELECT * FROM users WHERE id =" . $row_sms['user_id'];
	$result = $conn->query($sql);	
	$users = mysqli_fetch_assoc($result);
}
?>

<div class="main-panel" id="main-panel">
	<!-- breadcrumb block-->   
	<nav class="navbar navbar-expand-lg navbar-transparent bg-primary navbar-absolute">
	    <div class="container-fluid">
	      <nav aria-label="breadcrumb">
	          <ol class="breadcrumb">
	          	<li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>
	            <li class="breadcrumb-item"><a href="/admin/request_info.php">Request information</a></li>
	            <li class="breadcrumb-item active">INFO</li>
	          </ol>
	      </nav>
	    </div>
	</nav>
	  <!--End breadcrumb block-->
	<br><br><br><br><br>
	<!--Table-->

<!-- ===================================
Блок с формой для просмотра с иформации
=====================================-->
	<div class="content">
	    <div class="row">
	        <div class="col-md-8">
	            <div class="card">
	            	<div class="card-header">
	                    <h4 class="card-title">Details</h4>
	                </div>

	                <div class="card-body">
	                    <form method="GET" active="" id="form-edit-products" enctype="multipart/form-data">
		                    <div class="form-group">
		                        <label for="form_name">Name</label>
		                        <input type="text" name="name" class="form-control" id="form_name" value="<?= $row_sms['name'] ?>">
		                    </div>
		                    <div class="form-group">
		                        <label for="form_phone">Phone</label>
		                        <input type="text" name="phone" class="form-control" id="form_phone" value="<?= $row_sms['phone'] ?>">
		                    </div>		
		                    <div class="form-group">
		                        <label for="form_email">Email</label>
		                        <input type="text" name="mail" class="form-control" id="form_email" value="<?= $row_sms['email'] ?>">
		                    </div>
		                    <div class="form-group">
		                        <label for="form-data">Time</label>
		                        <input type="text" name="time" class="form-control" id="form-data" value="<?= $row_sms['Time'] ?>">
		                    </div> 
		                    <div class="form-group">
		                        <label for="form_message">Message</label>
		                        <textarea type="text" name="massage" class="form-control" id="massage" value="<?= $row_sms['text'] ?>">"<?= $row_sms['text'] ?>"</textarea>
		                    </div>
							
						</form>
					</div><!-- ./card-body -->
				</div> <!-- /.card -->
			</div> <!-- ./col-md-8 -->
		</div><!-- ./row -->
	</div>
<!-- =======================================
END блока с формой для просмотра с иформации
=========================================-->
<?php 
 include $_SERVER['DOCUMENT_ROOT']. '/admin/modules/request_info/send.php';
?> 

</div> <!-- ./main-panel -->

<?php 
 include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/footer.php';
?> 
