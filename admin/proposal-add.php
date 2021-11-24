
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
$proposalId=$_GET["id"];

// Select proposal detail
//SELECT COUNT(*) proposal WHERE
$queryproposal=mysqli_query($con, "SELECT * FROM proposal WHERE proposald='$proposalId'");
$rowproposal=mysqli_num_rows($queryproposal);
//echo count($rowproposal["location"]);
//check for existing data
if($rowproposal["tujuan"]!=NULL or $rowproposal["pendahuluan"]!=NULL){
	header('Location:proposal-add-edit.php?id='.$proposalId);
}

	// Insert query form into db
	if(isset($_POST['submiting'])){
		 $protujuan=$_POST['protujuan'];
		 $propendahuluan=$_POST['propendahuluan'];
		 $proobjektif=$_POST['proobjektif'];
		 $propenganjur=$_POST['propenganjur'];
		 $prosasaran=$_POST['prosasaran'];
		 $proID=$_POST['proposald'];

		//echo "UPDATE proposal SET tujuan='$protujuan', pendahuluan='$propendahuluan', objektif='$proobjektif', penganjur='$propenganjur', sasaran='$prosasaran' WHERE proposald='$proID'";
			mysqli_query($con, "UPDATE proposal SET tujuan='$protujuan', pendahuluan='$propendahuluan', objektif='$proobjektif', penganjur='$propenganjur', sasaran='$prosasaran' WHERE proposald='$proposalId'");
		
			//$msgBox=alertBox('Saved!');
		header('Location:activity.php?id='.$proposalId);
		//}else{
		//	$msgBox=alertBox('Please fill the form');
		//}
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

  <title>PERTEKMA - Proposal</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="../css/form.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

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
        <a class="nav-link" href="index.php">
        <span>&nbsp;Dashboard</span></a>
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
            <a class="collapse-item" href="activity.php?id=<?php echo $proposalId; ?>" >List of Program</a>
            <a class="collapse-item" href="activity2-tentative.php?id=<?php echo $proposalId; ?>" >Program Tentative</a>
            <a class="collapse-item" href="jawatanpelaksana-add.php?id=<?php echo $proposalId; ?>" >Committee Members</a>
            <a class="collapse-item" href="jawatanpelaksana-jobscope.php?id=<?php echo $proposalId; ?>" >Job Scope</a>
            <a class="collapse-item" href="equipment.php?id=<?php echo $proposalId; ?>" >Equipments</a>
            <a class="collapse-item" href="budget.php?id=<?php echo $proposalId; ?>" >Budget</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Back to:</h6>
            <a class="collapse-item" href="proposal.php?id=<?php echo $proposalId; ?>" >List of Proposal</a>
          </div>
        </div>
      </li>
      
     <!-- Nav Item - Activity Pages  Menu --> 
     <li class="nav-item">
        <a class="nav-link" href="activityPostmortem.php">
          <span>&nbsp;Activity Post-Mortem</span></a>
      </li>

      

      <!-- Heading -->
      <div class="sidebar-heading">
        
      </div>
  	  <!--Activity Monitoring -->
      <!--<li class="nav-item">
        <a class="nav-link" href="activityMonitoring.php">
          <span>&nbsp;Activity Monitoring</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider">

   <!-- PERTEKMA Committee -->
    <li class="nav-item ">
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
      

      <!-- Nav Item - Charts -->
      <!--<li class="nav-item">
        <a class="nav-link" href="../charts.html">
          <span>&nbsp;Statistical Data View</span></a>
      </li>



     

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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome, I am&nbsp;<?php echo $username; ?></span>
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
            <h1 class="h3 mb-0 text-gray-800">Activity Proposal Form </h1>
          </div>

          <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center">
                <h3><?php $queryproposal=mysqli_query($con, "SELECT * FROM proposal WHERE proposald='$proposalId'"); 
								$col = mysqli_fetch_array($queryproposal);
								$Title=$col["proposalTitle"];
								?>
          <?php echo $Title=$col["proposalTitle"]; ?>
           </h3>
            </div>
        </div>
    </div>
    <div id="page-wrapper">
              <?php $proposal=mysqli_query($con, "SELECT * FROM proposal WHERE proposald='$proposalId'");
					$col = mysqli_fetch_array($proposal);
								  $Title=$col["proposalTitle"];
								  $date1=$col["date1"];
								  $date2=$col["date2"];
								  $time_1=$col["time_1"];
								  $time_2=$col["time_2"];
								  $Location=$col["location"];
								  $Tujuan=$col["tujuan"];
		
						?>
               <form method="post" action="">
                <div class="card-body">
                <div class="row">
                    <div class="col-md-3 col-lg-12">
                        <div class="form-group">
                            <label class="control-label"><b>1.0 Tujuan</b></label>
							
                            <textarea rows="3" name="protujuan" class="form-control"><?php echo $Tujuan=$col["tujuan"]; ?></textarea>
                        </div>
                    </div>
					
					<div class="col-md-3 col-lg-12">
                        <div class="form-group">
                            <label class="control-label"><b>2.0 Pendahuluan</b></label>
                            <textarea rows="6" name="propendahuluan" class="form-control"><?php echo $date1=$col["pendahuluan"];?></textarea>
                        </div>
                    </div>
					
					<div class="col-md-3 col-lg-12">
                        <div class="form-group">
                            <label class="control-label"><b>3.0 Objektif</b></label>
                            <textarea rows="6" name="proobjektif" class="form-control"><?php echo $date1=$col["objektif"];?></textarea>
                        </div>
                    </div>
					
					<div class="col-md-3 col-lg-12">
                        <div class="form-group">
                           <label class="control-label"><b>4.0 Tarikh dan Tempat</b></label>
                            <div class="form-group row">
                            	<label class="col-sm-1 col-form-label"><b>Tarikh:</b></label>
                            	<div class="col-sm-11">
                            	    <label class="col-sm-11 col-form-label" style="text-align: justify;"><?php echo $col["date1"]; ?>&nbsp;hingga&nbsp;<?php echo $date2; ?></label>
								</div>
							</div>
                           <div class="form-group row">
                            	<label class="col-sm-1 col-form-label"><b>Tempat:</b></label>
                            	<div class="col-sm-11">
                            		<label class="col-sm-11 col-form-label" style="text-align: justify;"><?php echo $Location; ?></label>
								</div>
							</div>
                        </div>
                    </div>
					
					<div class="col-md-3 col-lg-12">
                        <div class="form-group">
                            <label class="control-label"><b>5.0 Penganjur</b></label>
                            <textarea rows="6" name="propenganjur" class="form-control"><?php echo $date1=$col["penganjur"];?></textarea>
                        </div>
                    </div>
					
					<div class="col-md-3 col-lg-12">
                        <div class="form-group">
                            <label class="control-label"><b>6.0 Sasaran</b></label>
                            <textarea rows="6" name="prosasaran" class="form-control"><?php echo $date1=$col["sasaran"];?></textarea>
                        </div>
                    </div>
                </div>
            </div>	
            <input type="hidden" name="userId" value="<?php echo $session; ?>">
            <input type="hidden" name="proposald" value="<?php echo $rowproposal["proposald"]; ?>">	
            
		  </div>
          
        <div class="row">
		<div class="col-lg-12">
			<div style="float: right;">
				<button id="submit" name="submiting" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Next</button>
				
				<a class="btn btn-warning btn-lg" href="#" id="btnToTop"><i class="fa fa-arrow-up"></i> Top</a>
			</div>
		</div>
		</form>
		</div>  



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
          <a class="btn btn-primary" href="../index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
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

</body>

</html>
