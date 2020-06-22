<!-- =====================
	Файл для отзывов
=======================-->
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
        $sql = "SELECT * FROM users WHERE email ='" . $_POST['usmail'] . "'";
        $result = $conn->query($sql);
        //если пользователь найден
        if ($result->num_rows > 0) {
            $user = mysqli_fetch_assoc($result);
            // присваиваем id пользователя из таблици users
            $user_id = $user['id']; 
			
        } else {//если пользователь не найден
            $sql = "INSERT INTO users (name, email) VALUES ('". $_POST['usname'] ."', '". $_POST['usmail'] ."')";
            if ($conn->query($sql)) {
                // Получаем id ового пользователя
                $user_id = $conn->insert_id;
            } else {
               echo "ERROR USER";
            }
        }

	// добавление отзыва в БД
    $sql = "INSERT INTO review (`user_id`, `date`, `rating`, `message`) 
            VALUES ('" . $user_id . "', current_timestamp(), '" . $_POST['rating'] . "', '" . $_POST['message'] . "') ";
    if ($conn->query($sql)) {
            echo "msg";
        } else {
            echo "ERROR msg";
        }
    } else {
        // добавление отзыва в БД
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
        <h2>CUISE REVIEWS</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<section class="contact-form-area mb-50 ml-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="section-heading mb-1">
                    <div class="line-"></div>
                    <h2>Your Review</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <!-- Contact Form -->
                <form method="post" action="" id="review">
                    <h3>Please leave your score!</h3>
                    <div class="rating">
                        <input type="radio" class="rating" id="star5" name="rating" value="5" /><label for="star5"></label>
                        <input type="radio" class="rating" id="star4" name="rating" value="4" /><label for="star4"></label>
                        <input type="radio" class="rating" id="star3" name="rating" value="3" /><label for="star3"></label>
                        <input type="radio" class="rating" id="star2" name="rating" value="2" /><label for="star2"></label>
                        <input type="radio" class="rating" id="star1" name="rating" value="1" /><label for="star1"></label>
                    </div>
                    <br><br>
                    <div class="row">
                        <?php
                        // Если пользователь авторизировался
                        if( isset($_COOKIE['login']) ){
                            $sql = "SELECT * FROM users WHERE id=" . $_COOKIE['login'];
                            $user = mysqli_fetch_assoc( $conn->query($sql) );
                            ?>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="usname" placeholder="Your Name" value="<?php echo $user['name']; ?>">
                            </div>

                            <div class="col-lg-6">
                                <input type="email" class="form-control" name="usmail" placeholder="Email Address" value="<?php echo $user['email']; ?>">
                            </div>
                          <?php
                        } else { 
                            ?>
                           <div class="col-lg-6">
                                <input type="text" class="form-control" name="usname" placeholder="Your Name">
                            </div>

                            <div class="col-lg-6">
                                <input type="email" class="form-control" name="usmail" placeholder="Email Address">
                            </div>
                          <?php
                        }
                        ?>

                        <input type="date" name="date" hidden="true">
                        <div class="col-lg-12">
                            <textarea style="font-size: 16px;" class="form-control" name="message" rows="4" cols="40" placeholder="Please type your review here" required></textarea>
                        </div>
                        <div class="col-8">
                            <button type="submit" class="btn palatin-btn">SEND</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php

 //выбираем с БД все поля
 $sql = "SELECT review.*, users.name, users.id
 FROM review, users 
 WHERE review.user_id = users.id
 ORDER BY review.date DESC";
 //соединяемся 
 $result = $conn->query($sql);

 while($res = mysqli_fetch_assoc($result)) { ?>
    <!-- ##### Testimonial Area Start ##### -->
    <section class="testimonial-area section-padding-100 p-3 bg-img" style="background-image: url(img/core-img/pattern.png);">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="testimonial-content p-0">
                            <div class="single-testimonial">
                                <b>Name:</b> <?= $res['name'] ?> <b >Date:</b> <?= date("d.m.y | <b></b> H.i", strtotime($res['date'])) ?> | <b>Score: <?= $res['rating'] ?>/5</b>
                            </div> <br>
                        <hr>
                            <p><?= $res['message'] ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Testimonial Area End ##### -->
<?php 
} 
?>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/parts/footer.php';
?>

