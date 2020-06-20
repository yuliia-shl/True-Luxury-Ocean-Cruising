<!-- ========================
Файл Личного кабинета клиента
==========================-->
<?php 
$page = "login";
include $_SERVER['DOCUMENT_ROOT'].'/parts/header.php';
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';

/*
+ 1. Сделать страницу кабинета
- 2. Сделать кнопки - функционал (Изменить инфо, Посмотреть заказы)
+ 3. Сделать страницу под кнопку Посмотреть заказы - вывести заказы с orders, destinations, categories
- 4. Сделать страницу под кнопку Изменить инфо:
	4.1. Сделать форму изменения данных
	4.2. Сделать отправку формы
*/
?>

<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style=" background-image: url(/img/bg-img/4.png);">
    <div class="bradcumbContent">
        <h2>MY PROFILE</h2>
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
                <h2>Welcome, <?php echo $user['name']; ?></h2>
            </div>
<!--             <div class="palatin-buttons-area mb-100">
                    <a href="#" class="btn palatin-btn btn-3 m-2">MY CRUISES</a>
                    <a href="#" class="btn palatin-btn btn-3 m-2">View profile</a>
                    <a href="#" class="btn palatin-btn btn-3 m-2">smth</a>
            </div> -->
        </div>
    
		<!-- ##### Accordians ##### -->
      <div class="col-12 col-lg-12">
        <div class="accordions mb-3" id="accordion" role="tablist" aria-multiselectable="true">
            <!-- single accordian area -->
            <div class="panel single-accordion">
                <h6>
                	<a role="button" class="" aria-expanded="true" aria-controls="collapseOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">BOOKED CRUISES
                        <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                        </a>
                </h6>
              <div id="collapseOne" class="accordion-content collapse show">
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem ma.</p> -->
                <div class="table-responsive">
	                <table class="table">
	                    <thead class=" text-primary">
	                      <th>Departs date</th>
					      <th>Title</th>
					      <th>Days</th>
					      <th>Price,$</th>
					      <th>Category</th>
	                      <th>Destination</th>
	                    </thead>

	                    <!--Table body-->
	                    <?php
	                    include $_SERVER['DOCUMENT_ROOT'].'/modules/users/acc_orders.php';
			            ?>

		            </table>
                </div>
              </div>
            </div>
        </div>
        <!-- single accordian area -->
        <div class="panel single-accordion">
            <h6>
                <a role="button" class="collapsed" aria-expanded="true" aria-controls="collapseTwo" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo">VIEW PROFILE
                        <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                        </a>
            </h6>
            <div id="collapseTwo" class="accordion-content collapse">
                <p>To update any of the following information complete the appropriate fields and click the "Update Profile" button.</p>

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
        </div>
            <!-- single accordian area -->
        <div class="panel single-accordion">
            <h6>
                <a role="button" aria-expanded="true" aria-controls="collapseThree" class="collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseThree">Ut ac ligula sapien. Suspendisse cursus faucibus finibus.
                        <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                    </a>
            </h6>
            <div id="collapseThree" class="accordion-content collapse">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris sceleri sque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus. Lorem ipsum dolor sit amet.</p>
            </div>
        </div>
      </div>
    </div>
  </div>



      
    
</section>
<!-- ##### Registration Form Area End ##### -->

<!-- ##### Footer Area Start ##### -->
<?php
include $_SERVER['DOCUMENT_ROOT'].'/parts/footer.php';
?>