<?php 
$page = "login";
include $_SERVER['DOCUMENT_ROOT'].'/parts/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
/*
+ 1. Сделать форму верификации
+ 2. Сделать отправку формы
+ 3. Сделать проверку на существование юзера в БД
- 4. Сделать проверку на прохождение верификации
*/

// Если существует ПОСТ запрос (при нажатии на кнопку SUBMIT)
// и если поле почта не пустое
if (isset($_POST) && $_SERVER["REQUEST_METHOD"]=="POST" && $_POST['usmail'] != "") {
	// Сравниваем мейл с БД
	$sql = "SELECT * FROM users WHERE email='" . $_POST['usmail'] . "' ";
	$result = $conn->query($sql);
	
	$num_mails = mysqli_num_rows($result);
	$user = mysqli_fetch_assoc($result);

	if($num_mails > 0 && $user['verifided'] == 0) {
		
		// Запускаем функцию генерации ссылки со случайной строкой для верификации почты
		$u_code = generateRandomString(20);
		// перезаписываем код в БД
		$sql = "UPDATE users SET confirm_code = '$u_code' WHERE id =" . $user['id'];

		// Если новый код сформировался и обновился в БД - высылаем письмо
		if($conn->query($sql)) {
			// echo "<h3>Check your email.</h3>";
			echo "<script>alert(\"Check your email!\");</script>";
			$link = "<a href='http://ocean/modules/users/registr.php?u_code=$u_code'>Confirm</a>";
			mail($_POST['usmail'], 'Registration', $link);
		} 

	} else if ($num_mails > 0 && $user['verifided'] == 1) {
		echo "<script>alert(\"Your email already verifided!\");</script>";
		
	} else {
		// echo "<h3>Your email incorrect OR already verifided!</h3>";
		echo "<script>alert(\"Your email incorrect!\");</script>";
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
<section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style=" background-image: url(/img/bg-img/bg-2.jpg);">
    <div class="bradcumbContent">
        <h2>MY ACCOUNT</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Login Form Area Start ##### -->
<section class="contact-form-area mb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading">
                    <div class="line-"></div>
                    <h2>Confirmation</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Contact Form -->
                <form method="POST">
                	<div>Your email address is not confirmed. If you didn't receive the verification link during account creation, please enter your e-mail address below and an e-mail will be sent to you with instructions on how to reset your password.</div>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="email" class="form-control" name="usmail" placeholder="Email Address">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn palatin-btn mt-50">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ##### Login Form Area End ##### -->

<!-- ##### Footer Area Start ##### -->
<?php
include $_SERVER['DOCUMENT_ROOT'].'/parts/footer.php';
?>
