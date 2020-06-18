<?php
Include '../configs/db.php';
$page = "request_info"; 
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';
?>


<div class="main-panel" id="main-panel">
  <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">       
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>
              <!-- <li class="breadcrumb-item"><a href="/admin/category.php">Category</a></li> -->
            <li class="breadcrumb-item active">Request information</li>
          </ol>
      </nav>
    </div>
  </nav>
  <br><br><br><br><br>
  <!--Table-->
<div class="card-body table-full-width table-responsive">  
<table class="table table-striped w-auto">
  <!--Table head-->
  <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Phone</th>
      <th>Email</th>
      <th>Message</th>
      <th>Time</th>
      <th>Options</th>
      <th>Status</th>
    </tr>
  </thead>
  <!--Table head-->

  <!--Table body-->
  <tbody>
    <?php
    $sql = "SELECT * FROM message";
    //наш конект выполнит запрос который мы передадим sql
         $result = $conn->query($sql);
         while ($row = mysqli_fetch_assoc($result)) {
            ?>
  <tr>
        <td><?php echo $row ['user_id']?></td>
        <td><?php echo $row ['name']?></td>
        <td><?php echo $row ['phone']?></td>
        <td><?php echo $row ['email']?></td>
        <td><?php echo $row ['text']?></td>
        <td><?php echo $row ['Time']?></td>
        <td><div class="btn-group" role="group" aria-label="Basic example"></div>
            <?php
              if ($row['options'] == "Need unswer") {
                ?>
              <div class="btn btn-danger">Need unswer</div>  
              <?php
              } else {
                ?>
              <div class="btn btn-success">Already answered</div>  
              <?php  
              }
              ?></td>
        <td>
          <div class="btn-group" role="group" aria-label="Basic example"></div>
            <?php
              if ($row['Status'] == "NEW") {
                ?>
              <div class="btn btn-danger">NEW</div>  
              <?php
              } else {
                ?>
              <div class="btn btn-success">READY</div>  
              <?php  
              }
              ?>
          
        </td>
  </tr>

  <?php
    }
  ?>  
    
  </tbody>
  <!--Table body-->


</table>
</div>
<!--Table-->
</div>


        <?php 
         include 'parts/footer.php';
        ?> 
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>