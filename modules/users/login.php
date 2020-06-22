<?php 
$page = "login";
include $_SERVER['DOCUMENT_ROOT'].'/parts/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';

/*
+ 1. Сделать форму авторизации
+ 2. Сделать отправку формы
+ 3. Сделать проверку на существование юзера по (мейл) в БД
+ 4. Сделать проверку на прохождение авторизации
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
            header("Location: /modules/users/login.php");
        }
    }
}

// Если существует ПОСТ запрос (при нажатии на кнопку SUBMIT)
// и если поля почта и пароль не пусты
if (isset($_POST) && $_SERVER["REQUEST_METHOD"]=="POST" && $_POST['usmail'] !="" && $_POST['pass'] !="") {
	$password = md5($_POST['pass']);
	
	// Авторизация - если логин и пароль совпали с БД, то авторизация успешна
	$sql = "SELECT * FROM users WHERE email='" . $_POST['usmail'] . "' AND password='$password'";
	$result = $conn->query($sql);
	$user = mysqli_fetch_assoc($result);

	// Если пользователь верефецирован ($user['verifided'] == 1)
	if($result->num_rows > 0) {
		if($user['verifided'] == 1) {
			setcookie("login", $user["id"], time() + 3600*24, '/');
			header("Location: /index.php");
			// echo "NAIDEN";
			
		} else { // Если пользователь НЕ верифицирован
			echo "<script>alert(\"You need verification!\");</script>";
			header("Location: /modules/users/verification.php");
		} 
	} else	{ // Если пользователь ввел НЕ верно логин или пароль
		// echo "<h3>Login or password is incorrect.</h3>";
		echo "<script>alert(\"Login or password is incorrect.\");</script>";
	}
}
?>

<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style=" background-image: url(/img/bg-img/bg-1.jpg);">
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
                    <h2>Sign in</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Contact Form -->
                <form method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="email" class="form-control" name="usmail" placeholder="Email Address" required>
                        </div>
                        <div class="col-lg-6">
                            <input type="password" class="form-control" name="pass" placeholder="Password" required>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn palatin-btn mt-50">SUBMIT</button>
                        </div>
                        <div class="col-md-12 mt-3">
                        	Don't have an account?
							<a href="/modules/users/registr.php" class="no-text-decoration blue-link"><b style="color: #51748b;">CREATE AN ACCOUNT.</b></a>
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
