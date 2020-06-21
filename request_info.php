<?php 
$page = "request_info";
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'].'/parts/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/configs/configs.php';
include $_SERVER['DOCUMENT_ROOT'].'/modules/telegramm/new_question.php';

//Если пришел POST запрос
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {

    // Если пользователь не авторизировался
    if( !isset($user_id) ){ 

        $user_id = 0;

        // Пишем запрос, чтоб проверить есть ли такой имейл в таблице users
        $sql = "SELECT * FROM users WHERE email ='" . $_POST['mail'] . "'";
        $result = $conn->query($sql);

        //если пользователь найден
        if ($result->num_rows > 0) {

             $user = mysqli_fetch_assoc($result);
             // присваиваем id пользователя из таблици users
             $user_id = $user['id']; 

        } else {//если пользователь не найден

            // Запускаем функцию генерации ссылки со случайной строкой для верификации почты
            $u_code = generateRandomString(20);
            
            $sql = "INSERT INTO users (name, phone, email, confirm_code, password) VALUES ('". $_POST['name'] ."', '". $_POST['phone'] ."', '". $_POST['mail'] ."', '". $u_code ."', '". md5($u_code) ."')";
          
            if ($conn->query($sql)) {
                // Получаем id ового пользователя
                $user_id = $conn->insert_id;
            } else {
               // echo "ERROR USER";
            }
        }
          
        // добовление сообщение в БД
        $sql = "INSERT INTO message (`user_id`, `text`, `time`, `status`) 
                VALUES ('" . $user_id . "', '" . $_POST['message'] . "', current_timestamp(), 'NEW' ) ";
          
        if ($conn->query($sql)) {

            message_to_telegram('Hello!You have new question!');
                
        } else {
            //echo "ERROR msg";
        }

    } else {
        // добовление сообщение в БД
        $sql = "INSERT INTO message (`user_id`, `text`, `time`, `status`) 
                VALUES ('" . $user_id . "', '" . $_POST['message'] . "', current_timestamp(), 'NEW' ) ";
          
        if ($conn->query($sql)) {

            message_to_telegram('Hello!You have new question!');
                
        } else {
            //echo "ERROR msg";
        }
    }
 
}

// Функция генерации случайного кода (строки) для верификации mail
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>
<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style=" background-image: url(/img/bg-img/bg-7.jpg);">
    <div class="bradcumbContent">
        <h2>REQUEST INFORMATION</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Registration Form Area Start ##### -->
<section class="contact-form-area mb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <div class="line-"></div>
                    <h2>Get in touch</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <?php
                // Если пользователь авторизировался
                if( isset($user_id) ){ 
                    $sql = "SELECT * FROM users WHERE id=" . $user_id;

                    $user = mysqli_fetch_assoc( $conn->query($sql) );
                    ?>
                    <!-- Contact Form -->
                    <form method="POST">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="name" value="<?php echo $user['name']; ?>">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="phone" value="<?php echo $user['phone']; ?>">
                            </div>
                            <div class="col-lg-6">
                              <input type="hidden" class="form-control" name="mail" value="<?php echo $user['email']; ?>">
                            </div>


                            <div class="col-lg-12">
                              <textarea style="font-size: 16px;" class="form-control" name="message" rows="4" cols="40" placeholder="Please type your question here"></textarea>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn palatin-btn mt-50">SEND</button>
                            </div>
                        </div>
                    </form>
                    <?php
        
                } else { 
                    ?>
                    <!-- Contact Form -->
                    <form method="POST">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="name" placeholder="Your name">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="phone" placeholder="Telephone number">
                            </div>
                            <div class="col-lg-6">
                              <input type="email" class="form-control" name="mail" placeholder="Email Address">
                            </div>


                            <div class="col-lg-12">
                              <textarea style="font-size: 16px;" class="form-control" name="message" rows="4" cols="40" placeholder="Please type your question here"></textarea>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn palatin-btn mt-50">SEND</button>
                            </div>
                        </div>
                    </form>

                    <?php
                }
                ?>
               
            </div>
        </div>
    </div>
</section>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/parts/footer.php';
?>

