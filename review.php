<!-- ===================================
			Файл для отзывов
=====================================-->
<?php
//название раздела
$page = "review"; 
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT']. '/parts/header.php';
?>
<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style=" background-image: url(/img/bg-img/basket.jpg);">
    <div class="bradcumbContent">
        <h2>YOUR REVIEW</h2>
    </div>
</section>
    <!-- ##### Breadcumb Area End ##### -->
<?php
//выбираем с БД все поля
 $sql = "SELECT * FROM `review` ORDER BY id DESC";
//сщединяемся 
 $result = $conn->query($sql);
 ?>
<div class="content">
<h2>Your Review</h2>
<br>
<div class="send"> 
<form method="post" action="" id="review">   
<h3>Pleas leave your score!</h3>
<div class="rating">
	<input type="radio" class="rating" id="star5" name="rating" value="5" /><label for="star5"></label>
	<input type="radio" class="rating" id="star4" name="rating" value="4" /><label for="star4"></label>
	<input type="radio" class="rating" id="star3" name="rating" value="3" /><label for="star3"></label>
	<input type="radio" class="rating" id="star2" name="rating" value="2" /><label for="star2"></label>
	<input type="radio" class="rating" id="star1" name="rating" value="1" /><label for="star1"></label>
</div>
<br>
<br>
<br>
	<input type="text" name="name" placeholder="Name" required>
	<input type="email" name="email" placeholder="E-mail" required>
	<input type="date" name="date" hidden="true">
	<textarea name="message" placeholder="Review" required></textarea>
	<input type="submit" name="add" value="Send">
</form>
</div>
</div>
<br>
<br>
<br>
<?php
 while($res = mysqli_fetch_assoc($result)) { ?>
<div class="reviews"> 
<div class="review_text">
<b>Name:</b> <?= $res['name'] ?> | <b>Date:</b> <?= date("d.m.y | <b></b> H.i", strtotime($res['date'])) ?> | <b>Score:</b> <?= $res['rating'] ?>/5
<hr>
<br>
<?= $res['message'] ?> <br>
</div>
</div>
<br>
<br>
<br>
<?php 
} 

if (isset($_POST['add'])) {
// преобразуем специальные символы в текст
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$rating = htmlspecialchars($_POST['rating']);
$message = htmlspecialchars($_POST['message']);

// заносим данные из формы в переменные и проверяем на ошибки
$name = strip_tags(trim($_POST['name']));
$email = strip_tags(trim($_POST['email']));
$date = $_POST['date'];
$rating = strip_tags(trim($_POST['rating']));
$message = strip_tags(trim($_POST['message']));

// заносим дату и время отзыва
$date = date('Y-m-d H:i');
// проверка введенных данных
if($name != '' AND $email != '' AND $message != ''){ if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email))
  {$err = 'Неверно введен е-mail.';}
// отправка данных в бд
$sql1 = " INSERT INTO `review` (`name`, `email`, `date`, `rating`, `message`) VALUES ('$name', '$email', '$date', '$rating', '$message')";
// закрываем сеанс 
$result1 = $conn->query($sql1);
 
   }
}
?>
