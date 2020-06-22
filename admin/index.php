<?php
  $page = "home"; 
  include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
  include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';
?>

<div class="main-panel" id="main-panel">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <div class="navbar-toggle">
          <button type="button" class="navbar-toggler">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </button>
        </div>
        <!-- <a class="navbar-brand" href="#pablo">Home</a> -->
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#pablo">
              <!-- <i class="now-ui-icons users_single-02"></i> -->
              <p>
                <!-- <span class="d-lg-none d-md-block">Account</span> -->
              </p>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div style="text-align: center;" class="panel-header panel-header-lg">

    <img src="/img/core-img/boat-big.png">
    <!-- <canvas id="bigDashboardChart"></canvas> -->
  </div>

  <div class="content">
    <div class="row">
      <div class="col-lg-4">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">All user's list</h5>
            <a href="/admin/users.php">
            <h4 class="card-title">Users</h4>
            <div class="dropdown"></div>
          </div>
          <div class="card-body">
            <div style="text-align: center;" class="chart-area">
              <img src="/admin/assets/img/user-icon.png">
            </div>
          </div>
          <div class="card-footer">
            <div class="stats"> </div>
          </div>
        </a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">All Sales</h5>
            <a href="/admin/orders.php">
              <h4 class="card-title">Orders</h4>
              <div class="dropdown">
                <div class="dropdown-menu dropdown-menu-right"> </div>
              </div>
          </div>
          <div class="card-body">
            <div style="text-align: center;" class="chart-area">
              <img src="/admin/assets/img/basket-icon.png">
            </div>
          </div>
          <div class="card-footer">
            <div class="stats"> </div>
          </div>
          </a>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">All letters from tourists</h5>
            <a href="/admin/request_info.php">
            <h4 class="card-title">Request info</h4>
          </div>
          <div class="card-body">
            <div style="text-align: center;" class="chart-area">
              <img src="/admin/assets/img/letter-icon.png">
            </div>
          </div>
          <div class="card-footer">
            <div class="stats"> </div>
          </div>
        </a>
        </div>
      </div>
    </div>
  </div> <!-- content -->

<?php 
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/footer.php';
?> 

