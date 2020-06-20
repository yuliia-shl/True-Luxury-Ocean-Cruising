<!-- =================================================
Файл Вывода и редактирования Информации о пользователе
====================================================-->
<?php
// вытягиваем из БД users где id совпадают с куки
$sql_us = "SELECT * FROM users WHERE id =" . $_COOKIE["login"];
$result_us = $conn->query($sql_us);
$users = mysqli_fetch_assoc($result_us);

if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST" && $_POST['usname'] !=""
  // и если поля Имя, телефон, почта и пароль не пусты
  && $_POST['usphone'] !="" && $_POST['pass'] !="" && $_POST['pass2'] !="") {
    //Если пароли совпадают
    if($_POST['pass'] == $_POST['pass2']) {
        // для безопасности взлома кодируем пароль, чтоб в базе данных он был не доступен
        $password = md5($_POST['pass']);
        $sql = "UPDATE users SET name = '" . $_POST["usname"] . "', phone = '" . $_POST["usphone"] . "', password = '" . $password . "' WHERE id= '" . $users["id"] . "'";
        if($conn->query($sql)) {
                echo "<h3>Information successfully updated. Please <a style=\"color: blue; font-size: 16px;\" href=\"/modules/users/account.php\">refresh</a> your page to see updates.</h3>";
                // header("Location: /modules/users/account.php");// Если данные добавились в БД, то обновляем страницу
        }
    } else {
        echo "<h3>Password mismatch!</h3>";
    }
}
?>
<div style="font-size: 16px;"></div>
<!-- Блок с формой для редактирования-->
<form method="POST">
    <div class="row">
    	<div class="col-lg-6">
            <input type="text" class="form-control" name="usname" placeholder="Your Name" value="<?php echo $user['name']; ?>">
        </div>
        <div class="col-lg-6">
            <input type="phone" class="form-control" name="usphone" placeholder="Telephone Number" value="<?php echo $user['phone']; ?>">
        </div>
        <div class="col-lg-6">
            <input type="password" class="form-control" name="pass" placeholder="Password">
        </div>
        <div class="col-lg-6">
            <input type="password" class="form-control" name="pass2" placeholder="Confirm Password">
        </div>
        <div class="col-12">
            <button type="submit" class="btn palatin-btn mt-50">Update Profile</button>
        </div>
    </div>
  </form>