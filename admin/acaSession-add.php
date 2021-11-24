<script src="../vendor/jquery/jquery.min.js"></script>
  
<?php

	session_start();
	require_once('../connect.php');
	if(!$_SESSION["iduser"]){
		header("location=../");
	}
	$session=$_SESSION["iduser"];

	// Call user detail
	$queryuser=mysqli_query($con, "SELECT * FROM user WHERE iduser='$session'");
	while($rowUser=mysqli_fetch_array($queryuser)){
		$userId=$rowUser["iduser"];
		$username=$rowUser["username"];
	}

	// Alert message
	function alertBox($message){
		return "<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">x</button>$message</div>";
	}
	$msgBox="";
?>

<?php
//$proposalId=$_GET["id"];

	// Insert query for new academic session
	if(isset($_POST['submit'])){
		$proacasession=$_POST['proacaSession'];
		$protitle=$_POST['protitle'];
		$userId=$_POST['userId'];
		$idacaDetail=$_POST['idacaDetail'];
		//echo $proaction=$_POST['proaction'];
		
		// check for duplicate
		$checkAcademicSessionDuplicate=mysqli_query($con, "SELECT * FROM academicsession WHERE acaSession='$proacasession'");
		if(mysqli_num_rows($checkAcademicSessionDuplicate)<=0){
			mysqli_query($con, "INSERT INTO academicsession ( iduser, pertekma, acaSession ) VALUES('$userId','$protitle','$proacasession')");
			$msgBox=alertBox('New PERTEKMA Batch added.');
		}else{
			$msgBox=alertBox('Current PERTEKMA Batch exist! Please add new PERTEKMA Batch');
		}
	}
// Insert query for edit academic session
	if(isset($_POST['edit'])){
		$proacasession=$_POST['proacaSession'];
		$protitle=$_POST['protitle'];
		$idacaSession=$_POST['idacaSession'];
		$userId=$_POST['userId'];
		
			mysqli_query($con, "UPDATE academicsession SET pertekma='$protitle', acaSession='$proacasession' WHERE acaSessionId='$idacaSession'");
			$msgBox=alertBox('PERTEKMA Batch Updated!');
	}

//Delete query for academic session
	if(isset($_POST['delete'])){
		//$proacasession=$_POST['proacaSession'];
		//$protitle=$_POST['protitle'];
		$idacaSession=$_POST['idacaSession'];
		//$userId=$_POST['userId'];
		
			mysqli_query($con, "DELETE FROM academicsession WHERE acaSessionId='$idacaSession'");
			$msgBox=alertBox('PERTEKMA Batch Deleted!');
	}
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PERTEKMA - Academic Session</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <script src="../css/calender/js/gijgo.min.js"></script>
<link href="../css/calender/css/gijgo.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.html">
        
        <div class="sidebar-brand-text mx-3">PERTEKMA Activity Monitoring</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item ">
        <a class="nav-link" href="../admin/index.php">
        <span>&nbsp;Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        
      </div>
           
 	  <!-- Proposal Pages  Menu -->
      <li class="nav-item">
        <a class="nav-link" href="proposal.php">
          <span>&nbsp;Activity Proposal</span></a>
      </li>
      
     <!-- Nav Item - Activity Pages  Menu --> 
      <!--<li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseActivity" aria-expanded="true" aria-controls="collapseActivity">
          <i class=""></i>
          <span>Activity</span>
        </a>
        <div id="collapseActivity" class="collapse" aria-labelledby="headingActivity" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="../admin/activityMonitoring.php">Activity Monitoring</a>
            <a class="collapse-item" href="../admin/activityEvaluation.php">Activity Evaluation</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        
      </div>

    <!-- PERTEKMA Committee -->
    <li class="nav-item active ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class=""></i>
          <span>PERTEKMA Committee</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage:</h6>
            <a class="collapse-item" href="acaSession-add.php">PERTEKMA Batch</a>
          </div>
        </div>
      </li>
           
      <!--<li class="nav-item">
        <a class="nav-link" href="../admin/user.php">
        <span>&nbsp;User</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <!--<li class="nav-item">
        <a class="nav-link" href="../charts.html">
        <span>&nbsp;Statistical Data View</span></a>
      </li>



      <!-- Divider -->
      <!--<hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            

            <!-- Nav Item - Messages -->
            

            

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome! I am&nbsp;<?php echo $username; ?></span>
                <img class="img-profile rounded-circle" src="../img/sue.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage PERTEKMA Batch</h1>
           
          </div>
			
			
          <div class="">
  			<p class="lead">
  				<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#newAcademicSession">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Add New PERTEKMA Batch
                </a>
			</p>
		  </div>

          <!-- Content Row -->

          <div id="page-wrapper">
            <div class="row">
            	<div class="col-lg-12">
            	<?php if($msgBox){ echo $msgBox; } ?>
            		<div class="card shadow mb-4">
					<div class="card-header py-3">
					  <h6 class="m-0 font-weight-bold text-primary">List of Current PERTEKMA Batch</h6>
					</div>
					<div class="card-body">
					  <div class="table-responsive">
						<table class="table table-bordered" id="" width="100%" cellspacing="0">
						  <thead>
							<tr>
							  <th>Title</th>
							  <th>PERTEKMA Batch</th>
							  <th width="20%">Action</th>
							</tr>
						  </thead>
						  <tbody>
							<?php 
							$academicsession=mysqli_query($con, "SELECT * FROM academicsession ORDER BY acaSessionId DESC");
							  while($col = mysqli_fetch_array($academicsession)){
								  $Title=$col["pertekma"];
								  $AcademicSession=$col["acaSession"];
							?>

							<tr>
							  <td><?php echo $Title; ?></td>
							  <td><?php echo $AcademicSession; ?></td>
							  <td>
								  <a href="acaSession-add2.php?id=<?php echo $col["acaSessionId"]; ?>" class="" data-toggle="modal"><span class="btn btn-primary btn-xs fa fa-plus-square" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add Details"></span></a>
								  
								  <a href="#" class="" data-toggle="modal" data-target="#editAcademicSession<?php echo $col["acaSessionId"]; ?>"><span class="btn btn-primary btn-xs fa fa-edit" data-toggle="tooltip" data-placement="left" title="" data-original-title="Edit Detail"></span></a>
								  
								  <a href="acaSession-view.php?id=<?php echo $col["acaSessionId"]; ?>" class="" data-toggle="modal"><span class="btn btn-primary btn-xs fa fa-window-maximize" data-toggle="tooltip" data-placement="left" title="" data-original-title="View Details"></span></a> 
								  
								  <a href="#" class="" data-toggle="modal" data-target="#deleteAcademicSession<?php echo $col["acaSessionId"]; ?>"><span class="btn btn-danger btn-xs fa fa-trash-alt" data-toggle="tooltip" data-placement="left" title="" data-original-title="Delete Batch"></span></a>
								  
							  </td>
							</tr>
							
<!-- Edit Academic Session Modal-->
  <div class="modal fade" id="editAcademicSession<?php echo $col["acaSessionId"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div id="largeModal" class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit PERTEKMA Batch</h5>
        </div>
        <div class="modal-body">
       <form method="post" action="">
       	   <div class="form-group row">
		   <label class="col-form-label col-sm-2">Batch:</label>
		   		   <div class="col-sm-10 row">&nbsp;&nbsp;&nbsp;
					<select name="proacaSession" class="form-control col-sm-10">
						<option <?php if($col["acaSession"]=='2017/2018'){echo "value='2017/2018' selected"; } ?> >2017/2018</option>
						<option <?php if($col["acaSession"]=='2018/2019'){echo "value='2018/2019' selected"; } ?> >2018/2019</option>
						<option <?php if($col["acaSession"]=='2019/2020'){echo "value='2019/2020' selected"; } ?> >2019/2020</option>
						<option <?php if($col["acaSession"]=='2020/2021'){echo "value='2020/2021' selected"; } ?> >2020/2021</option>
					    <option <?php if($col["acaSession"]=='2021/2022'){echo "value='2021/2022' selected"; } ?> >2021/2022</option>
						<option <?php if($col["acaSession"]=='2022/2023'){echo "value='2022/2023' selected"; } ?> >2022/2023</option>
						<option <?php if($col["acaSession"]=='2023/2024'){echo "value='2023/2024' selected"; } ?> >2023/2024</option>
						<option <?php if($col["acaSession"]=='2024/2025'){echo "value='2024/2025' selected"; } ?> >2024/2025</option>
						<option <?php if($col["acaSession"]=='2025/2026'){echo "value='2025/2026' selected"; } ?> >2025/2026</option>
						<option <?php if($col["acaSession"]=='2026/2027'){echo "value='2026/2027' selected"; } ?> >2026/2027</option>
						<option <?php if($col["acaSession"]=='2027/2028'){echo "value='2027/2028' selected"; } ?> >2027/2028</option>
					 </select>
		   </div>
		   </div>

		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2">Title:</label>
		   <div class="col-sm-10">
		   	<input type="text" name="protitle" class="form-control" value="<?php echo $Title; ?>">
		   </div>
		   </div>
		   
		   
           
		  <input type="hidden" name="userId" value="<?php echo $session; ?>">
		 
		  </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="input" name="edit">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
					
<!-- Delete PERTEKMA Batch Modal-->
  <div class="modal fade" id="deleteAcademicSession<?php echo $col["acaSessionId"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this?</h5>
        </div>
        <div class="modal-body">
       <form method="post" action="">
       	   <div class="form-group row">
		   <label class="col-form-label col-sm-2">Batch:</label>
		   		   <div class="col-sm-10 row">&nbsp;&nbsp;&nbsp;
		   		   <label class="col-form-label col-sm-4"><?php echo $col["acaSession"]; ?></label>
		   </div>
		   </div>

		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2">Title:</label>
		   <div class="col-sm-10">
		   <label class="col-form-label col-sm-10"><?php echo $Title; ?></label>
		   </div>
		   </div>
		   
		   
           
		  <input type="hidden" name="userId" value="<?php echo $session; ?>">
		  <input type="hidden" name="idacaSession" value="<?php echo $col["acaSessionId"]; ?>">
		  </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="delete" name="delete">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>					
						
							
							<?php } ?>
						  </tbody>
						</table>
					  </div>
					</div>
				  </div>
				</div>
            </div>
             </div>
             
                
                <!-- /.col-lg-4 -->

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; PERTEKMA, FCSIT 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="../#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Insert New Proposal Modal-->
  <div class="modal fade" id="newAcademicSession" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div id="largeModal" class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New PERTEKMA Batch</h5>
        </div>
        <div class="modal-body">
       <form method="post" action="">
       	   <div class="form-group row">
		   <label class="col-form-label col-sm-2">Batch:</label>
		   <div class="col-sm-10 row">&nbsp;&nbsp;&nbsp;
										<select name="proacaSession" class="form-control col-sm-10">
											<option value="2017/2018"selected>2017/2018</option>
											<option value="2018/2019">2018/2019</option>
											<option value="2018/2019">2019/2020</option>
											<option value="2019/2020">2020/2021</option>
									    	<option value="2019/2020">2021/2022</option>
										    <option value="2020/2021">2022/2023</option>
											<option value="2021/2022">2023/2024</option>
											<option value="2022/2023">2024/2025</option>
											<option value="2023/2024">2025/2026</option>
											<option value="2024/2025">2026/2027</option>
											<option value="2025/2026">2027/2028</option>
										 </select>
		   </div>
		   </div>

		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2">Title:</label>
		   <div class="col-sm-10">
		   	<input type="text" name="protitle" placeholder='eg: PERTEKMA 2017/2018' class="form-control">
		   </div>
		   </div>
		   
		   
           
		  <input type="hidden" name="userId" value="<?php echo $session; ?>">
		   <input type="hidden" name="idacaDetail" value="<?php echo $col["idacaDetail"]; ?>">
		  </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="input" name="submit">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>
  
  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
  
<script>
	$(document).ready(function() {
  $('#dataTable').DataTable();
});

</script>
<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
			format: 'dd-mm-yyyy'
        });
    </script>
    <script>
	$('#timepicker').timepicker({
            uiLibrary: 'bootstrap4',
			format: 'h:M TT'
        });
    </script>
     <script>
		 $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
		  </script>
</body>

</html>
