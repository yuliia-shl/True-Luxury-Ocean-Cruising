<!-- =================================================
Файл Вывода формы с Информацией о пользователе
====================================================-->
<?php
// вытягиваем из БД users где id совпадают с куки
$sql_us = "SELECT * FROM users WHERE id =" . $_COOKIE["login"];
$result_us = $conn->query($sql_us);
$users = mysqli_fetch_assoc($result_us);

?>
<div style="font-size: 16px;"></div>
<!-- Блок с формой для редактирования-->
<form method="POST" action="/modules/users/account_edit.php">
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