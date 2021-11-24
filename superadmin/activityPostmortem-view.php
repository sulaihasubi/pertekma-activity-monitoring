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
		return "<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\"></button>$message</div>";
	}
	$msgBox="";
?>

<?php
// Insert query for add activity
$proposalId=$_GET["id"];

if(isset($_POST['submitting'])){
	$protitlee=$_POST['protitlee'];
	$prodate1=$_POST['prodate1'];
	//$changeformat1=date('Y-m-d',strtotime($prodate1));
	$prodate2=$_POST['prodate2'];
	//$changeformat2=date('Y-m-d',strtotime($prodate2));
	$protime1=$_POST['protime1'];
	$protime2=$_POST['protime2'];
	$proactivityLocation=$_POST['proactivityLocation'];
	$proobjective=$_POST['proobjective'];
	$proketuaUnit=$_POST['proketuaUnit'];
	//$proexcoBertugas=$_POST['proexcoBertugas'];
	$userId=$_POST['userId'];
		//$proaction=$_POST['proaction'];
		// check for activity duplicate (title)
	$checkActivityDuplicate=mysqli_query($con, "SELECT * FROM activity WHERE activityTitle='$protitlee'");
	if(mysqli_num_rows($checkActivityDuplicate)<=0){
			//mysqli_query($con, "INSERT INTO activity (iduser,activityTitle, date, time, activityLocation objective) VALUES('$userId','$protitlee','$prodate','$protime','$proactivityLocation','$proobjective')");
			//echo "INSERT INTO activity (proposaId, iduser, activityTitle, date1, date2, time1, time2, activityLocation, objective) VALUES('$proposalId','$userId','$protitlee','$changeformat1','$changeformat2','$protime1','$protime2','$proactivityLocation','$proobjective')";
	mysqli_query($con, "INSERT INTO activity (proposaId, iduser, activityTitle, date1, date2, time1, time2, activityLocation, objective, ketuaUnit) VALUES('$proposalId','$userId','$protitlee','$prodate1','$prodate2','$protime1','$protime2','$proactivityLocation','$proobjective','$proketuaUnit')");
	$msgBox=alertBox('New Activity added.');
	}else{
		$msgBox=alertBox('Similar activity added. Please check title.');
	}
		
		//header('Location:activity2.php?id='.$proposalId);
}

//Query for edit activity
if(isset($_POST['edit'])){
	 $protitlee=$_POST['protitlee'];
	 $prodate1=$_POST['prodate1'];
	 $prodate2=$_POST['prodate2'];
	 $protime1=$_POST['protime1'];
	 $protime2=$_POST['protime2'];
	 $proactivityLocation=$_POST['proactivityLocation'];
	 $proobjective=$_POST['proobjective'];
	 $proketuaUnit=$_POST['proketuaUnit'];
	 //$proexcoBertugas=$_POST['proexcoBertugas'];
	 $activityId=$_POST['activityId'];
		
			 mysqli_query($con, "UPDATE activity SET activityTitle='$protitlee', date1='$prodate1', date2='$prodate2', time1='$protime1', time2='$protime2', activityLocation='$proactivityLocation', objective='$proobjective', ketuaUnit='$proketuaUnit' WHERE activityId='$activityId'");
			$msgBox=alertBox('Activity succesfully update');
	}

//Query for delete activity
if(isset($_POST['delete'])){
	 //$protitlee=$_POST['protitlee'];
	 //$prodate1=$_POST['prodate1'];
	 //$prodate2=$_POST['prodate2'];
	 //$protime1=$_POST['protime1'];
	 //$protime2=$_POST['protime2'];
	 //$proactivityLocation=$_POST['proactivityLocation'];
	 //$proobjective=$_POST['proobjective'];
	 //$proketuaUnit=$_POST['proketuaUnit'];
	 //$proexcoBertugas=$_POST['proexcoBertugas'];
	 $activityId=$_POST['activityId'];
		
			 //mysqli_query($con, "UPDATE activity SET activityTitle='$protitlee', date1='$prodate1', date2='$prodate2', time1='$protime1', time2='$protime2', activityLocation='$proactivityLocation', objective='$proobjective', ketuaUnit='$proketuaUnit' WHERE activityId='$activityId'");
			mysqli_query($con, "DELETE FROM activity WHERE activityId='$activityId'");
			$msgBox=alertBox('Activity deleted!');
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

  <title>PERTEKMA - List of Program</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../vendor/jquery/jquery-ui.css">
  <script src="../vendor/jquery/jquery-ui.js"></script>
  <link rel="stylesheet" href="../vendor/jquery/jquery.timepicker.min.css">
  <script src="../vendor/jquery/jquery.timepicker.min.js"></script>
	
		
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
      <li class="nav-item ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class=""></i>
          <span>Activity Proposal</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage:</h6>
            <a class="collapse-item" href="proposal.php">List of Proposal</a>
            <a class="collapse-item" href="proposal-status.php">Proposal Status</a>
          </div>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="activityMonitoring.php">
          <span>&nbsp;Activity Monitoring</span></a>
      </li>
      
      <!-- Nav Item - Activity Posmortem Pages  Menu --> 
      <li class="nav-item active">
        <a class="nav-link" href="activityPostmortem.php">
          <span>&nbsp;Activity Post-Mortem</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        
      </div>
      
  <!-- Add User for the Activity Proposal -->
        <!--<li class="nav-item">
        <a class="nav-link" href="../admin/user.php">
          <span>&nbsp;User</span></a>
      </li>

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
          <span>Statistical Data View</span></a>
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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome! I am&nbsp; <?php echo $username; ?></span>
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
            <h1 class="h3 mb-0 text-gray-800">Manage Activity Post-Mortem</h1> 
          </div>
			
			
          <!-- <div class="">
  			<p class="lead">
  				<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#newActivity">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Add Activity
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
					  <h6 class="m-0 font-weight-bold text-primary"><?php $queryproposal=mysqli_query($con, "SELECT * FROM proposal WHERE proposald='$proposalId'"); 
								$col = mysqli_fetch_array($queryproposal);
								$Title=$col["proposalTitle"];
								?> <?php echo $Title=$col["proposalTitle"]; ?></h6>
					</div>
					<div class="container">
					  <p></p>
						<table class="table table-bordered"  width="100%" cellspacing="0">
						  <thead>
							<tr>
							  <th width="50%">Objectives of the Activity</th>
							  <th >Achievements</th>
							</tr>
						  </thead>
						  <tbody>
							<?php 
							$proposal=mysqli_query($con, "SELECT * FROM proposal WHERE proposald='$proposalId'");
							  while($col = mysqli_fetch_array($proposal)){
								  $Objektif=$col["objektif"];
								  $Postmortem=$col["activityPostmortem"];
								 
								 
							?>
							<tr>
							  <td style="text-align: justify;"><?php
								$Objektif=$col["objektif"];
								$allObjektif=explode("\n",$Objektif);
								foreach($allObjektif as $sinObjektif){
									echo $sinObjektif."<br>";
								}
								?></td>
							  <td style="text-align: justify;"><?php
								$Postmortem=$col["activityPostmortem"];
								$allPostmortem=explode("\n",$Postmortem);
								foreach($allPostmortem as $sinPostmortem){
									echo $sinPostmortem."<br>";
								}
								?></td>
							</tr>
							
 <!-- Edit activity Modal-->
 <div class="modal fade" id="editActivity<?php echo $col["activityId"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div id="largeModal" class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Perincian Program</h5>
        </div>
        <div class="modal-body">
       <form method="post" action="">

       
       <div class="form-group row">
		   <label class="col-form-label col-sm-2">Tajuk:</label>
		   <div class="col-sm-10">
		   	<input type="text" name="protitlee" class="form-control" value="<?php echo $Title; ?>">
		   </div>
	   </div>   
		    
		   
		   <div class="form-group row">
		   <label for="inputprodate1" class="col-sm-2 col-form-label">Tarikh Mula:</label>
		   <div class="col-sm-10">
		   <input type="text" class="form-control datepicker2" name="prodate1" value="<?php echo $col["date1"]; ?>">
		   </div>
		   </div>
		   
		   <div class="form-group row">
		   <label for="inputprodate2" class="col-sm-2 col-form-label">Tarikh Tamat:</label>
		   <div class="col-sm-10">
		   <input type="text" class="form-control datepicker2" name="prodate2" value="<?php echo $col["date2"]; ?>">
		   </div>
		   </div>
		   
	   	   <div class="form-group row">
			<label class="col-sm-2 col-form-label">Masa:</label>
			<div class="col-sm-10 row">&nbsp;&nbsp;&nbsp;
			<select name="protime1" class="form-control col-sm-5" value="<?php echo $col["time1"]; ?>">
								           <option <?php if($col["time1"]=='6:00 AM'){echo "value='7:00 AM' selected"; } ?>>6:00 AM</option>
									       <option <?php if($col["time1"]=='6:30 AM'){echo "value='7:00 AM' selected"; } ?>>6:30 AM</option>
										   <option <?php if($col["time1"]=='7:00 AM'){echo "value='7:00 AM' selected"; } ?>>7:00 AM</option>
										   <option <?php if($col["time1"]=='7:30 AM'){echo "value='7:30 AM' selected"; } ?>>7:30 AM</option>
										   <option <?php if($col["time1"]=='8:00 AM'){echo "value='8:00 AM' selected"; } ?>>8:00 AM</option>
										   <option <?php if($col["time1"]=='8:30 AM'){echo "value='8:30 AM' selected"; } ?>>8:30 AM</option>
										   <option <?php if($col["time1"]=='9:00 AM'){echo "value='9:00 AM' selected"; } ?>>9:00 AM</option>
										   <option <?php if($col["time1"]=='9:30 AM'){echo "value='9:30 AM' selected"; } ?>>9:30 AM</option>
										   <option <?php if($col["time1"]=='10:00 AM'){echo "value='10:00 AM' selected";} ?>>10:00 AM</option>
										   <option <?php if($col["time1"]=='10:30 AM'){echo "value='10:30 AM' selected";} ?>>10:30 AM</option>
										   <option <?php if($col["time1"]=='11:00 AM'){echo "value='11:00 AM' selected";} ?>>11:00 AM</option>
										   <option <?php if($col["time1"]=='11:30 AM'){echo "value='11:30 AM' selected";} ?>>11:30 AM</option>
										   <option <?php if($col["time1"]=='12:00 PM'){echo "value='12:00 PM' selected";} ?>>12:00 PM</option>
										   <option <?php if($col["time1"]=='12:30 PM'){echo "value='12:30 PM' selected";} ?>>12:30 PM</option>
										   <option <?php if($col["time1"]=='1:00 PM'){echo "value='1:00 PM' selected";} ?>>1:00 PM</option>
										   <option <?php if($col["time1"]=='1:30 PM'){echo "value='1:30 PM' selected";} ?>>1:30 PM</option>
										   <option <?php if($col["time1"]=='2:00 PM'){echo "value='2:00 PM' selected";} ?>>2:00 PM</option>
										   <option <?php if($col["time1"]=='2:30 PM'){echo"value='2:30 PM' selected";} ?>>2:30 PM</option>
										   <option <?php if($col["time1"]=='3:00 PM'){echo"value='3:00 PM' selected";} ?>>3:00 PM</option>
										   <option <?php if($col["time1"]=='3:30 PM'){echo"value='3:30 PM' selected";} ?>>3:30 PM</option>
										   <option <?php if($col["time1"]=='4:00 PM'){echo"value='4:00 PM' selected";} ?>>4:00 PM</option>
										   <option <?php if($col["time1"]=='4:30 PM'){echo"value='4:30 PM' selected";} ?>>4:30 PM</option>
										   <option <?php if($col["time1"]=='5:00 PM'){echo"value='5:00 PM' selected";} ?>>5:00 PM</option>
										   <option <?php if($col["time1"]=='5:30 PM'){echo"value='5:30 PM' selected";} ?>>5:30 PM</option>
										   <option <?php if($col["time1"]=='6:00 PM'){echo"value='6:00 PM' selected";} ?>>6:00 PM</option>
										   <option <?php if($col["time1"]=='6:30 PM'){echo"value='6:30 PM' selected";} ?>>6:30 PM</option>
										   <option <?php if($col["time1"]=='7:00 PM'){echo"value='7:00 PM' selected";} ?>>7:00 PM</option>
										   <option <?php if($col["time1"]=='7:30 PM'){echo"value='7:30 PM' selected";} ?>>7:30 PM</option>
										   <option <?php if($col["time1"]=='8:00 PM'){echo"value='8:00 PM' selected";} ?>>8:00 PM</option>
										   </select>

										   &nbsp;
										   <label class="col-form-label"><strong>-</strong></label>
											&nbsp;
										   <select name="protime2" class="form-control col-sm-5" value="<?php echo $col["time2"]; ?>">
										   <option <?php if($col["time2"]=='7:00 AM'){echo "value='7:00 AM' selected"; } ?>>7:00 AM</option>
										   <option <?php if($col["time2"]=='7:30 AM'){echo "value='7:30 AM' selected"; } ?>>7:30 AM</option>
										   <option <?php if($col["time2"]=='8:00 AM'){echo "value='8:00 AM' selected"; } ?>>8:00 AM</option>
										   <option <?php if($col["time2"]=='8:30 AM'){echo "value='8:30 AM' selected"; } ?>>8:30 AM</option>
										   <option <?php if($col["time2"]=='9:00 AM'){echo "value='9:00 AM' selected"; } ?>>9:00 AM</option>
										   <option <?php if($col["time2"]=='9:30 AM'){echo "value='9:30 AM' selected"; } ?>>9:30 AM</option>
										   <option <?php if($col["time2"]=='10:00 AM'){echo "value='10:00 AM' selected";} ?>>10:00 AM</option>
										   <option <?php if($col["time2"]=='10:30 AM'){echo "value='10:30 AM' selected";} ?>>10:30 AM</option>
										   <option <?php if($col["time2"]=='11:00 AM'){echo "value='11:00 AM' selected";} ?>>11:00 AM</option>
										   <option <?php if($col["time2"]=='11:30 AM'){echo "value='11:30 AM' selected";} ?>>11:30 AM</option>
										   <option <?php if($col["time2"]=='12:00 PM'){echo "value='12:00 PM' selected";} ?>>12:00 PM</option>
										   <option <?php if($col["time2"]=='12:30 PM'){echo "value='12:30 PM' selected";} ?>>12:30 PM</option>
										   <option <?php if($col["time2"]=='1:00 PM'){echo "value='1:00 PM' selected";} ?>>1:00 PM</option>
										   <option <?php if($col["time2"]=='1:30 PM'){echo "value='1:30 PM' selected";} ?>>1:30 PM</option>
										   <option <?php if($col["time2"]=='2:00 PM'){echo "value='2:00 PM' selected";} ?>>2:00 PM</option>
										   <option <?php if($col["time2"]=='2:30 PM'){echo"value='2:30 PM' selected";} ?>>2:30 PM</option>
										   <option <?php if($col["time2"]=='3:00 PM'){echo"value='3:00 PM' selected";} ?>>3:00 PM</option>
										   <option <?php if($col["time2"]=='3:30 PM'){echo"value='3:30 PM' selected";} ?>>3:30 PM</option>
										   <option <?php if($col["time2"]=='4:00 PM'){echo"value='4:00 PM' selected";} ?>>4:00 PM</option>
										   <option <?php if($col["time2"]=='4:30 PM'){echo"value='4:30 PM' selected";} ?>>4:30 PM</option>
										   <option <?php if($col["time2"]=='5:00 PM'){echo"value='5:00 PM' selected";} ?>>5:00 PM</option>
										   <option <?php if($col["time2"]=='5:30 PM'){echo"value='5:30 PM' selected";} ?>>5:30 PM</option>
										   <option <?php if($col["time2"]=='6:00 PM'){echo"value='6:00 PM' selected";} ?>>6:00 PM</option>
										   <option <?php if($col["time2"]=='6:30 PM'){echo"value='6:30 PM' selected";} ?>>6:30 PM</option>
										   <option <?php if($col["time2"]=='7:00 PM'){echo"value='7:00 PM' selected";} ?>>7:00 PM</option>
										   <option <?php if($col["time2"]=='7:30 PM'){echo"value='7:30 PM' selected";} ?>>7:30 PM</option>
										   <option <?php if($col["time2"]=='8:00 PM'){echo"value='8:00 PM' selected";} ?>>8:00 PM</option>
										   </select>
									</div>
								</div>
		   		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2">Tempat:</label>
		   <div class="col-sm-10">
		   <input type="text" name="proactivityLocation" class="form-control" value="<?php echo $col["activityLocation"]; ?>">
		   </div>
		   </div>
		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2">Objektif:</label>
		   <div class="col-sm-10">
		   <textarea name="proobjective" class="form-control" rows="3"><?php echo $Objective; ?></textarea><input type="hidden" name="activityId" value="<?php echo $col["activityId"]; ?>">
		   </div>
		   </div>
		   
		   <div class="form-group row">
		   <label for="inputproketuaUnit" class="col-sm-2 col-form-label">Ketua Program:</label>
		   <div class="col-sm-10 row">&nbsp;&nbsp;&nbsp;
		   					   <select name="proketuaUnit" class="form-control col-sm-8"> 
                                  <option value="">Please Choose</option>
									 <?php
										$cdquery = "SELECT * FROM org_detail";
										$cdresult = mysqli_query($con, $cdquery);
										
										while ($cdrow = mysqli_fetch_array($cdresult))
											{
											$ja_watan = $cdrow["ja_watan"];
											$Iddetail = $cdrow["idOrg_detail"];
												if($col["ketuaUnit"]==$Iddetail){
													echo "<option value='$Iddetail' selected>$ja_watan</option>";
												}else{
													echo "<option value='$Iddetail'>$ja_watan</option>";
												}
											
											}
										
										?>
								</select>&nbsp;&nbsp;&nbsp;&nbsp;*Ketua Exco/Unit yang memegang tugas/program ini
									</div>
			</div>
           

		  <input type="hidden" name="userId" value="<?php echo $session; ?>">
		  <input type="hidden" name="proposalId" value="<?php echo $col["proposald"]; ?>">
		  
		  </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="input" name="edit">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>						
						
 <!-- View activity Modal-->
 <div class="modal fade" id="viewActivity<?php echo $col["activityId"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div id="largeModal" class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Perincian Program</h5>
        </div>
        <div class="modal-body">
       <form method="post" action="">

       
       <div class="form-group row">
		   <label class="col-form-label col-sm-10"><strong><?php echo $Title; ?></strong></label>
	   </div>   
		    <div class="form-group row">
			<label class="col-sm-2 col-form-label"><strong>Tarikh:</strong></label>
			<label class="col-sm-4 col-form-label"><?php echo $col["date1"]; ?> hingga <?php echo $col["date2"]; ?></label>
			</div>
		   
	   	   <div class="form-group row">
			<label class="col-sm-2 col-form-label"><strong>Masa:</strong></label>
			<label class="col-sm-4 col-form-label"><?php echo $col["time1"]; ?> - <?php echo $col["time2"]; ?></label>
			</div>

		   		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2"><strong>Tempat:</strong></label>
		   <label class="col-form-label col-sm-10"><?php echo $col["activityLocation"]; ?></label>
		   </div>
		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2"><strong>Objektif:</strong></label>
		   <div class="col-sm-10">
		   <?php echo $Objective; ?>
		   <input type="hidden" name="activityId" value="<?php echo $col["activityId"]; ?>">
		   </div>
		   </div>
		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2"><strong>Ketua Program:</strong></label>
		   <label class="col-form-label col-sm-10"><?php $IndividualName=explode(",",$Nama);
								  //$IndividualName=preg_split('/$\R?^/m', $Nama);
								  foreach($IndividualName as $ListName){
									  echo $ListName."<br>";
								  } ?></label>
		   </div>

		  <input type="hidden" name="userId" value="<?php echo $session; ?>">
		  <input type="hidden" name="proposalId" value="<?php echo $col["proposald"]; ?>">
		  
		  </div>
        <div class="modal-footer">
          </form>
        </div>
      </div>
    </div>
  </div>
  
 <!-- Delete Testing activity Modal-->
 <div class="modal fade" id="deleteActivity<?php echo $col["activityId"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div id="largeModal" class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this?</h5>
        </div>
        <div class="modal-body">
       <form method="post" action="">

       
       <div class="form-group row">
		   <label class="col-form-label col-sm-10"><strong><?php echo $Title; ?></strong></label>
	   </div>   
		    <div class="form-group row">
			<label class="col-sm-2 col-form-label"><strong>Tarikh:</strong></label>
			<label class="col-sm-4 col-form-label"><?php echo $col["date1"]; ?> hingga <?php echo $col["date2"]; ?></label>
			</div>
		   
	   	   <div class="form-group row">
			<label class="col-sm-2 col-form-label"><strong>Masa:</strong></label>
			<label class="col-sm-4 col-form-label"><?php echo $col["time1"]; ?> - <?php echo $col["time2"]; ?></label>
			</div>

		   		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2"><strong>Tempat:</strong></label>
		   <label class="col-form-label col-sm-10"><?php echo $col["activityLocation"]; ?></label>
		   </div>
		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2"><strong>Objektif:</strong></label>
		   <div class="col-sm-10">
		   <?php echo $Objective; ?>
		   <input type="hidden" name="activityId" value="<?php echo $col["activityId"]; ?>">
		   </div>
		   </div>
		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2"><strong>Ketua Program:</strong></label>
		   <label class="col-form-label col-sm-10"><?php $IndividualName=explode(",",$Nama);
								  //$IndividualName=preg_split('/$\R?^/m', $Nama);
								  foreach($IndividualName as $ListName){
									  echo $ListName."<br>";
								  } ?></label>
		   </div>

		  <input type="hidden" name="userId" value="<?php echo $session; ?>">
		  <input type="hidden" name="proposalId" value="<?php echo $col["proposald"]; ?>">
		  
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
             
        <div class="row">
		<div class="col-lg-12">
			<div style="float: right;">
				<a class="btn btn-success btn-lg" href="activityPostmortem.php?id=<?php echo $proposalId; ?>" id="btnBack"><i class="fa fa-backward"></i> Back</a>
				<a class="btn btn-warning btn-lg" href="#" id="btnToTop"><i class="fa fa-arrow-up"></i> Top</a>
			</div>
		</div>
		</form>
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
  
  <!-- Insert New activity Modal-->
  <div class="modal fade" id="newActivity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div id="largeModal" class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Perincian Program</h5>
        </div>
        <div class="modal-body">
       <form method="post" action="">
       <div class="form-group row">
		   <label class="col-form-label col-sm-2">Tajuk:</label>
		   <div class="col-sm-10">
		   	<input type="text" name="protitlee" class="form-control">
		   </div>
		   </div>
		   
		    
		   
		   <div class="form-group row">
		   <label for="inputprodate1" class="col-sm-2 col-form-label">Tarikh Mula:</label>
		   <div class="col-sm-10">
		   <input type="text" class="form-control datepicker" name="prodate1">
		   </div>
		   </div>
		   
		   <div class="form-group row">
		   <label for="inputprodate2" class="col-sm-2 col-form-label">Tarikh Tamat:</label>
		   <div class="col-sm-10">
		   <input type="text" class="form-control datepicker" name="prodate2">
		   </div>
		   </div>
		   
		   <div class="form-group row">
			<label class="col-sm-2 col-form-label">Masa:</label>
			<div class="col-sm-10 row">&nbsp;&nbsp;&nbsp;
			<select name="protime1" class="form-control col-sm-5">
									       <option value="6:00 AM">6:00 AM</option>
										   <option value="6:30 AM">6:30 AM</option>
										   <option value="7:00 AM">7:00 AM</option>
										   <option value="7:30 AM">7:30 AM</option>
										   <option value="8:00 AM">8:00 AM</option>
										   <option value="8:30 AM" selected>8:30 AM</option>
										   <option value="9:00 AM">9:00 AM</option>
										   <option value="9:30 AM">9:30 AM</option>
										   <option value="10:00 AM">10:00 AM</option>
										   <option value="10:30 AM">10:30 AM</option>
										   <option value="11:00 AM">11:00 AM</option>
										   <option value="11:30 AM">11:30 AM</option>
										   <option value="12:00 PM">12:00 PM</option>
										   <option value="12:30 PM">12:30 PM</option>
										   <option value="1:00 PM">1:00 PM</option>
										   <option value="1:30 PM">1:30 PM</option>
										   <option value="2:00 PM">2:00 PM</option>
										   <option value="2:30 PM">2:30 PM</option>
										   <option value="3:00 PM">3:00 PM</option>
										   <option value="3:30 PM">3:30 PM</option>
										   <option value="4:00 PM">4:00 PM</option>
										   <option value="4:30 PM">4:30 PM</option>
										   <option value="5:00 PM">5:00 PM</option>
										   <option value="5:30 PM">5:30 PM</option>
										   </select>

										   &nbsp;
										   <label class="col-form-label"><strong>-</strong></label>
											&nbsp;
										   <select name="protime2" class="form-control col-sm-5">
										   <option value="7:00 AM">7:00 AM</option>
										   <option value="7:30 AM">7:30 AM</option>
										   <option value="8:00 AM">8:00 AM</option>
										   <option value="8:30 AM">8:30 AM</option>
										   <option value="9:00 AM">9:00 AM</option>
										   <option value="9:30 AM">9:30 AM</option>
										   <option value="10:00 AM">10:00 AM</option>
										   <option value="10:30 AM">10:30 AM</option>
										   <option value="11:00 AM">11:00 AM</option>
										   <option value="11:30 AM">11:30 AM</option>
										   <option value="12:00 PM">12:00 PM</option>
										   <option value="12:30 PM">12:30 PM</option>
										   <option value="1:00 PM">1:00 PM</option>
										   <option value="1:30 PM">1:30 PM</option>
										   <option value="2:00 PM">2:00 PM</option>
										   <option value="2:30 PM">2:30 PM</option>
										   <option value="3:00 PM">3:00 PM</option>
										   <option value="3:30 PM">3:30 PM</option>
										   <option value="4:00 PM">4:00 PM</option>
										   <option value="4:30 PM">4:30 PM</option>
										   <option value="5:00 PM" selected>5:00 PM</option>
										   <option value="5:30 PM">5:30 PM</option>
										   </select>
									</div>
								</div>
		   		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2">Tempat:</label>
		   <div class="col-sm-10">
		   	<input type="text" name="proactivityLocation" class="form-control">
		   </div>
		   </div>
		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2">Objektif:</label>
		   <div class="col-sm-10">
		   <textarea name="proobjective" class="form-control" rows="3"></textarea>
		   </div>
		   </div>
		   
		   <div class="form-group row">
			<label for="inputproketuaUnit" class="col-sm-2 col-form-label">Ketua Program:</label>
				<div class="col-sm-10 row">&nbsp;&nbsp;&nbsp;
					<select name="proketuaUnit" class="form-control col-sm-10"> 
                       <option value="">Please Choose</option>
							<?php
										$cdquery = "SELECT * FROM org_detail WHERE Id_proposal='$proposalId' ";
						
										$cdresult = mysqli_query($con, $cdquery);
										
										while ($cdrow = mysqli_fetch_array($cdresult))
											{
											$ja_watan = $cdrow["ja_watan"];
											$Iddetail = $cdrow["idOrg_detail"];
											echo "<option value='$Iddetail'>$ja_watan</option>";
											}
										
										?>		 
					</select>
				 </div>
			</div>
		   
		  <input type="hidden" name="userId" value="<?php echo $session; ?>">
		  </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="input" name="submitting">Save</button>
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
	$(function(){
		$(".datepicker").datepicker({
			dateFormat: 'dd-mm-yy'
		});
	});
</script>
    
<script>
	$(function(){
		$(".datepicker2").datepicker({
			dateFormat: 'dd-mm-yy'
		});
	});
	
</script>

<script>
		 $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
</body>

</html>
