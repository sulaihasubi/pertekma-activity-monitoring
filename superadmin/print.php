<script src="../vendor/jquery/jquery.min.js"></script>
 
<?php
ob_start();
// Tentukan path yang tepat ke mPDF
//$nama_dokumen='PDF'; //Beri nama file PDF hasil.
//define('_MPDF_PATH','mpdf/'); // Tentukan folder dimana anda menyimpan folder mpdf
//include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
//$mpdf=new mPDF('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
//Memulai proses untuk menyimpan variabel php dan html
//ob_start();

	require_once('../connect.php');
//$proposalId=1;



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
  <link rel="stylesheet" href="../vendor/jquery/jquery-ui.css">
  <script src="../vendor/jquery/jquery-ui.js"></script>
  <link rel="stylesheet" href="../vendor/jquery/jquery.timepicker.min.css">
  <script src="../vendor/jquery/jquery.timepicker.min.js"></script>
	
		
</head>

<body id="page-top">
<div id="masterContent">
	<div id="wrapper">
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				<div class="container-fluid">
					<div id="page-wrapper">
					
<!--Print form 1-->					
						<div class="row">ffgff
							<?php
							$proposal=mysqli_query($con, "SELECT * FROM proposal WHERE proposald='1'");
							$col = mysqli_fetch_array($proposal);
							$Title=$col["proposalTitle"];
							$date1=$col["date1"];
							$date2=$col["date2"];
							$time_1=$col["time_1"];
							$time_2=$col["time_2"];
							$Location=$col["location"];
							?>
							<div class="form-group">
								<label><?php echo $Title; ?></label>
							</div>
							<div class="form-group">
								<label><?php echo $date1; ?> to <?php echo $date2; ?></label>
							</div>
						</div>
		
<!--Form 2-->
						<div class="row">
						sfdsfd
						</div>
<!--Form 3-->						
						<div class="row">
						sfdsfd
						</div>
						<div class="row">
						sfdsfd
						</div>
					</div>
				</div>
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Copyright &copy; PERTEKMA, FCSIT 2019</span>
						</div>
					</div>
				</footer>
			</div>
		</div>
	</div>
  <button id="btnPrint">Print Preview</button>
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
		 $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
</body>

</html>

<?php
//$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
$html=ob_end_clean();
//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
//$mpdf->WriteHTML(utf8_encode($html));
//$mpdf->Output($nama_dokumen.".pdf" ,'I');
//exit;

//TRY TEST for DOMPDF
set_include_path(get_include_path() . PATH_SEPARATOR . "dompdf-master/src/Dompdf.php");

//require_once('../Dompdf.php');
// include autoloader
require_once 'dompdf-master/src/Autoloader.php';
Dompdf\Autoloader::register();

// reference the Dompdf namespace
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->load_html($html); //$html dia x kenal
// Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();

$output = $dompdf->output();
file_put_contents("a.pdf", $output);

?>
