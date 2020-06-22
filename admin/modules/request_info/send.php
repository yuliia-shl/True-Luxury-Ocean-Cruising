<!-- ==================== 
Файл для ответа на письма
=======================-->
<?php
// при нажатии на кнопку CLICK TO REPLY и если тема письма не пуста
if ( isset($_POST["add"]) && $_POST["theme"] != "" ) {
	$to = "<myemail@example.com>";
	$email = $_POST['email'];
	$subject = $_POST["theme"];
	$page = 'Страница спасибо за комментарий'; 
	$message = $_POST['message']; 

	if (!empty($email) && !empty($subject) && !empty($message)) {
		$result = mail($to, $subject, $message); // отправляем письмо-ответ клиенту
	} else if ($result) {
		echo "Сообщение отправлено.";
	} else {
		echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  <strong>Сообщение не отправлено!</strong> Попробуйте еще раз.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			  </button></div>';
	}
}
?>

<!-- ===================================
Блок с формой для ответа на письмо
=====================================-->
<div class="card">
	<div class="card-header">
		<h4 class="card-title">Answer form</h4>
	</div>
	<form class="my-form" action="" method="post">
		<small>* All need to be filed</small>

		<div class="form-group">
		  <input type="email" class="form-control" value="<?= $row_sms['email'] ?>" name="email" placeholder="email" required>
		</div>

		<div class="form-group">
		  <input type="text" class="form-control" name="theme" placeholder="Тема сообщения" required>
		</div>

		<div class="form-group">
		  <textarea class="form-control" rows="3" name="message" placeholder="Введите сообщение" required></textarea>
		</div>

		<div class="container">
		  <div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<button type="submit" class="btn btn-warning" name="add">Send</button>
				  <?php
					// Если статус Новый, показываем красную кнопку
	            	if ($row_sms['Status'] == "NEW") {
	             	 ?>
		             	 <!-- При нажатии на Кнопку CLICK TO REPLY - отправляем письмо клиенту -->
		                <a href="/admin/modules/request_info/change_status.php?id=<?php echo $_GET['id'] ?>" type="button" class="btn btn-danger">CLICK TO REPLY!</a>
		              	<?php
	           		} else { // Если статус НЕ новый, показываем зеленую кнопку
	            		echo "<div class=\"btn btn-success\">ALREDY ANSWERED</div>";
	            	}
	         	  ?>
     			<a href="/admin/request_info.php" type="button" class="btn btn-primary mb-2">Back</a>
    		</div>
  		  </div>
		</div> 
	</form>
</div>
<!-- =======================================
END блока с формой для ответа на письмо
=========================================