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
	// Insert query for new proposal (TIADA BERKAITAN)
	if(isset($_POST['submit'])){
		 $protitle=$_POST['protitle'];
		 $prodate1=$_POST['prodate1'];
		 $prodate2=$_POST['prodate2'];
		 $protime_1=$_POST['protime_1'];
		 $protime_2=$_POST['protime_2'];
		 $prolocation=$_POST['prolocation'];
		 $proAcaSession=$_POST['proAcaSession'];
		 $userId=$_POST['userId'];
		
		//$proaction=$_POST['proaction'];
		// check for proposal duplicate (title)
		$checkProposalDuplicate=mysqli_query($con, "SELECT * FROM proposal WHERE proposalTitle='$protitle'");
		if(mysqli_num_rows($checkProposalDuplicate)<=0){
			mysqli_query($con, "INSERT INTO proposal (iduser, proposalTitle, date1, date2, time_1, time_2, location, AcaSession) VALUES('$userId','$protitle','$prodate1','$prodate2','$protime_1','$protime_2','$prolocation', '$proAcaSession')");
			$msgBox=alertBox('New proposal added.');
		}else{
			$msgBox=alertBox('Similar proposal added. Please check title.');
		}
	}

// Query for Accept proposal by TNC
	if(isset($_POST['accept'])){	
		  $idsproposal=$_POST['proposalsId'];
		  $userId=$_POST['userId'];	
		  //$proposalStatus=$_POST['proposalStatus'];
		  //$protitle=$_POST['protitle'];
		  //$prodate1=$_POST['prodate1'];
		  //$prodate2=$_POST['prodate2'];		
		  //$protime_1=$_POST['protime_1'];
		  //$protime_2=$_POST['protime_2'];
		  //$prolocation=$_POST['prolocation'];
		  //$proAcaSession=$_POST['proAcaSession'];
		 
		// check for proposal duplicate (title)
		//$checkProposalDuplicate=mysqli_query($con, "SELECT * FROM proposal WHERE proposalTitle='$protitle'");
		//if(mysqli_num_rows($checkProposalDuplicate)<=0){
		
			mysqli_query($con, "UPDATE proposal SET proposalStatus='1' WHERE proposald='$idsproposal'");
			$msgBox=alertBox('Proposal Accepted!');
		//}else{
			//$msgBox=alertBox('Similar proposal added. Please check title.');
		//}
	}

// Query for Decline proposal by TNC
	if(isset($_POST['decline'])){	
		  $idsproposal=$_POST['proposalsId'];
		  $userId=$_POST['userId'];
		  //$proposalStatus=$_POST['proposalStatus'];
		  //$protitle=$_POST['protitle'];
		  //$prodate1=$_POST['prodate1'];
		  //$prodate2=$_POST['prodate2'];		
		  //$protime_1=$_POST['protime_1'];
		  //$protime_2=$_POST['protime_2'];
		  //$prolocation=$_POST['prolocation'];
		
			mysqli_query($con, "UPDATE proposal SET proposalStatus='2' WHERE proposald='$idsproposal'");
			$msgBox=alertBox('Proposal Declined!');
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

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../vendor/jquery/jquery-ui.css">
  <script src="../vendor/jquery/jquery-ui.js"></script>
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
    	  
      <!-- Proposal Pages  Menu -->
      <li class="nav-item active">
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
        <a class="nav-link" href="printt2.php">
          <span>&nbsp;Test for Print</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <!-- <li class="nav-item">
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
            <h1 class="h3 mb-0 text-gray-800">Manage Activity Proposal</h1>
           
          </div>
			
			
          <!-- <div class="">
  			<p class="lead">
  				<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#newProposal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Add New Proposal
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
					  <h6 class="m-0 font-weight-bold text-primary">List of Activity Proposal</h6>
					</div>
					<div class="card-body">
					  <div class="container">
						  <form method="POST" action="">
						<table class="table table-bordered" width="100%" cellspacing="0">
						  <thead>
							<tr>
						  	  <th width="20%">PERTEKMA Batch</th>
							  <th>Proposal</th>
							  <th width="20%">Action</th>
							</tr>
						  </thead>
						  <tbody>
							<?php 
							$proposal=mysqli_query($con, "SELECT * FROM proposal ORDER BY proposald DESC");
							  while($col = mysqli_fetch_array($proposal)){
								  $idsproposal=$col["proposald"];
								  $AcaSession=$col["AcaSession"];
								  $Title=$col["proposalTitle"];
								  $date1=$col["date1"];
								  $date2=$col["date2"];
								  $time_1=$col["time_1"];
								  $time_2=$col["time_2"];
								  $Location=$col["location"];
								  $idpro=$col["proposald"];
								  $AcaSession=$col["AcaSession"];
								  $statusproposal=$col["proposalStatus"];	 
							?>
							
							<tr>
						 	  <td><?php echo $AcaSession; ?></td>
							  <td><?php echo $Title; ?><input type="hidden" name="idsproposal" value="<?php echo $idsproposal; ?>"></td>
							  <td>
							  	 <a href="proposal-tdview.php?id=<?php echo $col["proposald"]; ?>" class="" data-toggle="modal"><span class="btn btn-primary btn-xs fa fa-window-maximize" data-toggle="tooltip" data-placement="left" title="" data-original-title="Read Details"></span></a>
							    
						  		<?php
								  if($statusproposal==1){
									  ?>
								  	  <a href="#" class="" data-toggle="modal" data-target="#updateStatus<?php echo $idsproposal; ?>"><span class="btn btn-success btn-group-sm fa fa-save" data-toggle="tooltip" data-placement="left" title="" data-original-title="Accept"> Accepted</span></a>
									  
									  <?php
								  }elseif($statusproposal==0){
									  ?>
								  	  <a href="#" class="" data-toggle="modal" data-target="#updateStatus<?php echo $idsproposal; ?>"><span class="btn btn-secondary btn-group-sm fa fa-save" data-toggle="tooltip" data-placement="left" title="" data-original-title="Pending"> Pending</span></a>
									  
								  	<?php
								  }elseif($statusproposal==2){
									  ?>
								  	  <a href="#" class="" data-toggle="modal" data-target="#updateStatus<?php echo $idsproposal; ?>"><span class="btn btn-danger btn-group-sm fa fa-save" data-toggle="tooltip" data-placement="left" title="" data-original-title="Decline"> Declined</span></a>
									  
								  	<?php
								  }
								  ?>
							  						  
						  	 
							  </td>
							</form>

							</tr>
							
<!-- Edit Proposal Modal-->
 <!--<div class="modal fade" id="editProposal<?php echo $col["proposald"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div id="largeModal" class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Proposal</h5>
        </div>
        <div class="modal-body">
       <form method="post" action="">
       <div class="form-group row">
		   <label class="col-form-label col-sm-2">Tajuk:</label>
		   <div class="col-sm-10">
		   	<input type="text" name="protitle" class="form-control" value="<?php echo $Title; ?>">
		   </div>
		   </div>				   
						<div class="form-group row">
						<label for="inputprodate1" class="col-sm-2 col-form-label">Tarikh Mula:</label>
						<div class="col-sm-10">
						<input type="text" class="form-control datepicker" name="prodate1" value="<?php echo $date1; ?>">
						</div>
						</div>
						
						<div class="form-group row">
						<label for="inputprodate2" class="col-sm-2 col-form-label">Tarikh Tamat:</label>
						<div class="col-sm-10">
						<input type="text" class="form-control datepicker" name="prodate2" value="<?php echo $date2; ?>" >
						</div>
						</div>
						
		   		   		<div class="form-group row">
									<label for="inputprotime_1" class="col-sm-2 col-form-label">Masa:</label>
									<div class="col-sm-10 row">&nbsp;&nbsp;&nbsp;
										<select name="protime_1" class="form-control col-sm-5" value="<?php echo ($value); ?>">
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
										   <label  class="col-form-label">to</label>
										   &nbsp;
									   
										   <select name="protime_2" class="form-control col-sm-5" value="<?php echo $time_2; ?>">
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
					   <label class="col-form-label col-sm-2">Lokasi:</label>
					   <div class="col-sm-10">
						<input type="text" name="prolocation" class="form-control" value="<?php echo $Location; ?>">
					   </div>
					   </div>
					   
					    <div class="form-group row">
		   				<label class="col-form-label col-sm-2">Batch:</label>
		   				<div class="col-sm-10">
		   				<select name="proAcaSession" class="form-control col-sm-10">
		   				<?php
										$cdquery = "SELECT * FROM academicsession ORDER BY pertekma DESC";
										$cdresult = mysqli_query($con, $cdquery);
										
										while ($cdrow = mysqli_fetch_array($cdresult))
											{
											$pertekmaB = $cdrow["pertekma"];
											echo "<option ='$pertekmaB'>$pertekmaB</option>";
											}
										
										?>
						</select>
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

<!-- Update Proposal Modal-->
<div class="modal fade" id="updateStatus<?php echo $idsproposal; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div id="largeModal" class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to update proposal status?</h5>
        </div>
        <div class="modal-body">
       <form method="post" action="">
           				<div class="form-group row">
		   				<label class="col-form-label col-sm-2">Tajuk:</label>
		   				<div class="col-sm-10">
		   				<label class="col-form-label col-sm-10"><?php echo $Title; ?></label>
		   				</div>
		   				</div>
		   				
		   				<div class="form-group row">
						<label for="inputprodate1" class="col-sm-2 col-form-label">Tarikh Mula:</label>
						<div class="col-sm-10">
						<label for="inputprodate1" class="col-sm-10 col-form-label"><?php echo $date1; ?></label>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="inputprodate2" class="col-sm-2 col-form-label">Tarikh Tamat:</label>
						<div class="col-sm-10">
						<label for="inputprodate2" class="col-sm-10 col-form-label"><?php echo $date2; ?></label>
						</div>
						</div>
						
		   		   		<div class="form-group row">
						<label for="inputprotime_1" class="col-sm-2 col-form-label">Masa:</label>
						<div class="col-sm-10 row">&nbsp;&nbsp;&nbsp;
						<label for="inputprotime_1" class="col-sm-10 col-form-label"><?php echo $time_1; ?> to <?php echo $time_2; ?></label>
						</div>
						</div>													

					   <div class="form-group row">
					   <label class="col-form-label col-sm-2">Lokasi:</label>
					   <div class="col-sm-10">
					   <label class="col-form-label col-sm-10"><?php echo $Location; ?></label>
					   </div>
					   </div>
					   
					  

		   <input type="hidden" name="userId" value="<?php echo $session; ?>">
		   <input type="hidden" name="proposalsId" value="<?php echo $idsproposal; ?>">
		  </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="accept" name="accept">Accept</button>
		  <button class="btn btn-danger" type="decline" name="decline">Decline</button>
          </form>
        </div>
      </div>
    </div>
  </div>
							  
  <div class="modal fade" id="deleteProposal<?php echo $col["proposald"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div id="largeModal" class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this?</h5>
        </div>
        <div class="modal-body">
       <form method="post" action="">
           				<div class="form-group row">
		   				<label class="col-form-label col-sm-2">Tajuk:</label>
		   				<div class="col-sm-10">
		   				<label class="col-form-label col-sm-10"><?php echo $Title; ?></label>
		   				</div>
		   				</div>
		   								   
						<div class="form-group row">
						<label for="inputprodate1" class="col-sm-2 col-form-label">Tarikh Mula:</label>
						<div class="col-sm-10">
						<label for="inputprodate1" class="col-sm-10 col-form-label"><?php echo $date1; ?></label>
						</div>
						</div>
						
						<div class="form-group row">
						<label for="inputprodate2" class="col-sm-2 col-form-label">Tarikh Tamat:</label>
						<div class="col-sm-10">
						<label for="inputprodate2" class="col-sm-10 col-form-label"><?php echo $date2; ?></label>
						</div>
						</div>
						
		   		   		<div class="form-group row">
						<label for="inputprotime_1" class="col-sm-2 col-form-label">Masa:</label>
						<div class="col-sm-10 row">&nbsp;&nbsp;&nbsp;
						<label for="inputprotime_1" class="col-sm-10 col-form-label"><?php echo $time_1; ?> to <?php echo $time_2; ?></label>
						</div>
						</div>													

					   <div class="form-group row">
					   <label class="col-form-label col-sm-2">Lokasi:</label>
					   <div class="col-sm-10">
					   <label class="col-form-label col-sm-10"><?php echo $Location; ?></label>
					   </div>
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
  
  <!-- Insert New Proposal Modal-->
  <!--<div   class="modal fade" id="newProposal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div id="largeModal" class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Proposal</h5>
        </div>
        <div class="modal-body">
       <form method="post" action="">
				   	   <div class="form-group row">
					   <label class="col-form-label col-sm-2">Tajuk:</label>
					   <div class="col-sm-10">
						<input type="text" name="protitle" class="form-control">
					   </div>
					   </div>
			
						<div class="form-group row">
						<label for="inputprotime1" class="col-sm-2 col-form-label">Tarikh Mula:</label>
						<div class="col-sm-10">
						<input type="text" class="form-control datepicker" name="prodate1">
						</div>
						</div>
						
						<div class="form-group row">
						<label for="inputprotime1" class="col-sm-2 col-form-label">Tarikh Tamat:</label>
						<div class="col-sm-10">
						<input type="text" class="form-control datepicker" name="prodate2">
						</div>
						</div>


		   		   <div class="form-group row">
									<label for="inputprotime_1" class="col-sm-2 col-form-label">Masa:</label>
									<div class="col-sm-10 row">&nbsp;&nbsp;&nbsp;
										<select name="protime_1" class="form-control col-sm-5">
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
										   <label  class="col-form-label">to</label>
										   &nbsp;
									   
										   <select name="protime_2" class="form-control col-sm-5">
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
		   <label class="col-form-label col-sm-2">Lokasi:</label>
		   <div class="col-sm-10">
		   	<input type="text" name="prolocation" class="form-control">
		   </div>
		   </div>
		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2">Batch:</label>
		   <div class="col-sm-10">
		   <select name="proAcaSession" class="form-control col-sm-10">
		   <?php
										$cdquery = "SELECT * FROM academicsession ORDER BY pertekma DESC";
										$cdresult = mysqli_query($con, $cdquery);
										
										while ($cdrow = mysqli_fetch_array($cdresult))
											{
											$pertekmaB = $cdrow["pertekma"];
											echo "<option ='$pertekmaB'>$pertekmaB</option>";
											}
										
										?>
			</select>
		   </div>
		   </div>
		  <input type="hidden" name="userId" value="<?php echo $session; ?>">
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
	$(function(){
		$(".datepicker").datepicker({
			dateFormat: 'dd-mm-yy'
		});
	});
</script>

<script>
	$(document).ready(function() {
  $('#dataTable').DataTable();
});
</script>


<script>
		 $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
</body>

</html>
