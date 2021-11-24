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
$proposalId=$_GET["id"];
$programId=$_GET["idprogram"];

//edit program tentative 
	if(isset($_POST['edit'])){
		   $protime1=$_POST['protime1'];
		   $protime2=$_POST['protime2'];
		   $proacara=$_POST['proacara'];
	       $proprogramLocation=$_POST['proprogramLocation'];
	      //$proketuaUnit=$_POST['proketuaUnit'];
		   $idprogramdetail=$_POST['idprogramdetail'];
		 //echo $programId=$_POST['$programId'];
		
		mysqli_query($con, "UPDATE programdetail SET time1='$protime1', time2='$protime2', acara='$proacara', programLocation='$proprogramLocation' WHERE IdprogramDetail='$idprogramdetail'");
			$msgBox=alertBox('Tentative has been Updated!');
	}

//delete program tentative 
	if(isset($_POST['delete'])){
		  //$protime1=$_POST['protime1'];
		  //$protime2=$_POST['protime2'];
		  //$proacara=$_POST['proacara'];
	      //$proprogramLocation=$_POST['proprogramLocation'];
	      //$proketuaUnit=$_POST['proketuaUnit'];
		  $idprogramdetail=$_POST['idprogramdetail'];
		 //$programId=$_POST['$programId'];
		
		mysqli_query($con, "DELETE FROM programdetail where IdprogramDetail='$idprogramdetail'");
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

  <title>PERTEKMA - Activity Proposal</title>

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
        <a class="nav-link" href="index.php">
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
            <a class="collapse-item" href="acaSession-add.php">Academic Session</a>
          </div>
        </div>
      </li> 

      <!-- Nav Item - Charts -->
     <!-- <li class="nav-item">
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
            <h1 class="h3 mb-0 text-gray-800">Manage Program Tentative</h1>
          </div>
          
          <div id="page-wrapper">
            <div class="row">
            	<div class="col-lg-12">
            	<?php if($msgBox){ echo $msgBox; } ?>
            		<div class="card shadow mb-4">
					<div class="card-header py-3">
					  <h6 class="m-0 font-weight-bold text-primary"> Tarikh:&nbsp;&nbsp;<?php $queryTarikh=mysqli_query($con, "SELECT * FROM program WHERE programid='$programId'");
						$rowTarikh=mysqli_fetch_array($queryTarikh);
						echo $rowTarikh["date"];
						?></h6>
					</div>
					<div class="card-body">
					  <div class="container-fluid">
						<table class="table table-bordered"  width="100%" cellspacing="0">
						  <thead>
							<tr>
							  <th width="20%">Masa</th>
							  <th>Acara</th>
							  <th>Lokasi</th>
							  <th width="15%">Action</th>
							</tr>
						  </thead>
						  <tbody>
							<?php 
							$org_detail=mysqli_query($con, "SELECT * FROM programdetail  WHERE programid='$programId'");
							  while($col = mysqli_fetch_array($org_detail)){
								  //$Date=$col["date"];
								  $Time1=$col["time1"];
								  $Time2=$col["time2"];
								  $acara=$col["acara"];
								  $programLocation=$col["programLocation"];
							?>
							<tr>
							  <td><?php echo $Time1; ?> to <?php echo $Time2; ?></td>  
							  <td><?php $IndividualAcara=explode("\n",$acara);
								  //$IndividualName=preg_split('/$\R?^/m', $Nama);
								  foreach($IndividualAcara as $ListAcara){
									  echo $ListAcara."<br>";
								  } ?>
							  </td>
							  <td><?php echo $programLocation; ?></td>
								  
							  <td>
								  <a href="#" class="" data-toggle="modal" data-target="#editActivity<?php echo $col["IdprogramDetail"]; ?>"><span class="btn btn-primary btn-xs fa fa-edit" data-toggle="tooltip" data-placement="left" title="" data-original-title="Edit Program Tentative"></span></a>
								  
								  
								  
								  <a href="#" class="" data-toggle="modal" data-target="#deleteActivity<?php echo $col["IdprogramDetail"]; ?>"><span class="btn btn-danger btn-xs fa fa-trash-alt" data-toggle="tooltip" data-placement="left" title="" data-original-title="Delete Tentative"></span></a>
								  
							  </td>

							</tr>
							
  <!--Edit activity Modal-->
  <div class="modal fade" id="editActivity<?php echo $col["IdprogramDetail"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div id="largeModal" class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
        </div>
        <div class="modal-body">
       <form method="post" action="">
          
          <div class="form-group row">
		   		<label class="col-form-label col-sm-2">Tarikh:</label>
		   		<div class="col-sm-10">
		   			<?php $queryDate=mysqli_query($con, "SELECT * FROM program WHERE programId='$proposalId'");
						$rowDate=mysqli_fetch_array($queryDate);
						echo date('d-m-Y',strtotime($rowDate["date"]));
						?>
		   		</div>
		   </div>
          
          <div class="form-group row">
			<label class="col-sm-2 col-form-label">Masa:</label>
			<div class="col-sm-10 row">&nbsp;&nbsp;&nbsp;
			<select name="protime1" class="form-control col-sm-5" >
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
										   <select name="protime2" class="form-control col-sm-5">
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
		   		<label class="col-form-label col-sm-2">Lokasi:</label>
		   		<div class="col-sm-10">
		   			<input type="text" name="proprogramLocation" class="form-control" value="<?php echo $programLocation; ?>">
		   		</div>
		   </div>	
           
           <div class="form-group row">
				<label for="inputacara" class="col-sm-2 col-form-label">Acara:</label>
				<div class="col-sm-10">
					<textarea rows="6" name="proacara" class="form-control"><?php echo $acara; ?></textarea>
					
				</div>
		   </div>
           

           
		  <input type="hidden" name="userId" value="<?php echo $session; ?>">
		  <input type="hidden" name="programId" value="<?php echo $col["programid"]; ?>">
		  <input type="hidden" name="idprogramdetail" value="<?php echo $col["IdprogramDetail"]; ?>">
		  
		  </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="input" name="edit">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
	
																								

	<!--Delete activity Modal-->
  <div class="modal fade" id="deleteActivity<?php echo $col["IdprogramDetail"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div id="largeModal" class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this?</h5>
        </div>
        <div class="modal-body">
       <form method="post" action="">
          
          <div class="form-group row">
		   		<label class="col-form-label col-sm-2">Tarikh:</label>
		   		<label class="col-form-label col-sm-10"><?php $queryDate=mysqli_query($con, "SELECT * FROM program WHERE programId='$proposalId'");
						$rowDate=mysqli_fetch_array($queryDate);
						echo date('d-m-Y',strtotime($rowDate["date"]));
						?></label>
		   </div>
         
         <div class="form-group row">
			<label class="col-sm-2 col-form-label">Masa:</label>
			<label class="col-sm-4 col-form-label"><?php echo $col["time1"]; ?> - <?php echo $col["time2"]; ?></label>
		 </div>
          
           <div class="form-group row">
		   		<label class="col-form-label col-sm-2">Lokasi:</label>
		   		<label class="col-form-label col-sm-10"><?php echo $programLocation; ?></label>
		   </div>	
           
           <div class="form-group row">
				<label for="inputacara" class="col-sm-2 col-form-label">Acara:</label>
				<label for="inputacara" class="col-sm-10 col-form-label"><?php $IndividualAcara=explode("\n",$acara);
								  //$IndividualName=preg_split('/$\R?^/m', $Nama);
								  foreach($IndividualAcara as $ListAcara){
									  echo $ListAcara."<br>";
								  } ?></label>
		   </div>
           
 		   <!--<div class="form-group row">
		   <label for="inputproketuaUnit" class="col-sm-2 col-form-label"><strong>Ketua Program:</strong></label>
		   <label for="inputproketuaUnit" class="col-sm-10 col-form-label"><strong><?php $IndividualName=explode(",",$Nama);
								  //$IndividualName=preg_split('/$\R?^/m', $Nama);
								  foreach($IndividualName as $ListName){
									  echo $ListName."<br>";
								  } ?></strong></label>
			</div>-->
           
		  <input type="hidden" name="userId" value="<?php echo $session; ?>">
		  <input type="hidden" name="idprogramdetail" value="<?php echo $col["IdprogramDetail"]; ?>">
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
             
        <div class="row">
		<div class="col-lg-12">
			<div style="float: right;">
				<a class="btn btn-success btn-lg" href="activity2-tentative.php?id=<?php echo $proposalId; ?>" id="btnBack"><i class="fa fa-backward"></i> Back</a>
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
  <!--<div class="modal fade" id="newActivity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Perincian Program</h5>
        </div>
        <div class="modal-body">
       <form method="post" action="">

		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-4">Tarikh Program:</label>
		   <div class="col-sm-8">
		   	<input name="prodate" class="form-control" type="text"  value="<?php echo date("d-m-Y");?>" id="datepicker">
		   </div>
		   </div>

           
		  <input type="hidden" name="userId" value="<?php echo $session; ?>">
		  </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="input" name="submiting">Save</button>
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
