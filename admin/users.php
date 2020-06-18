<?php
$page = "users";
include $_SERVER['DOCUMENT_ROOT'].'/configs/db.php';
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/header.php';



?>

<div class="main-panel" id="main-panel">
  <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">       
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/index.php">Home</a></li>
              <!-- <li class="breadcrumb-item"><a href="/admin/category.php">Category</a></li> -->
            <li class="breadcrumb-item active">Users</li>
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
		    
		  	<tr>
		        <td>ййй</td>
		        <td>ццц</td>
		        <td>кккк</td>
		        <td>еее</td>
		        <td>ннн</td>
		        <td>ггг</td>
		        <td>
		        	<div class="btn-group" role="group" aria-label="Basic example"></div>
		            <div class="btn btn-danger">Need unswer</div>  
		            <div class="btn btn-success">Already answered</div> 
		        </td>
		        <td>
		          <div class="btn-group" role="group" aria-label="Basic example"></div>
	              <div class="btn btn-danger">NEW</div>  
	              <div class="btn btn-success">READY</div>  
		        </td>
		    </tr>
		  </tbody>
		  <!--Table body-->
		</table>
	</div>
	<!--Table-->
</div>



<?php
include $_SERVER['DOCUMENT_ROOT']. '/admin/parts/footer.php';
?>