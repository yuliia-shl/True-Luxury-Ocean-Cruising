<!-- ===================================
			Файл для отзывов
=====================================-->
<?php
//название раздела
$page = "review"; 
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT']. '/parts/header.php';
//Если пришел POST запрос	// и если поля Имя, почта и рейтинг не пусты
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {

    // Если пользователь не авторизировался
    if( !isset($_COOKIE['login']) ){ 

        $user_id = 0;

        // Пишем запрос, чтоб проверить есть ли такой имейл в таблице users
        $sql = "SELECT * FROM users WHERE email ='" . $_POST['email'] . "'";
        $result = $conn->query($sql);
		var_dump($sql);
        //если пользователь найден
        if ($result->num_rows > 0) {
            $user = mysqli_fetch_assoc($result);
            // присваиваем id пользователя из таблици users
            $user_id = $user['id']; 
			
        } else {//если пользователь не найден
            
            $sql = "INSERT INTO users (name, email) VALUES ('". $_POST['name'] ."', '". $_POST['email'] ."')";
           var_dump($sql);
            if ($conn->query($sql)) {
                // Получаем id ового пользователя
                $user_id = $conn->insert_id;
            } else {
               echo "ERROR USER";
            }
        }
	
	// добовление отзыва в БД
    $sql = "INSERT INTO review (`user_id`, `date`, `rating`, `message`) 
            VALUES ('" . $user_id . "', current_timestamp(), '" . $_POST['rating'] . "', '" . $_POST['message'] . "') ";
      
   if ($conn->query($sql)) {
            echo "msg";
                
        } else {
            echo "ERROR msg";
        }

    } else {
        // добовление сообщение в БД
    $sql = "INSERT INTO review (`user_id`, `date`, `rating`, `message`) 
            VALUES ('" . $_COOKIE['login'] . "', current_timestamp(), '" . $_POST['rating'] . "', '" . $_POST['message'] . "') ";

        if ($conn->query($sql)) {

             echo "msg";
                
        } else {
            echo "ERROR msg";
        }
    }
 
}
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
		<?php
                // Если пользователь авторизировался
                if( isset($_COOKIE['login']) ){ 
                	// "SELECT message.*, users.name, users.phone, users.email 
                 //            FROM message, users
                 //            WHERE message.user_id = users.id";
                    $sql = "SELECT review.*, users.name, users.email FROM review, users WHERE review.user_id=" . $_COOKIE['login'];
                    var_dump($sql);

                    $user = mysqli_fetch_assoc( $conn->query($sql) );
                    ?>
		<form method="post" action="" id="review">   
			<h3>Please leave your score!</h3>
			<div class="rating">
				<input type="radio" class="rating" id="star5" name="rating" value="5" /><label for="star5"></label>
				<input type="radio" class="rating" id="star4" name="rating" value="4" /><label for="star4"></label>
				<input type="radio" class="rating" id="star3" name="rating" value="3" /><label for="star3"></label>
				<input type="radio" class="rating" id="star2" name="rating" value="2" /><label for="star2"></label>
				<input type="radio" class="rating" id="star1" name="rating" value="1" /><label for="star1"></label>
			</div>
			<br><br><br>
			<input type="text" name="name" value="<?php echo $user['name']; ?>" placeholder="Name" required>
			<input type="email" name="email" name="mail" value="<?php echo $user['email']; ?>" placeholder="E-mail" required>
			<input type="date" name="date" hidden="true">
			<textarea name="message" placeholder="Review" required></textarea>
			<input type="submit" name="add" value="Send">
		</form>
		<?php
        
                } else { 
                    ?>
                    <form method="post" action="" id="review">   
			<h3>Please leave your score!</h3>
			<div class="rating">
				<input type="radio" class="rating" id="star5" name="rating" value="5" /><label for="star5"></label>
				<input type="radio" class="rating" id="star4" name="rating" value="4" /><label for="star4"></label>
				<input type="radio" class="rating" id="star3" name="rating" value="3" /><label for="star3"></label>
				<input type="radio" class="rating" id="star2" name="rating" value="2" /><label for="star2"></label>
				<input type="radio" class="rating" id="star1" name="rating" value="1" /><label for="star1"></label>
			</div>
			<br><br><br>
			<input type="text" name="name" placeholder="Name" required>
			<input type="email" name="email" name="mail" placeholder="E-mail" required>
			<input type="date" name="date" hidden="true">
			<textarea name="message" placeholder="Review" required></textarea>
			<input type="submit" name="add" value="Send">
		</form>
		 <?php
                }
                ?>
	</div>
</div>
<br>
<br>
<br>
<?php
 while($res = mysqli_fetch_assoc($result)) { ?>
	<div class="reviews"> 
		<div class="review_text">
			 <b>Name:</b> <? $_COOKIE['login'] ?><b>Date:</b> <?= date("d.m.y | <b></b> H.i", strtotime($res['date'])) ?> | <b>Score:</b> <?= $res['rating'] ?>/5
			<hr>
			<br>
			<?= $res['message'] ?> <br>
		</div>
	</div>
<?php 
} 
?>

