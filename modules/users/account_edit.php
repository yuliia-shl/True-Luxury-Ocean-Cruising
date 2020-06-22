<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
// вытягиваем из БД users где id совпадают с куки

if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST" && $_POST['usname'] !=""
  // и если поля Имя, телефон, почта и пароль не пусты
  && $_POST['usphone'] !="" && $_POST['pass'] !="" && $_POST['pass2'] !="") {

    $sql_us = "SELECT * FROM users WHERE id =" . $_COOKIE["login"];
    $result_us = $conn->query($sql_us);
    $users = mysqli_fetch_assoc($result_us);



    //Если пароли совпадают
    if($_POST['pass'] == $_POST['pass2']) {
        // для безопасности взлома кодируем пароль, чтоб в базе данных он был не доступен
        $password = md5($_POST['pass']);
        $sql = "UPDATE users SET name = '" . $_POST["usname"] . "', phone = '" . $_POST["usphone"] . "', password = '" . $password . "' WHERE id= '" . $users["id"] . "'";
        if($conn->query($sql)) {
                //echo "<h3>Information successfully updated. Please <a style=\"color: blue; font-size: 16px;\" href=\"/modules/users/account.php\">refresh</a> your page to see updates.</h3>";
                header("Location: /modules/users/account.php");// Если данные добавились в БД, то обновляем страницу
        }
    } 
    
} else {
    header("Location: /modules/users/account.php");
}
?>