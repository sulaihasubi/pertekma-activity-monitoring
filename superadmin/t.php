<?php
// Tentukan path yang tepat ke mPDF
//$nama_dokumen='PDF'; //Beri nama file PDF hasil.
//define('_MPDF_PATH','mpdf/'); // Tentukan folder dimana anda menyimpan folder mpdf
//include(_MPDF_PATH . "mpdf.php"); // Arahkan ke file mpdf.php didalam folder mpdf
//$mpdf=new mPDF('utf-8', 'A4', 10.5, 'arial'); // Membuat file mpdf baru
//Memulai proses untuk menyimpan variabel php dan html
//ob_start();

	require_once('../connect.php');
$proposalId=1;

//TRY TEST for DOMPDF
set_include_path(get_include_path() . PATH_SEPARATOR . "dompdf-master/src/Dompdf.php");

//require_once('../Dompdf.php');
// include autoloader
require_once 'dompdf-master/src/Autoloader.php';
Dompdf\Autoloader::register();

// reference the Dompdf namespace
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$html="print.php";
$dompdf->load_html($html); //$html dia x kenal
// Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();

$output = $dompdf->output();
file_put_contents("../a.pdf", $output);


?>