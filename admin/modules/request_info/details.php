<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
// $page = "request_info"; 
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';
?>

<?php
if (isset($_GET['id'])) {
	$sql_sms = "SELECT * FROM message WHERE id =" . $_GET['id'];
	$result_sms = $conn->query($sql_sms);
	$row_sms = mysqli_fetch_assoc($result_sms);

	//Берем из БД смс с таким же айди 
	$sql = "SELECT * FROM users WHERE id =" . $row_sms['user_id'];
	$result = $conn->query($sql);	
	$users = mysqli_fetch_assoc($result);
}
?>
<div class="main-panel" id="main-panel">
  <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">       
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/request_info.php">Request information</a></li>
              <!-- <li class="breadcrumb-item"><a href="/admin/category.php">Category</a></li> -->
            <li class="breadcrumb-item active">Deteils</li>
          </ol>
      </nav>
    </div>
  </nav>
<br><br><br><br><br>
<!--Table-->

<!-- ==================
Блок с формой для просмотра с иформацией
=====================-->
<div class="main-panel" id="main-panel">
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-md-9">
	            <div class="card">
	            	 <div class="card-header">
	                    <h4 class="card-title">Deteils</h4>
	                </div>
	                <div class="card-body">

	                    <form method="POST" active="" id="form-edit-products" enctype="multipart/form-data">
	                      
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
	                  </div>

 <div class="container">
	 <div class="row">
		 <div class="col-lg-8 col-lg-offset-2">
		 	<?php
            if ($row_sms['Status'] == "NEW") {
              ?>
            <a href="/admin/option/request_info/change_status.php?id=<?php echo $_GET['id'] ?>" 
               type="button" class="btn btn-danger">Need to be answered</a>  
            <?php
            } else {
              ?>
            <div class="btn btn-success">ALREDY ANSWERED</div>  
            <?php  
            }
            ?>              
        </div>
    </div>
</div> 

</form>
</div><!-- /.col-lg-8 col-lg-offset-2 -->
</div> <!-- /.row-->
</div> <!-- /.container-->
</div>
   	 </div>
          </div>
<?php 
 include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/footer.php';
?> 
