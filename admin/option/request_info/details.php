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
		 
<div class="controls">
<div class="row">
 	<div class="col-md-6">
		 <div class="form-group">
		 	<label for="form_name">Name</label>
				 <input id="form_name" type="text" value="<?= $row_sms['name'] ?>" name="name" class="form-control" required="required" data-error="Firstname is required.">
		 			<div class="help-block with-errors"></div>
		 		</div>
		 	</div>
		 <div class="col-md-6">
	 <div class="form-group">
 <label for="form_lastname">Phone</label>
<input id="form_lastname" type="text" value="<?= $row_sms['phone'] ?>" name="surname" class="form-control" required="required" data-error="Lastname is required.">
<div class="help-block with-errors"></div>
	</div>
 </div>
</div>

<div class="row">

 <div class="col-md-6">
	 <div class="form-group">
		 <label for="form_email">Email</label>
		 	<input id="form_email" type="email" value="<?= $row_sms['email'] ?>" name="email" class="form-control" required="required" data-error="Valid email is required.">
	 <div class="help-block with-errors"></div>
 </div>
</div>

<div class="col-md-6">
 	<div class="form-group">
		 <label for="form_phone">Time</label>
		 	<input id="form_phone" value="<?= $row_sms['Time'] ?>" type="tel" name="phone" class="form-control">
		 <div class="help-block with-errors"></div>
	 </div>
 </div>
</div>

<div class="row">
 	<div class="col-md-12">
		 <div class="form-group">
			 <label for="form_message">Message</label>
		 <textarea id="form_message" value="<?= $row_sms['text'] ?>"  name="message" class="form-control" rows="4" required="required"><?= $row_sms['text'] ?></textarea>
	 <div class="help-block with-errors"></div>
 </div>
 </div>
</div>
</div>
</form>
</div><!-- /.col-lg-8 col-lg-offset-2 -->
</div> <!-- /.row-->
</div> <!-- /.container-->
<!--Table-->
</div>

<?php 
 include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/footer.php';
?> 
