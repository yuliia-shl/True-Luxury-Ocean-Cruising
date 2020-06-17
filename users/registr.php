<?php 
include $_SERVER['DOCUMENT_ROOT'].'/parts/header.php';
?>

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img d-flex align-items-center justify-content-center" style=" background-image: url(/img/bg-img/bg-8.jpg);">
        <div class="bradcumbContent">
            <h2>Registration</h2>
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
                        <h2>Registration</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Contact Form -->
                    <form action="#" method="post">
                        <div class="row">
                        	<div class="col-lg-6">
                                <input type="text" class="form-control" name="text" placeholder="Your Name">
                            </div>
                            <div class="col-lg-6">
                                <input type="phone" class="form-control" name="phone" placeholder="Phone Number">
                            </div>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" name="email" placeholder="E-mail">
                            </div>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn palatin-btn mt-50">Registration</button>
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