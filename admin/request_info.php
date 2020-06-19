<!-- ================
Файл для вывода писем
==================-->
<?php
  //название раздела
  $page = "request_info"; 
  include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
  include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';
?>

<div class="main-panel" id="main-panel">
  <!--breadcrumb block-->
  <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">       
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>
            <li class="breadcrumb-item active">Request information</li>
          </ol>
      </nav>
    </div> 
  </nav>
  <!--End breadcrumb block-->
  <br><br><br><br><br>

  <!--Table-->
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <div class="card-header ">
                <h5 class="card-title">Request information</h5>
              </div> <!--End card-header-->

              <table class="table">
                <thead class=" text-primary">
                    <th>id</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Time</th>
                    <th>Options</th>
                    <th>Status</th>
                </thead>

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
                        <td><?php echo $row ['Time']?></td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/admin/modules/request_info/details.php?id=<?php echo $row ['id'] ?>" type="button" class="btn btn-info">INFO</a>
                          </div>
                        </td>
                        <td>
                          <div class="btn-group" role="group" aria-label="Basic example"></div>
                            <?php
                              if ($row['Status'] == "NEW") {
                                echo "<div class=\"btn btn-danger\">NEW!</div>";
                              } else {
                                echo "<div class=\"btn btn-success\">DONE</div>";
                              }
                            ?>          
                        </td>
                      </tr>
                      <?php
                    }
                  ?>      
                </tbody>
                <!--Table body-->
              </table><!--End Table-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!--End content-->
</div> <!--End main-panel-->

<!--Footer-->
<?php 
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/footer.php';
?> 
