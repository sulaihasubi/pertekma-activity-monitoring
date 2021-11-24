<script src="../vendor/jquery/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag---------->
  
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
//$programId=$_GET["idprogram"];
//$programId=$_GET["idprogram"];

// Select proposal detail
$queryproposal=mysqli_query($con, "SELECT * FROM proposal WHERE proposald='$proposalId'");
$rowproposal=mysqli_fetch_array($queryproposal);

	// Insert query form into db
	if(isset($_POST['submiting'])){
		 echo $propenutup=$_POST['propenutup'];
		//$proID=$_POST['proposald'];
		
		
			mysqli_query($con, "UPDATE proposal SET penutup='$propenutup' WHERE proposald='$proposalId'");
		

		header('Location:proposal-add6.php?id='.$proposalId);
		
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

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"></h1>
          </div>

          <!-- Content Row -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
         <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>


<?php $proposal=mysqli_query($con, "SELECT * FROM proposal WHERE proposald='1'");
					$col = mysqli_fetch_array($proposal);
								  $Title=$col["proposalTitle"];
								  $date1=$col["date1"];
								  $date2=$col["date2"];
								  $time_1=$col["time_1"];
								  $time_2=$col["time_2"];
								  $Location=$col["location"];?>


          <div id="page-wrapper">
          <form method="post" action="">
           <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                </div>
            </div>
              <div class="row">
                    <div class="col-md-3 col-lg-12">
                        <div class="form-group">
                            <label class="control-label"><b>1.0 Tujuan</b></label>
                            
                            <textarea readonly class="form-control-plaintext"><?php echo $Title; ?></textarea>
                        </div>
                    </div>
					
					<div class="col-md-3 col-lg-12">
                        <div class="form-group">
                            <label class="control-label"><b>2.0 Pendahuluan</b></label>
                            <textarea readonly class="form-control-plaintext"><?php echo $col["pendahuluan"]; ?></textarea>
                            
                        </div>
                    </div>
					
					<div class="col-md-3 col-lg-12">
                        <div class="form-group">
                            <label class="control-label"><b>3.0 Objektif</b></label>
                            <textarea rows="4" name="proobjektif" class="form-control"></textarea>
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
                            <textarea rows="2" name="propenganjur" class="form-control"></textarea>
                        </div>
                    </div>
					
					<div class="col-md-3 col-lg-12">
                        <div class="form-group">
                            <label class="control-label"><b>6.0 Sasaran</b></label>
                            <textarea rows="2" name="prosasaran" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
               <div class="row">
				<div class="col-lg-12">
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
				</div>
               </div>
                <div class="row">

					<div class="col-lg-12">
                        <div class="form-group">
                            <label class="control-label">Sokongan dan Ulasan Penasihat PERTEKMA</label>
                        </div>
                        <div class="form-group">
                        <label class="control-label">____________________________________________________________________________________________________________________________________________________________</label>
                        </div>
                        <div class="form-group">
                        <label class="control-label">____________________________________________________________________________________________________________________________________________________________</label>
                        </div>
                        <div class="form-group">
                        <label class="control-label">____________________________________________________________________________________________________________________________________________________________</label><br><br>
                        </div>
                        <div class="form-group">
                        <label class="control-label" >................................................................</label>
                        </div><br><br>
                        <div class="form-group">
                        	<label class="control-label">Nama:</label>
                        </div>
                        <div class="form-group">
                        	<label class="control-label">Tarikh:</label>
                        </div>
                        <div class="form-group">

                        	<label class="control-label">Cop Rasmi:</label>
                        </div><br><br>
                        
                        <div class="form-group">
                            <label class="control-label">Sokongan dan Ulasan Dekan Fakulti Sains Komputer dan Teknologi Maklumat</label>
                        </div>
                        <div class="form-group">
                        <label class="control-label">____________________________________________________________________________________________________________________________________________________________</label>
                        </div>
                        <div class="form-group">
                        <label class="control-label">____________________________________________________________________________________________________________________________________________________________</label>
                        </div>
                        <div class="form-group">
                        <label class="control-label">____________________________________________________________________________________________________________________________________________________________</label><br><br>
                        </div>
                        <div class="form-group">
                        <label class="control-label" >................................................................</label>
                        </div>
                        <div class="form-group">
                        	<label class="control-label">Nama:</label>
                        </div>
                        <div class="form-group">
                        	<label class="control-label">Tarikh:</label>
                        </div>
                        <div class="form-group">
                        	<label class="control-label">Cop Rasmi:</label>
                        </div>                           
                    </div>
                </div>
    <br />
</div>

<div class="row">
    
</div>
</div>

   <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

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
