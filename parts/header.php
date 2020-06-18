<?php
    include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Ocean</title>

    <!-- Favicon -->
    <link rel="icon" href="/img/core-img/boat.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="palatin-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="palatinNav">

                        <!-- Nav brand -->
                        <a href="/index.php" class="nav-brand"><img src="/img/core-img/trip.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li <?php if($page == "home"){ echo "class='active'"; }?>>
                                        <a href="/index.php">Home</a>
                                    </li>
                                    <li <?php if($page == "cruises"){ echo "class='active'"; }?>>
                                        <a href="/cruises.php">Find a Cruise</a>
                                    </li>
                                    <li <?php if($page == "contact_us"){ echo "class='active'"; }?>>
                                        <a href="/index.php?name_page=contact_us#contact_us">Contact us</a>
                                    </li>
                                    <li <?php if($page == "request_info"){ echo "class='active'"; }?>>
                                        <a href="/request_info.php">Request information</a>
                                    </li>
                                    <?php
                                    //Если пользователь Авторизован, то выводим слово Exit
                                    if(isset ($_COOKIE["login"])) {
                                        $sql = "SELECT * FROM users WHERE id=" . $_COOKIE["login"];
                                        $result = mysqli_query($conn, $sql);
                                        $user = mysqli_fetch_assoc($result);
                                        ?>
                                        <li><a style="width: 69px; text-align: center;" href="/modules/users/logout.php"> Exit &#8658;</a></li>
                                      <?php
                                    } else { //Если НЕ Авторизован - товыводим лого
                                      ?>
                                        <li <?php if($page == "login"){ echo "class='active'"; }?>><a style="width: 69px; text-align: center;" href="/modules/users/login.php"><img src="/img/core-img/user.png"/></a></li>
                                      <?php
                                    }
                                  ?>
                                    <li  class="basket" <?php if($page == "basket"){ echo "class='active'"; }?>>
                                            <a class="nav-link basket-a" href="/basket.php">
                                                <img src="/img/bg-img/cart.svg" width="32" alt="" >
                                                <span class="basket-span">1</span>
                                            </a>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
