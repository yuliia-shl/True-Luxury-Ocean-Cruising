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
	                <!-- Contact Form -->
	                <form method="POST" action="/modules/basket/buy_basket.php">
	                    <div class="row">

	                        <div class="col-lg-6">
	                            <input type="text" name="name" class="form-control m-3" value="<?php echo $user['name']; ?>" placeholder="Your Name" required>
	                        </div>
	                        
	                        <div class="col-lg-6">
	                            <input type="phone" name="phone" class="form-control m-3" placeholder="Telephone Number"
	                            value="<?php if (isset($user['phone']) ){ echo $user['phone']; } ?>" required>
	                        </div>
	                        <div class="col-lg-6">
	                            <input type="hidden" name="email" value="<?php echo $user['email']; ?>" required>
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
                <form method="POST" action="/modules/basket/buy_basket.php">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" name="name" class="form-control m-3" placeholder="Your Name" required>
                        </div>
                        <div class="col-lg-6">
                            <input type="email" name="email" class="form-control m-3" name="usmail" placeholder="Email Address" required>
                        </div>
                        <div class="col-lg-6">
                            <input type="phone" name="phone" class="form-control m-3" placeholder="Telephone Number" required>
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
						
    