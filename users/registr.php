<?php 
include $_SERVER['DOCUMENT_ROOT'].'/parts/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';

/*
+ 1. Сделать форму регистрации
+ 2. Сделать отправку формы
- 3. Сделать отпрвку письма со ссылкой на верификацию
+ 4. Сделать страницу верификации
- 5. Сделать проверку на существование юзера по (мейл) в БД
*/

// если существует ГЕТ запрос с кодом
if( isset($_GET['u_code']) ) {
	// выбираем из базы данных поля, где код в ГЕТ запросе совпадает с кодом из БД
	$sql = "SELECT * FROM users WHERE confirm_code='" . $_GET['u_code'] . "' ";
	$result = $conn->query($sql);

	// и если найдено совпадение, меняем в БД verifided с 0 (который стоит по умолчанию) на 1
	if($result->num_rows > 0) {
		$user = mysqli_fetch_assoc($result);
		$sql = "UPDATE users SET verifided = '1', confirm_code = '' WHERE id =" . $user['id'];
		if($conn->query($sql)) {
			// echo "User verifided!";
			echo "<script>alert(\"User verifided!\");</script>";
			header("Location: /users/login.php");
		}
	}
}


// Если существует ПОСТ запрос (при нажатии на кнопку Зарегистрироваться)
if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST" 
	// и если поля Имя, телефон, почта и пароль не пусты
	&& $_POST['usname'] !="" && $_POST['usphone'] !="" && $_POST['usmail'] !="" && $_POST['pass'] !="") {
	// для безопасности взлома кодируем пароль, чтоб в базе данных он был не доступен
	$password = md5($_POST['pass']);
	// Запускаем функцию генерации ссылки со случайной строкой для верификации почты
	$u_code = generateRandomString(20);
	
	// Регистрация
	$sql = "INSERT INTO users (name, phone, email, password, confirm_code) VALUES ('" . $_POST['usname'] . "', '" . $_POST['usphone'] . "', '" . $_POST['usmail'] . "', '" . $password . "', '$u_code')";

	if($conn->query($sql)) {
		echo "<h3>Successfully registered.</h3>";
		$link = "<a href='http://ocean/registr.php?u_code=$u_code'>Confirm</a>";
		mail($_POST['usmail'], 'Registration', $link);
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
<section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style=" background-image: url(/img/bg-img/bg-9.jpg);">
    <div class="bradcumbContent">
        <h2>MY ACCOUNT</h2>
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
                    <h2>Create account</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Contact Form -->
                <form method="POST">
                    <div class="row">
                    	<div class="col-lg-12">
                            <input type="text" class="form-control" name="usname" placeholder="Your Name">
                        </div>
                        <div class="col-lg-6">
                            <input type="phone" class="form-control" name="usphone" placeholder="Telephone Number">
                        </div>
                        <div class="col-lg-6">
                            <input type="email" class="form-control" name="usmail" placeholder="Email Address">
                        </div>
                        <div class="col-lg-6">
                            <input type="password" class="form-control" name="pass" placeholder="Password">
                        </div>
                        <div class="col-lg-6">
                            <input type="password" class="form-control" name="pass2" placeholder="Confirm Password">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn palatin-btn mt-50">REGISTER</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ##### Registration Form Area End ##### -->


<?php
include $_SERVER['DOCUMENT_ROOT'].'/parts/footer.php';
?>