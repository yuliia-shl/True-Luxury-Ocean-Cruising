<?php 
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'].'/parts/header.php';
?>
<!-- <br><br><br><br><br><br><br><br> -->
  <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style=" background-image: url(../img/bg-img/bg-8.jpg);">
        <div class="bradcumbContent">
            <h2>REQUEST INFORMATION</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
<form method="POST">
  <!-- <div class="form-row"> -->
    <div class="form-group col-md-4">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="mail" placeholder="email">
    </div>
    <div class="form-group col-md-6">
      <label for="phone">Phone</label>
      <input type="text" class="form-control" name="phone" placeholder="Type your number">
    </div>
  <!-- </div> -->
  <div class="form-group col-md-6">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" placeholder="Type your name">
  </div>
  <div class="form-group col-md-6">
    <label for="message">Please type your question</label>
    <br><textarea name="message" rows="4" cols="40"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Send</button>
</form>


<?php

if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
$sql = "SELECT * FROM users WHERE email ='" . $_POST['mail'] . "'";
$user_id = 0;
$result = $conn->query($sql);
// var_dump($result);
//если пользователь найден
if ($result->num_rows > 0) {
     $user = mysqli_fetch_assoc($result);
     $user_id = $user['id']; 
     // $sql = "INSERT INTO message (`user_id`, `text`) VALUES ('" . $user_id . "', '" . $_POST['message'] . "' ) ";
  } else {
  	//усли пользователь не найден
  	$sql = "INSERT INTO users (phone, email) VALUES ('" . $_POST['phone'] . "', '" . $_POST['mail'] . "') ";

    
    if ($conn->query($sql)) {
        echo "user add";
        $user_id = $conn->insert_id;
    } else {
        echo "ERROR USER";
    }
  }
  // добовление смс в бд
  $sql = "INSERT INTO message (`user_id`, `text`) VALUES ('" . $user_id . "', '" . $_POST['message'] . "' ) ";
  if ($conn->query($sql)) {
        echo "msg add";
    } else {
        echo "ERROR msg";
    }
}


include $_SERVER['DOCUMENT_ROOT'].'/parts/footer.php';
?>

