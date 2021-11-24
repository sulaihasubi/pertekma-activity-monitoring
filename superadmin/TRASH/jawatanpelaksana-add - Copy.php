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
		$username2=$rowUser["username"];
	}

	// Alert message
	function alertBox($message){
		return "<div class=\"alert alert-success alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">x</button>$message</div>";
	}
	$msgBox="";
?>
<?php
//add query
$proposalId=$_GET["id"];


if(isset($_POST['submitting'])){
	$proja_watan=$_POST['proja_watan'];
	$pronama=$_POST['pronama'];
	$combinename=implode(",",$pronama);
	$propassword=$_POST['propassword'];
	$status=$_POST['status'];
	//$prousername=$_POST['prousername'];
	//$idacaSession=$_POST['acaSessionId'];
	//$userId=$_POST['userId'];
		//$proaction=$_POST['proaction'];
		// check for activity duplicate (title)
	$checkDuplicate=mysqli_query($con, "SELECT * FROM org_detail WHERE id_proposal='$proposalId' AND ja_watan='$proja_watan'");
	if(mysqli_num_rows($checkDuplicate)<=0){
		mysqli_query($con, "INSERT INTO org_detail (id_proposal, nama, ja_watan, password) VALUES('$proposalId','$combinename','$proja_watan','$propassword')");
		mysqli_query($con, "INSERT INTO user (username, password, status, ID_proposal) VALUES('$proja_watan','$propassword','$status', '$proposalId')");
			foreach($pronama as $nama){
				$checkExistMember=mysqli_query($con, "SELECT * FROM org_name WHERE nama='$nama'");
				if(mysqli_num_rows($checkExistMember)<=0){
					mysqli_query($con,"INSERT INTO org_name (nama) VALUES ('$nama')");
			}
		}
		//paste sini
	$msgBox=alertBox('Added Successfully.');
	}else{
		$msgBox=alertBox('Similar position name added. Please change.');
	}
		
		//header('Location:activity2.php?id='.$proposalId);
}

//edit query 
if(isset($_POST['edit'])){
	$proja_watan=$_POST['proja_watan'];
	$pronama=$_POST['pronama'];
	$combinename=implode(",",array_filter($pronama));
	$propassword=$_POST['propassword'];
    $idOrg_detail=$_POST['prosId'];
	$status=$_POST['status'];
	if($status=="User"){
		$status1=4;
	}elseif($status=="Admin"){
		$status1=3;
	}elseif($status=="Superadmin"){
		$status1=2;
	}elseif($status==4){
		$status1=4;
	}elseif($status==2){
		$status1=2;
	}elseif($status==3){
		$status1=3;
	}
	//echo $status1;
	$iduserpeo=$_POST['iduserpeo'];
	mysqli_query($con, "UPDATE org_detail SET nama='$combinename', ja_watan='$proja_watan', password='$propassword' WHERE idOrg_detail='$idOrg_detail'");
	foreach($pronama as $nama){
			$checkExistMember=mysqli_query($con, "SELECT * FROM org_name WHERE nama='$nama'");
			if(mysqli_num_rows($checkExistMember)<=0){
				mysqli_query($con,"INSERT INTO org_name (nama) VALUES ('$nama')");
			}
		}
	//echo "UPDATE user SET username='$proja_watan', password='$propassword', status='$status1', ID_proposal='$proposalId' WHERE iduser='$iduserpeo'";
	mysqli_query($con, "UPDATE user SET username='$proja_watan', password='$propassword', status='$status1', ID_proposal='$proposalId' WHERE iduser='$iduserpeo'");
	$msgBox=alertBox('List Updated.');	
}

//Delete query for committee members
if(isset($_POST['delete'])){
    $idOrg_detail=$_POST['prosId'];
	$idorg_name=$_POST['idorg_name'];
	$iduser=$_POST['iduser'];
	$ja_watan=$_POST['ja_watan'];
	mysqli_query($con, "DELETE FROM org_detail WHERE idOrg_detail='$idOrg_detail'");
	mysqli_query($con, "DELETE FROM user WHERE username='$ja_watan' AND ID_proposal='$proposalId'");
	$msgBox=alertBox('List Updated.');
	
	//2 Query yang dibawah ni dia x mendelete pun dalam database
	//mysqli_query($con, "DELETE FROM org_name WHERE idorg_name='$idorg_name'");
		//$msgBox=alertBox('List Updated.');
	
		//$msgBox=alertBox('List Updated.');
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

  <title>PERTEKMA - Committee Members</title>

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
          
          <span>&nbsp;Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        
      </div>
           
 	  <!-- Nav Item - Proposal Pages  Menu -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="proposal.php" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
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
      
     <!-- Activity Monitoring Pages  Menu --> 
      <!--<li class="nav-item">
        <a class="nav-link" href="activityMonitoring.php">
          <span>&nbsp;Activity Monitoring</span></a>
      </li>
      
     <!-- Activity Evaluation Pages  Menu --> 
      
     
      <!-- Nav Item - Pages Collapse Menu -->
      

      <!-- Nav Item - Utilities Collapse Menu -->
      

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        
      </div>

  <!-- Add User for the Activity Proposal -->
      <!-- <li class="nav-item">
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
      <!-- <li class="nav-item">
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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome, I am&nbsp;<?php echo $username2; ?></span>
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
                <a class="dropdown-item" href="../index.php" data-toggle="modal" data-target="#logoutModal">
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
            <h1 class="h3 mb-0 text-gray-800">Manage Committee Members</h1> 
          </div>
			
			
          <div class="">
  			<p class="lead">
  				<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#newCommittee">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Add Committee Members
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
					  <h6 class="m-0 font-weight-bold text-primary">10.0 Jawatankuasa Pelaksana</h6>
					</div>
					<div class="container">
					  <p></p>
						<table class="table table-bordered"  width="100%" cellspacing="0">
						  <thead>
							<tr>
							  <th width="30%">Struktur Organisasi Pelaksana </th>
							  <th>Nama</th>
							  <th width="15%">Action</th>
							</tr>
						  </thead>
						  <tbody>
							<?php 
							  // SELECT * FROM org_detail a JOIN user b ON b.ID_proposal=a.id_proposal WHERE a.id_proposal='$proposalId'
							$org_detail=mysqli_query($con, "SELECT * FROM org_detail WHERE id_proposal='$proposalId'");
							  while($col = mysqli_fetch_array($org_detail)){
								  $Nama=$col["nama"];
								  $IDORG=$col["idOrg_detail"];
								  $Jawatan=$col["ja_watan"];
								  $Password=$col["password"];
								 
							  ?>
							<tr>
							  <td><?php echo $Jawatan; ?></td>
							  <td style="text-align: justify;"><?php 
								  $IndividualName=explode(",",$Nama);
								  foreach($IndividualName as $ListName){
									  echo $ListName."<br>";
								  }
								  ?></td>
							  <td>
								  <a href="#" class="" data-toggle="modal" data-target="#editCommittee<?php echo $col["idOrg_detail"]; ?>"><span class="btn btn-primary btn-xs fa fa-edit" data-toggle="tooltip" data-placement="left" title="" data-original-title="Edit Program Tentative"></span></a>
								  
								  <a href="#" class="" data-toggle="modal" data-target="#deleteCommittee<?php echo $col["idOrg_detail"]; ?>"><span class="btn btn-danger btn-xs fa fa-trash-alt" data-toggle="tooltip" data-placement="left" title="" data-original-title="Delete Committee Member"></span></a>   
							  </td>
							</tr>
							
  <!--Edit Committee Modal-->
  <div class="modal fade" id="editCommittee<?php echo $col["idOrg_detail"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div id="largeModal" class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Jawatankuasa Pelaksana</h5>
        </div>
        <div class="modal-body">
       <form method="post" action="">
          
           <div class="form-group row">
		   <label class="col-form-label col-sm-2">Jawatan:</label>
		   <div class="col-sm-10">
		   <input type="text" name="proja_watan" class="form-control" value="<?php echo $Jawatan; ?>">
		   </div>
		   </div>
		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2">Password:</label>
		   <div class="col-sm-10">
		   <input type="text" name="propassword" class="form-control" value="<?php echo $Password; ?>">
		   </div>
		   </div>
		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2">Status:</label>
		   <div class="col-sm-10">
        <?php $callStatus=mysqli_query($con,"SELECT * FROM user WHERE username='$Jawatan' AND ID_proposal='$proposalId'");
			  $col2=mysqli_fetch_array($callStatus);
			  $status=$col2["status"];
		?>
        <select name="status" class="form-control">
	        <option <?php if($status=='4'){echo "value='4' selected"; } ?>>User</option>
	        <option <?php if($status=='3'){echo "value='3' selected"; } ?>>Admin</option>
	        <option <?php if($status=='2'){echo "value='2' selected"; } ?>>Superadmin</option>
	        
			</select>
	   		</div>
		    </div>
		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2">Nama:</label>
		   <div class="col-sm-10">
			   <?php
						$IndividualNames=explode(",",$Nama);
						foreach($IndividualNames as $ListNames){
							
							?>
					   <div class="col-sm-12">
						   <div class="form-group row">
						   <div class="col-sm-10">
							   <input name="prosId" type="hidden" value="<?php echo $col["idOrg_detail"]; ?>">
							   <input name="pronama[]" type="text" readonly class="form-control-plaintext" value="<?php echo $ListNames; ?>">
						   </div>
						   <div class="col-sm-2">
							   <button class="btn-danger btn-xs" onclick="return delete_records()" type="submit" name="pronamass" value="<?php echo $col["idOrg_detail"]; ?>,<?php echo $ListNames; ?>">
								   <span class="fa fa-minus"></span>
							   </button>
						   </div>
						   </div>
						   
					   </div>
					   
					   		
					   		<?php
							//echo $ListName."<br>";
						}
					   ?>
		   	<div class="controls">
               <div class="d2">
                   <div class="entry input-group">
					   <input name="iduserpeo" type="hidden" value="<?php echo $col2["iduser"]; ?>">
                   <input list="pronama"  name="pronama[]" type="text" placeholder="Nama Pelaksana" class="form-control">
				
                   <datalist id="pronama"> 
                   <option value="">Please Choose</option>
									 <?php
										$cdquery = "SELECT * FROM org_name";
										$cdresult = mysqli_query($con, $cdquery);
										
										while ($cdrow = mysqli_fetch_array($cdresult))
											{
											$acaNama = $cdrow["nama"];
											echo "<option ='$acaNama'>$acaNama</option>";
											}
										
										?>
                  </datalist>
                       <span class="input-group-btn">
                           <button class="btn btn-success btn-add" type="button">
                           <span class="fa fa-plus"></span>
                           </button>
                           </span>
                           </div>
                                   </div>
                                   </div>
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
  							
<!--Delete Committee Modal-->
  <div class="modal fade" id="deleteCommittee<?php echo $col["idOrg_detail"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div id="largeModal" class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this?</h5>
        </div>
        <div class="modal-body">
       <form method="post" action="">
       
       <div class="form-group row">
		    <label class="col-form-label col-sm-2">Jawatan:</label>
		    <div class="col-sm-10">
			   <label class="col-form-label col-sm-10"><?php echo $Jawatan; ?></label>
		   </div>
	   	   </div>
	   	   
	   	   <div class="form-group row">
		    <label class="col-form-label col-sm-2">Password:</label>
		    <div class="col-sm-10">
			   <label class="col-form-label col-sm-10"><?php echo $Password; ?></label>
		   </div>
	   	   </div>
	   	   
	   	   <div class="form-group row">
		    <label class="col-form-label col-sm-2">Status:</label>
		    <div class="col-sm-10"><?php $callStatus=mysqli_query($con,"SELECT * FROM user WHERE username='$Jawatan' AND ID_proposal='$proposalId'");
			  $col2=mysqli_fetch_array($callStatus);
			  $status=$col2["status"];
			  if($status=='4'){
				  ?>
				  <label class="col-form-label col-sm-10">User</label>
				  <?php
			  }elseif($status=='3'){
				  ?>
				  <label class="col-form-label col-sm-10">Admin</label>
				  <?php
			  }elseif($status=='2'){
				  ?>
				  <label class="col-form-label col-sm-10">Superadmin</label>
				  <?php
			  }
			?>
		   </div>
	   	   </div>
       
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2">Nama:</label>
		   <div class="col-sm-10">
			   <?php
						$IndividualNames=explode(",",$Nama);
						foreach($IndividualNames as $ListNames){
							
							?>
					   <div class="col-sm-12">
						   <div class="form-group row">
						   <div class="col-sm-10">
							   <input name="prosId" type="hidden" value="<?php echo $col["idOrg_detail"]; ?>">
							   <input name="pronama[]" type="text" readonly class="form-control-plaintext" value="<?php echo $ListNames; ?>">
						   </div>
						   </div>
						   
					   </div>
					   
			   		
					   		<?php
							//echo $ListName."<br>";
						}
					   ?>
		   </div>
		   </div>
	   	   
		  <input type="hidden" name="userId" value="<?php echo $session; ?>">
		  <input type="hidden" name="idOrg_detail" value="<?php echo $col["idOrg_detail"]; ?>">
		  <input type="hidden" name="idorg_name" value="<?php echo $col["idorg_name"]; ?>">
		  <input type="hidden" name="ja_watan" value="<?php echo $col["ja_watan"]; ?>">
		  <input type="hidden" name="iduser" value="<?php echo $col["iduser"]; ?>">
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
				<a class="btn btn-success btn-lg" href="proposal-add2.php?id=<?php echo $proposalId; ?>" id="btnBack"><i class="fa fa-backward"></i> Back</a>
				<a class="btn btn-success btn-lg" href="equipment.php?id=<?php echo $proposalId; ?>" id="btnNext"><i class="fa fa-save"></i> Next</a>
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
  <div class="modal fade" id="newCommittee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div id="largeModal" class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Jawatankuasa Pelaksana</h5>
        </div>
        <div class="modal-body">
       <form method="post" action="">
           <div class="form-group row">
		   <label class="col-form-label col-sm-2">Jawatan:</label>
		   <div class="col-sm-10">
		   <input type="text" name="proja_watan" class="form-control">
		   </div>
		   </div>
		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2">Password:</label>
		   <div class="col-sm-10">
		   <input type="text" name="propassword" class="form-control">
		   </div>
		   </div>
		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2">Status:</label>
		   <div class="col-sm-10">
		   <select name="status" class="form-control">
				<option value="4">User</option>
				<option value="3">Admin</option>
				<option value="2">Superadmin</option>
			</select>
		   
		   </div>
		   </div>
		   
		   <div class="form-group row">
		   <label class="col-form-label col-sm-2">Nama:</label>
		   <div class="col-sm-10">
		   	<div class="controls">
               <div class="d1">
                   <div class="entry input-group">
                   <input list="pronama"  name="pronama[]" type="text" placeholder="Nama Pelaksana" class="form-control">
                   <datalist id="pronama"> 
                   <option value="">Please Choose</option>
									 <?php
										$cdquery = "SELECT * FROM org_name";
										$cdresult = mysqli_query($con, $cdquery);
										
										while ($cdrow = mysqli_fetch_array($cdresult))
											{
											$acaNama = $cdrow["nama"];
											echo "<option ='$acaNama'>$acaNama</option>";
											}
										
										?>
                  </datalist>
                       <span class="input-group-btn">
                           <button class="btn btn-success btn-add" type="button">
                           <span class="fa fa-plus"></span>
                           </button>
                           </span>
                           </div>
                                   </div>
                                   </div>
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
$(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls .d1:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="fa fa-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
		
        $(this).parents('.entry:first').remove();

        e.preventDefault();
        return false;
    });
});
</script>

<script>
$(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls .d2:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="fa fa-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
		
        $(this).parents('.entry:first').remove();

        e.preventDefault();
        return false;
    });
});
</script>
	
<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
			format: 'dd-mm-yyyy'
        });
	
	        $('#datepicker1').datepicker({
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
	<script>
function delete_records() 
{
	
    var conf= confirm('Delete name?');
    if (conf== true){
       document.frm.action = "jawatanpelaksana.php?id='.$proposalId";
       document.frm.submit();
    }else{
      return false;
    }
}
</script>
</body>

</html>
<?php
// delete pelaksana tugas
if(isset($_POST["pronamass"])){
	$Data=$_POST["pronamass"];
	$expData=explode(",",$Data);
	$FirstElement=current($expData);
	$LastElement=end($expData);
	$queryGetName=mysqli_query($con, "SELECT * FROM org_detail WHERE idOrg_detail='$FirstElement'");
	$col3=mysqli_fetch_array($queryGetName);
	$AllName=$col3["nama"];
	$expAllName=explode(",",$AllName);
	$reduceList=array_diff($expAllName, array($LastElement));
	$newList=implode(",",$reduceList);
	mysqli_query($con,"UPDATE org_detail SET nama='$newList' WHERE idOrg_detail='$FirstElement'");
	header('location:jawatanpelaksana.php?id='.$proposalId);
}
?>	
