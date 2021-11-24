<?php
	session_start();
	require_once('../connect.php');
	if(!$_SESSION["iduser"]){
		header("location=../");
	}
	$session=$_SESSION["iduser"];
	$queryuser=mysqli_query($con, "SELECT * FROM user WHERE iduser='$session'");
	while($rowUser=mysqli_fetch_array($queryuser)){
		$userId=$rowUser["iduser"];
		$username=$rowUser["username"];
	}
	
//count pending proposal
$queryCountProposal=mysqli_query($con,"SELECT COUNT(*) CountProposal FROM proposal WHERE proposalStatus2=0");
$row1=mysqli_fetch_array($queryCountProposal);
$numCountProposal=$row1["CountProposal"];

//count accapted proposal
$queryCountProposal1=mysqli_query($con,"SELECT COUNT(*) CountProposal1 FROM proposal WHERE proposalStatus2=1");
$row100=mysqli_fetch_array($queryCountProposal1);
$numCountProposal1=$row100["CountProposal1"];

//count number of proposal
$queryAllActivity=mysqli_query($con,"SELECT COUNT(*) AllActivity FROM activity");
$row2=mysqli_fetch_array($queryAllActivity);
$numAllActivity=$row2["AllActivity"];

//sum of income
$querySumIncome=mysqli_query($con,"SELECT SUM(jumlah) as total FROM b_income");
$row3=mysqli_fetch_array($querySumIncome);
$SumIncome=$row3["total"];

//sum of outcome
$querySumOutcome=mysqli_query($con,"SELECT SUM(jumlah) as outtotal FROM b_outcome");
$row15=mysqli_fetch_array($querySumOutcome);
$SumOutcome=$row15["outtotal"];

//count number of accepted proposal for Dekan Page (update academicSession)
$queryAllProposal=mysqli_query($con,"SELECT * FROM proposal WHERE proposalStatus='1' AND proposalStatus2='1' ");
while($row4=mysqli_fetch_array($queryAllProposal)){
	$Proposal=$row4["AcaSession"];
	$queryCountAcaSession=mysqli_query($con,"SELECT COUNT(*) targetProposal FROM proposal WHERE AcaSession='$Proposal'");
	while($row5=mysqli_fetch_array($queryCountAcaSession)){
		$targetProposal=$row5["targetProposal"];
		mysqli_query($con,"UPDATE academicsession SET totalProposal='$targetProposal' WHERE pertekma='$Proposal'");
	}
}

//Counter for graph
$queryacasession=mysqli_query($con,"SELECT * FROM academicsession");
while($row6=mysqli_fetch_array($queryacasession)){
	$getacasession[]=$row6["acaSession"];
	$gettotalProposal[]=$row6["totalProposal"];
}

//Count percentage proposal
$querygetproposal=mysqli_query($con, "SELECT * FROM proposal");
while($row7=mysqli_fetch_array($querygetproposal)){
	$idPro=$row7["proposald"];
	if($row7["proposalTitle"]!=NULL){
		$one=1;
	}else{
		$one=0;
	}
	if($row7["date1"]!=NULL){
		$two=1;
	}else{
		$two=0;
	}
	if($row7["date2"]!=NULL){
		$three=1;
	}else{
		$three=0;
	}
	if($row7["time_1"]!=NULL){
		$four=1;
	}else{
		$four=0;
	}
	if($row7["time_2"]!=NULL){
		$five=1;
	}else{
		$five=0;
	}
	if($row7["location"]!=NULL){
		$six=1;
	}else{
		$six=0;
	}
	if($row7["tujuan"]!=NULL){
		$seven=1;
	}else{
		$seven=0;
	}
	if($row7["pendahuluan"]!=NULL){
		$eight=1;
	}else{
		$eight=0;
	}
	if($row7["objektif"]!=NULL){
		$nine=1;
	}else{
		$nine=0;
	}
	if($row7["event"]!=NULL){
		$ten=1;
	}else{
		$ten=0;
	}
	if($row7["penganjur"]!=NULL){
		$seventeen=1;
	}else{
		$seventeen=0;
	}
	if($row7["sasaran"]!=NULL){
		$eleven=1;
	}else{
		$eleven=0;
	}
	if($row7["jemputanLuar"]!=NULL){
		$twelve=1;
	}else{
		$twelve=0;
	}
	if($row7["jemputanDalam"]!=NULL){
		$thrteen=1;
	}else{
		$thrteen=0;
	}
	if($row7["kolaborasi"]!=NULL){
		$fourteen=1;
	}else{
		$fourteen=0;
	}
	if($row7["penutup"]!=NULL){
		$fifthteen=1;
	}else{
		$fifthteen=0;
	}
	if($row7["AcaSession"]!=NULL){
		$sixteen=1;
	}else{
		$sixteen=0;
	}
	$All=$one+$two+$three+$four+$five+$six+$seven+$eight+$nine+$ten+$seventeen+$eleven+$twelve+$thrteen+$fourteen+$fifthteen+$sixteen;
	mysqli_query($con,"UPDATE proposal SET calPro='$All' WHERE proposald='$idPro'");
}
//repeat benda ni
$queryAllProposal2=mysqli_query($con,"SELECT * FROM proposal");
while($row8=mysqli_fetch_array($queryAllProposal2)){
	$ProposalID=$row8["proposald"];
	$queryProActivity=mysqli_query($con,"SELECT COUNT(*) proactivity FROM activity WHERE proposaId='$ProposalID'");
	$row9=mysqli_fetch_array($queryProActivity);
	$ProActivity=$row9["proactivity"];
	if($ProActivity>0){
		//echo "1";
		$resultproactivity=1;
	}else{
		//echo "0";
		$resultproactivity=0;
	}
	//Income Table
	$queryIncome=mysqli_query($con,"SELECT COUNT(*) income FROM b_income WHERE Iproposald='$ProposalID'");
	$row10=mysqli_fetch_array($queryIncome);
	$Income=$row10["income"];
	if($Income>0){
		$resultincome=1;
		//echo "2";
	}else{
		$resultincome=0;
		//echo "3";
	}
	//Outcome Table
	$queryOutcome=mysqli_query($con,"SELECT COUNT(*) outcome FROM b_outcome WHERE Oproposald='$ProposalID'");
	$row11=mysqli_fetch_array($queryOutcome);
	$Outcome=$row11["outcome"];
	if($Outcome>0){
		$resultoutcome=1;
		//echo "4";
	}else{
		$resultoutcome=0;
		//echo "5";
	}
	//Equipment Table
	$queryEquipment=mysqli_query($con,"SELECT COUNT(*) equipmentt FROM equipment WHERE IDproposal='$ProposalID'");
	$row12=mysqli_fetch_array($queryEquipment);
	$Equipmentt=$row12["equipmentt"];
	if($Equipmentt>0){
		$resultequipment=1;
		//echo "6";
	}else{
		$resultequipment=0;
		//echo "7";
	}
	//Program Table
	$queryProgram=mysqli_query($con,"SELECT COUNT(*) programm FROM 	program WHERE proposaId='$ProposalID'");
	$row13=mysqli_fetch_array($queryProgram);
	$Programm=$row13["programm"];
	if($Programm>0){
		$resultprogram=1;
		//echo "8";
	}else{
		$resultprogram=0;
		//echo "9";
	}
	mysqli_query($con,"UPDATE proposal SET calAct='$resultproactivity', calInc='$resultincome', calOut='$resultoutcome', calEqu='$resultequipment', calProg='$resultprogram' WHERE proposald='$ProposalID'");
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

  <title>PERTEKMA - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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
      <li class="nav-item active">
        <a class="nav-link" href="#">
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
        <a class="nav-link" href="activityMonitoring.php">
          <span>&nbsp;Activity Monitoring</span></a>
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        
      </div>

    <!-- PERTEKMA Committee -->
     <!--<li class="nav-item ">
     <!--<li class="nav-item ">
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
      </li>-->

      <!-- Nav Item - Charts -->
      <!--<li class="nav-item">
        <a class="nav-link" href="../charts.html">
          <span>&nbsp;Statistical Data View</span></a>
      </li>-->



      <!-- Divider -->
      <!--<hr class="sidebar-divider d-none d-md-block">-->

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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="proposal.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Read Activity Proposal</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pending Proposal</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numCountProposal; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Accepted Proposal</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $numCountProposal1; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Expected Income</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $SumIncome; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Expected Outcome</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $SumOutcome; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Activities Overview by PERTEKMA Batch</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart2"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            
          </div>

          

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Activity/Task Card Example -->
              

              <!-- Color System -->
              

            </div>

            
          </div>

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
  <!--<a class="scroll-to-top rounded" href="../#page-top">
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
	<script>
	// Area Chart Example
var ctx = document.getElementById("myAreaChart2");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [<?php foreach($getacasession as $singleacasession){
	echo "'".$singleacasession."',";
	}?>],
    datasets: [{
      label: "Total Activity",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [<?php $totalProposalPerYear=implode(",", $gettotalProposal); echo $totalProposalPerYear; ?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return '' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});
	</script>
</body>

</html>
