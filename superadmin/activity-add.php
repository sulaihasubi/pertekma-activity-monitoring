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
// Get id from url
$proID=$_GET["id"];

if(isset($_POST['submiting'])){
		 $proactivityTitle=$_POST['proactivityTitle'];
		//$protime=$_POST['protime'];
		//$changetime=date("Y-m-d H:i:s", strtotime($protime));
		 $prodate1=$_POST['prodate1'];
		 $changeformat1=date('Y-m-d',strtotime($prodate1));
		 $prodate2=$_POST['prodate2'];
		 $changeformat2=date('Y-m-d',strtotime($prodate2));
		 $protime1=$_POST['protime1'];
		 $protime2=$_POST['protime2'];
		 $proactivityLocation=$_POST['proactivityLocation'];
		 $proobjective=$_POST['proobjective'];
		//echo $userId=$_POST['userId'];
		//echo $proaction=$_POST['proaction'];
	
		// check for activity title duplicate
		$checkActivityTitleDuplicate=mysqli_query($con, "SELECT * FROM activity WHERE activityTitle='$proactivityTitle'");
		if(mysqli_num_rows($checkActivityTitleDuplicate)<=0){
			mysqli_query($con, "INSERT INTO activity (iduser,activityTitle, date1, date2, time1, time2, activityLocation, objective) VALUES('$userId','$proactivityTitle','$changeformat1', $changeformat2', '$protime1', '$protime2','$proactivityLocation', '$proobjective')");
			$msgBox=alertBox('New Activity added.');
		}else{
			$msgBox=alertBox('Similar activity added. Please check title.');
		}
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

  <title>PERTEKMA - Activity Monitoring</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../css/form.css" rel="stylesheet" type="text/css">
  
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <script src="../css/calender/js/gijgo.min.js"></script>
  <link href="../css/calender/css/gijgo.min.css" rel="stylesheet">
  <link href="../css/bootstrap.min.css" rel="stylesheet">

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
          
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        
      </div>
           
           
 	  <!-- Nav Item - Proposal Pages  Menu -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class=""></i>
          <span>Activity Proposal</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage:</h6>
            <a class="collapse-item" href="proposal.php">List of Proposal</a>
            <a class="collapse-item" href="activity.php?id=<?php echo $proposalId; ?>" >Program</a>
            <a class="collapse-item" href="jawatanpelaksana-add.php?id=<?php echo $proposalId; ?>" >Committee Members</a>
			<a class="collapse-item" href="jawatanpelaksana-jobscope.php?id=<?php echo $proposalId; ?>" >Job Scope</a>
            <a class="collapse-item" href="equipment.php?id=<?php echo $proposalId; ?>" >Equipments</a>
            <a class="collapse-item" href="budget.php?id=<?php echo $proposalId; ?>" >Budget</a>
            
          </div>
        </div>
      </li>
      
     <!-- Nav Item - Activity Pages  Menu --> 
      <li class="nav-item ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseActivity" aria-expanded="true" aria-controls="collapseActivity">
          <i class=""></i>
          <span>Activity Monitoring</span>
        </a>
        <div id="collapseActivity" class="collapse" aria-labelledby="headingActivity" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage:</h6>
            <a class="collapse-item" href="activityMonitoring.php">Activity Log Note</a>
            <a class="collapse-item" href="activityEvaluation.php">Activity Evaluation</a>
          </div>
        </div>
      </li>
     
      
     <!-- Activity Monitoring Pages  Menu --> 
      
      
     <!-- Activity Evaluation Pages  Menu --> 
      
     
      <!-- Nav Item - Pages Collapse Menu -->
      

      <!-- Nav Item - Utilities Collapse Menu -->
      

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        
      </div>

   <!-- PERTEKMA Committee -->
    <li class="nav-item  ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
          <i class=""></i>
          <span>PERTEKMA Committee</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
           
            <a class="collapse-item" href="acaSession-add.php">Academic Session</a>
          </div>
        </div>
      </li>
    
            <li class="nav-item ">
        <a class="nav-link" href="../">
          <span>User</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="../charts.html">
          <span>Statistical Data View</span></a>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username; ?></span>
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
            <h1 class="h3 mb-0 text-gray-800">Manage Program </h1>         
          </div>
          
          <div id="page-wrapper">
           <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                    
                </div>
            </div>
            <div class="row">
                 <div class="col-md-3 col-lg-12">
                    <div class="form-group">
                      <label class="control-label"><b>7.0 Perincian Program</b></label>
                    </div>
                 </div>
                 
                <div class="col-lg-12">
                	<div class="controls">
                	<form role="form" action="" method="post">
                		<div class="entry input-group">
							<div class="col-lg-12">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Tajuk</label>
									<div class="col-sm-10">
									<input type="name" class="form-control" name="proactivityTitle" placeholder="Title">
									</div>
								</div>
								
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Tarikh Mula</label>
									<div class="col-sm-10">&nbsp;&nbsp;&nbsp;
									<input for="inputq" name="prodate1" class="form-control col-sm-3" type="text"  value="<?php echo date("d-m-Y");?>" id="datepicker">
	  
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Tarikh Tamat</label>
									<div class="col-sm-10">&nbsp;&nbsp;&nbsp;
									<input name="prodate2" class="form-control col-sm-3" type="text"  value="<?php echo date("d-m-Y");?>" id="datepicker2">
	  
									</div>
								</div>
								
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Masa</label>
									<div class="col-sm-10 row">&nbsp;&nbsp;&nbsp;
										<select name="protime1" class="form-control col-sm-3">
											<option value="7:00 a.m">7:00 a.m</option>
											<option value="7:30 a.m">7:30 a.m</option>
											<option value="8:00 a.m" selected>8:00 a.m</option>
											<option value="8:30 a.m">8:30 a.m</option>
										   <option value="9:00 a.m">9:00 a.m</option>
										   <option value="9:30 a.m">9:30 a.m</option>
										   <option value="10:00 a.m">10:00 a.m</option>
										   <option value="10:30 a.m">10:30 a.m</option>
										   <option value="11:00 a.m">11:00 a.m</option>
										   <option value="11:30 a.m">11:30 a.m</option>
										   <option value="12:00 p.m">12:00 p.m</option>
										   <option value="12:30 p.m">12:30 p.m</option>
										   <option value="1:00 p.m">1:00 p.m</option>
										   <option value="1:30 p.m">1:30 p.m</option>
										   <option value="2:00 p.m">2:00 p.m</option>
										   <option value="2:30 p.m">2:30 p.m</option>
										   <option value="3:00 p.m">3:00 p.m</option>
										   <option value="3:30 p.m">3:30 p.m</option>
										   <option value="4:00 p.m">4:00 p.m</option>
										   <option value="4:30 p.m">4:30 p.m</option>
										   <option value="5:00 p.m">5:00 p.m</option>
										   <option value="5:30 p.m">5:30 p.m</option>
										   </select>

										   &nbsp;
										   <label class="col-form-label">to</label>
											&nbsp;
										   <select name="protime2" class="form-control col-sm-3">
										   <option value="7:00 a.m">7:00 a.m</option>
										   <option value="7:30 a.m">7:30 a.m</option>
										   <option value="8:00 a.m">8:00 a.m</option>
										   <option value="8:30 a.m">8:30 a.m</option>
										   <option value="9:00 a.m">9:00 a.m</option>
										   <option value="9:30 a.m">9:30 a.m</option>
										   <option value="10:00 a.m">10:00 a.m</option>
										   <option value="10:30 a.m">10:30 a.m</option>
										   <option value="11:00 a.m">11:00 a.m</option>
										   <option value="11:30 a.m">11:30 a.m</option>
										   <option value="12:00 p.m">12:00 p.m</option>
										   <option value="12:30 p.m">12:30 p.m</option>
										   <option value="1:00 p.m">1:00 p.m</option>
										   <option value="1:30 p.m">1:30 p.m</option>
										   <option value="2:00 p.m">2:00 p.m</option>
										   <option value="2:30 p.m">2:30 p.m</option>
										   <option value="3:00 p.m">3:00 p.m</option>
										   <option value="3:30 p.m">3:30 p.m</option>
										   <option value="4:00 p.m">4:00 p.m</option>
										   <option value="4:30 p.m">4:30 p.m</option>
										   <option value="5:00 p.m" selected>5:00 p.m</option>
										   <option value="5:30 p.m">5:30 p.m</option>
										   </select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Tempat</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="proactivityLocation" placeholder="">
									</div>
								</div>
							   <div class="form-group row">
								   <label class="col-form-label col-sm-2">Objektif:</label>
								   <div class="col-sm-10">
								   <textarea name="proobjective" class="form-control" rows="6"></textarea>
								   </div>
							   </div>														
							</div>
                			
              		
              		
               		<button name="submiting" class="btn btn-success btn-add"><i class="fa fa-plus "></i> </button>
               		
               		
                		</div>
                		
					</div>
                </div>
            </div>
			  </div>
           
           
           <div class="row">
    <div class="col-lg-12">
        <div style="float: right;">
            <a href="../admin/proposal-add.php" class="btn btn-success btn-lg" id="btnBack"><i class="fa fa-backward"></i> Back</a>
            <button id="submit" name="submittrr" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Next</button>
            <a class="btn btn-warning btn-lg" href="#" id="btnToTop"><i class="fa fa-arrow-up"></i> Top</a>
        </div>
    </div>
    </form>
</div>
           
			
		</div>
          
          
          
          

          <!-- Content Row -->
          

          <!-- Content Row -->

          

          <!-- Content Row -->
          

        </div>
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
          <a class="btn btn-primary" href="../login.html">Logout</a>
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
	$('#datepicker2').datepicker({
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
