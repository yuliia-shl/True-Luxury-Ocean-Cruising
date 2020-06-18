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
        <a class="navbar-brand" href="#pablo">Home</a>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#pablo">
              <i class="now-ui-icons users_single-02"></i>
              <p>
                <span class="d-lg-none d-md-block">Account</span>
              </p>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="panel-header panel-header-lg">
    <canvas id="bigDashboardChart"></canvas>
  </div>

  <div class="content">
    <div class="row">
      <div class="col-lg-4">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">Global Sales</h5>
            <h4 class="card-title">Shipped Products</h4>
            <div class="dropdown">
            </div>
          </div>
          <div class="card-body">
            <div class="chart-area">
              <canvas id="lineChartExample"></canvas>
            </div>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">2018 Sales</h5>
            <h4 class="card-title">All products</h4>
            <div class="dropdown">
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <a class="dropdown-item text-danger" href="#">Remove Data</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-area">
              <canvas id="lineChartExampleWithNumbersAndGrid"></canvas>
            </div>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-category">Email Statistics</h5>
            <h4 class="card-title">24 Hours Performance</h4>
          </div>
          <div class="card-body">
            <div class="chart-area">
              <canvas id="barChartSimpleGradientsNumbers"></canvas>
            </div>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="now-ui-icons ui-2_time-alarm"></i> Last 7 days
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- content -->

<?php 
		include 'parts/footer.php';
?> 

