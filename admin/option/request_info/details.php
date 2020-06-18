<?php
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
// $page = "request_info"; 
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
        <td>
          <div class="btn-group" role="group" aria-label="Basic example">
            <a href="option/request_info/details.php?id=<?php echo $row ['id'] ?>" type="button" class="btn btn-info">info</a>
          </div>
        </td>
        <td>
          <div class="btn-group" role="group" aria-label="Basic example"></div>
            <?php
              if ($row['Status'] == "NEW") {
                ?>
              <div class="btn btn-danger">NEW</div>  
              <?php
              } else {
                ?>
              <div class="btn btn-success">ANSWERED</div>  
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
         include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/footer.php';
        ?> 
    </div>
  </div>
</body>

</html>