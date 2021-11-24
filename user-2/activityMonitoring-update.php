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
//query for display the update activity log 
$proposalId=$_GET["id"];
//$username=$_GET["username"];

if(isset($_POST['submiting'])){
	//$con=mysqli_connect("localhost", "root", "", "db_quality")or die(mysqli_error());
	  //$id_activitymonitoring=$_POST['id_activitymonitoring'];
	  //$proposalId=$_POST['id_proposal'];
	  //$username=$_POST['username'];
	  $prodate=$_POST['prodate'];
	  $prologdetail=$_POST['prologdetail'];
	  //$proadvisor_comment=$_POST['proadvisor_comment'];
	//counter
	for($i=0;$i<count($prologdetail);$i++){
		// condition where each item must met
		if($prodate[$i]!="" && $prologdetail[$i]!=""){
			//check exist
			$queryexist=mysqli_query($con, "SELECT * FROM activitymonitoring WHERE id_proposal='$proposalId' AND date='$prodate[$i]' AND username='$username'");
			if(mysqli_num_rows($queryexist)<=0){
				//echo "INSERT INTO activitymonitoring (id_proposal,username,date,logdetail) VALUES('$proposalId','$username','$prodate[$i]','$prologdetail[$i]')";
				mysqli_query($con, "INSERT INTO activitymonitoring (id_proposal,username,date,logdetail) VALUES('$proposalId','$username','$prodate[$i]','$prologdetail[$i]')");
			}else{
				//echo "UPDATE activitymonitoring SET logdetail='$prologdetail[$i]' WHERE id_proposal='$proposalId' AND date='$prodate[$i]' AND username='$username'";
				mysqli_query($con, "UPDATE activitymonitoring SET logdetail='$prologdetail[$i]' WHERE id_proposal='$proposalId' AND date='$prodate[$i]' AND username='$username'");
			}
			// if all of the condition met
			//echo "INSERT INTO activitymonitoring (id_proposal, username, date, logdetail) VALUES('$proposalId', '$username[$i]','$prodate[$i]','$prologdetail[$i]')";
			
			
			$msgBox=alertBox('Details Updated.');
			
			//mysqli_query($con, "UPDATE INTO activitymonitoring (id_proposal, username, date, logdetail) VALUES('$proposalId', '$username[$i]','$prodate[$i]','$prologdetail[$i]')");
			header('Location:activityMonitoring-view.php?id='.$proposalId.'&username='.$username);
  		}else{
			// if one of the condition are not met
			$msgBox = alertBox('No function found. Please try again.');}
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

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  
  
  <link rel="stylesheet" href="../vendor/jquery/jquery-ui.css">
  
  <script src="../vendor/jquery/jquery-ui.js"></script>
  <script>
		$( function() {
    $( "#datepicker" ).datepicker();
  } );

</script>

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

     <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class=""></i>
          <span>Activity Monitoring</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
     		<h6 class="collapse-header">Manage:</h6>
            <a class="collapse-item" href="activity-JobScope.php?id=<?php echo $proposalId; ?>">Activity Execution</a>
            <a class="collapse-item" href="activityMonitoring-view.php?id=<?php echo $proposalId; ?>">Activity Log</a>
            <h6 class="collapse-header">Back to:</h6>
            <a class="collapse-item" href="activityMonitoring.php" >List of Activity</a>
          </div>
        </div>
      </li>


      <!-- Heading -->
      <div class="sidebar-heading">
        
      </div>





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
            <h1 class="h3 mb-0 text-gray-800">Activity Monitoring </h1>
           
          </div>
              <div class="row">
        <div class="col-lg-12">
            <div class="text-center">
                <h3>Input Activity Log</h3>
            </div>
        </div>
    </div>
          <div id="page-wrapper">
             <div class="card-body">
                <div class="row">
					<div class="col-md-3 col-lg-12">
                        <div class="form-group">
                            <div class="form-group row">
                            	<label class="col-sm-2 col-form-label"><b>Exco:</b></label>
                            	<div class="col-sm-10">
                            	    <label class="col-sm-10 col-form-label" ><?php echo $username; ?></label>
								</div>
								<label class="col-sm-2 col-form-label"><b>Activity:</b></label>
                            	<div class="col-sm-10">
                            	    <label class="col-sm-10 col-form-label" ><?php $queryTitle=mysqli_query($con, "SELECT * FROM proposal WHERE 	proposald='$proposalId'");
						$rowTitle=mysqli_fetch_array($queryTitle);
						echo $rowTitle["proposalTitle"];
						?></label>
								</div>
							</div>
                        </div>
                        
                        
                    <div class="card shadow mb-4">
					<div class="card-header py-3">
					  <h6 class="m-0 font-weight-bold text-primary">Update Activity Log Notes</h6>
					</div>
					<div class="card-body">
					  <div class="table-responsive">
						<table class="table table-bordered" width="100%" cellspacing="0">
						  <thead>
							<tr>
							  <th width="13%">Date</th>
							  <th>Activity/Programs</th>
					  	   	   <?php 
							   $proposal=mysqli_query($con, "SELECT * FROM proposal WHERE proposalD='$proposalId'");
							     $col = mysqli_fetch_array($proposal);
							   	  $date1=$col["date1"];
							   	  $date2=$col["date2"];
							   ?>  			  
						  	   <?php
                                 $begin = new DateTime($date1);
                                 $end = new DateTime($date2);
								 $end->add(new DateInterval('P1D'));
								 $end2=$end;
                                 
                                 $interval = DateInterval::createFromDateString('1 day');
                                 $period = new DatePeriod($begin, $interval, $end2);
                                 ?>
							</tr>
						  </thead>
						  <tbody>
						  <form role="form" action="" method="post">
						  <?php 
							  foreach ($period as $dt) {
								  $normaldate=$dt->format("d-m-Y");
								  ?>
                               	<tr>
							  	<td>
						         <input type="text" readonly id="datepicker" class="form-control-plaintext" name="prodate[]" value="<?php echo $dt->format("d-m-Y"); ?>">
						      </td>
						      <td><?php $queryMonitoring=mysqli_query($con, "SELECT * FROM activitymonitoring WHERE id_proposal='$proposalId' AND username='$username' AND date='$normaldate'");
								$rowlogdetail=mysqli_fetch_array($queryMonitoring);?>
                                
                                 <textarea rows="3" name="prologdetail[]" class="form-control"><?php echo $rowlogdetail["logdetail"]; ?></textarea>
                                 <?php 
                                 
							 ?>
                              </td>
							  </tr>
                                	<?php 
                                 }
							 ?>
					  </tbody>
						</table>
					  </div>
					</div>                      
                    </div>
               </div>
            </div>			
		  </div>
          
<div class="row">
    <div class="col-lg-12">
        <div style="float: right;">
           <a class="btn btn-success btn-lg" href="activityMonitoring-view.php?id=<?php echo $proposalId; ?> " id="btnBack"><i class="fa fa-backward"></i> Back</a>
           <button id="submit" name="submiting" class="btn btn-success btn-lg"><i class="fa fa-save"></i>Update</button>
           <a class="btn btn-warning btn-lg" href="" id="btnToTop"><i class="fa fa-arrow-up"></i> Top</a>
             </form>
        </div>
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
          <a class="btn btn-primary" href="index.php">Logout</a>
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
  
  
 
 
<script>
	$(document).ready(function() {
  $('#dataTable').DataTable();
});
</script> 

</body>

</html>
