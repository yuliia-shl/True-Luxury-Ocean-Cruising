<!-- ##### Form Basket ##### -->
<section class="contact-form-area mb-100">
    <div class="container">
	<?php
	// Если корзина заполнена
	if( isset($_COOKIE['basket']) ){

		// Если пользователь авторизовался
		if(isset($user_id)){
			// Получаем данные о пользователе из БД
	        $sql = "SELECT * FROM users WHERE id = " . $user_id;
	        $user = mysqli_fetch_assoc( $conn->query($sql) );
	        ?>

	        <div class="row">
				<div class="col-12"> 
					<form method="POST" action="/modules/basket/buy_basket.php">
						<!-- Заполняем поля авторизированого пользователя name и email из БД -->
						<input type="hidden" name="name"  value="<?php echo $user['login']; ?>">
						<input type="hidden" name="email" value="<?php echo $user['email']; ?>">
						<input type="phone" name="phone" class="form-control m-3" placeholder="+38(063) 455 24 97" 
						value="<?php if (isset($user['phone']) ){ echo $user['phone']; } ?>">
						<input type="text" name="addres" class="form-control m-3" placeholder="Киев, ул. Саксаганского 5">
						<div class="col-12 offset-10">
							<button type="submit" name="buy" class="btn btn-primary mb-2 m-3 offset-3">Купить</button>
						</div>
					</form>
				</div>
			</div>

			<div class="row">
	            <div class="col-12">
	                <!-- Contact Form -->
	                <form method="POST">
	                    <div class="row">
	                        <div class="col-lg-6">
	                            <input type="hidden" name="name" value="<?php echo $user['login']; ?>">
	                        </div>
	                        <div class="col-lg-6">
	                            <input type="hidden" name="email" value="<?php echo $user['email']; ?>">
	                        </div>
	                        <div class="col-lg-6">
	                            <input type="phone" name="phone" class="form-control m-3" placeholder="+38(063) 455 24 97"
	                            value="<?php if (isset($user['phone']) ){ echo $user['phone']; } ?>">
	                        </div>
	                        <div class="col-lg-6">
	                            <input type="text" name="addres" class="form-control m-3" placeholder="Киев, ул. Саксаганского 5">
	                        </div>
	                        <div class="col-12">
	                            <button type="submit" name="buy" class="btn palatin-btn mt-50">SUBMIT</button>
	                        </div>
	                        
	                    </div>
	                </form>
	            </div>
	        </div>

			<?php
		} else {



		?>
			<!-- Форма заказа товаров Lyuda@travel.com -->
		<div class="row">
            <div class="col-12">
                <!-- Contact Form -->
                <form method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" name="name" class="form-control m-3" placeholder="Alan">
                        </div>
                        <div class="col-lg-6">
                            <input type="email" class="form-control m-3" name="usmail" placeholder="Email Address">
                        </div>
                        <div class="col-lg-6">
                            <input type="phone" name="phone" class="form-control m-3" placeholder="+38(063) 455 24 97">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" name="addres" class="form-control m-3" placeholder="Киев, ул. Саксаганского 5">
                        </div>
                        <div class="col-12">
                            <button type="submit" name="buy" class="btn palatin-btn mt-50">SUBMIT</button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>

		<?php
		}
	}

	?>

    </div>
</section>
						
    