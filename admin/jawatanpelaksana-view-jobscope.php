<script src="../vendor/jquery/jquery.min.js"></script>
  
<?php
error_reporting(0);
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
$IDORG=$_GET["idOrg_detail"];

$org_detail=mysqli_query($con, "SELECT * FROM org_detail WHERE idOrg_detail='$IDORG'");
$row1=mysqli_fetch_array($org_detail);
$jawatan=$row1["ja_watan"];
//$jobscope_id=$row1["jobscope_id"];


//edit query
if(isset($_POST['edit'])){
	$proJobScope=$_POST['proJobScope'];
	//$idOrg_detail=$_POST['idOrg_detail'];
	$idscope=$_POST['jobscopeid'];
	
	
	mysqli_query($con, "UPDATE job_scope SET jobScope='$proJobScope' WHERE jobscope_id='$idscope'");
	$msgBox=alertBox('Job Scope Details has been Updated.');
}

//delete query
if(isset($_POST['delete'])){
	$proJobScope=$_POST['proJobScope'];
	$idscope=$_POST['jobscopeid'];

	mysqli_query($con, "DELETE FROM job_scope WHERE jobscope_id='$idscope'");
			$msgBox=alertBox('List has been Deleted!');
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

  <title>PERTEKMA - Job Scope</title>

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
      <li class="nav-item">
        <a class="nav-link" href="activityPostmortem.php">
          <span>&nbsp;Activity Post-Mortem</span></a>
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
            <h1 class="h3 mb-0 text-gray-800">Manage Job Scope</h1> 
          </div>
			
			
           <!--<div class="">
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
					  <h6 class="m-0 font-weight-bold text-primary">Job Scope <em>Jawatankuasa Pelaksana - <?php echo $jawatan ?></em></h6>
					</div>
					<div class="container">
					  <p></p>
						<table class="table table-bordered"  width="100%" cellspacing="0">
						  <thead>
							<tr>
							  <th>Job Scope</th>
							  <th width="15%">Action</th>
							</tr>
						  </thead>
						  <tbody>
							
							<?php 
							$join=mysqli_query($con, "SELECT * FROM job_scope WHERE id_orgDetail='$IDORG'");
							  while($col = mysqli_fetch_array($join)){
								  $JobScope=$col["jobScope"];
							?>
							
							<tr>
							  
							  <td><?php echo $JobScope; ?> </td>
							  <td>
					  	  	 	  <a href="#" class="" data-toggle="modal" data-target="#editJobScope<?php echo $col["idequipmentdetail"]; ?>"><span class="btn btn-primary btn-xs fa fa-edit" data-toggle="tooltip" data-placement="left" title="" data-original-title="Edit Details"></span></a>
								  
								  <a href="#" class="" data-toggle="modal" data-target="#deleteJobScopeDetail<?php echo $col["idequipmentdetail"]; ?>"><span class="btn btn-danger btn-xs fa fa-trash-alt" data-toggle="tooltip" data-placement="left" title="" data-original-title="Delete Details"></span></a>  
							  </td>
							</tr>
  <!-- Edit Job Scope Modal-->
  <div class="modal fade" id="editJobScope<?php echo $col["idOrg_detail"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div id="largeModal" class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Job Scope for <em>Jawatankuasa Pelaksana</em></h5>
        </div>
        <div class="modal-body">
       <form method="post" action="">
       
       <div class="form-group row">
		    <label class="col-form-label col-sm-2">Job Scope:</label>
		    <div class="col-sm-10">
		    <textarea rows="6" name="proJobScope" class="form-control"><?php echo $JobScope; ?></textarea>
		    <input type="hidden" name="idOrg_detail" value="<?php echo $col["idOrg_detail"]; ?>">
		    <input type="hidden" name="jobscopeid" value="<?php echo $col["jobscope_id"]; ?>">
		   </div>
	   	   </div>
   	   
	   	   
		  <input type="hidden" name="userId" value="<?php echo $session; ?>">
		  <input type="hidden" name="iduser" value="<?php echo $col["iduser"]; ?>">
		  </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="input" name="edit">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  							
<!--Delete Job Scope Modal-->
  <div class="modal fade" id="deleteJobScopeDetail<?php echo $col["idOrg_detail"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div id="largeModal" class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this?</h5>
        </div>
        <div class="modal-body">
       <form method="post" action="">
       
       <div class="form-group row">
		    <label class="col-form-label col-sm-2">Job Scope:</label>
		    <div class="col-sm-10">
			   <label class="col-form-label col-sm-10"><?php echo $JobScope; ?></label>
			   <input type="hidden" name="idOrg_detail" value="<?php echo $col["idOrg_detail"]; ?>">
		    <input type="hidden" name="jobscopeid" value="<?php echo $col["jobscope_id"]; ?>">
		   </div>
	   	   </div>
	   	   
		  
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
				<a class="btn btn-success btn-lg" href="jawatanpelaksana-jobscope.php?id=<?php echo $proposalId; ?>" id="btnBack"><i class="fa fa-backward"></i> Back</a>
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
$(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls .d3:first'),
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
