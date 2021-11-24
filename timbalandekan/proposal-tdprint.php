<script type="text/javascript">
function printInvoice(page) {
	var oldWin = this.window;
	var iWin = window.open(page,"iWin");
	oldWin.focus();
}
</script>
<!--<a href="project_download.php<?php echo '?proId='.$proId; ?>" data-toggle="modal" onclick="printInvoice(this.href); return false;"><span class="btn btn-primary btn-xs glyphicon glyphicon-download" data-toggle="tooltip" data-placement="left" data-original-title="Download Project"></span></a>

<?php
// Get id from url
$proposalId=$_GET["id"];
require_once('../connect.php');
//$proposalId=1;

// Select proposal detail
$queryproposal=mysqli_query($con, "SELECT * FROM proposal WHERE proposald='$proposalId'");
$rowproposal=mysqli_fetch_array($queryproposal);
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
			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">
				<!-- Main Content -->
				<div id="content">
					<!-- Begin Page Content -->
					<div class="container-fluid">
						<!-- Content Row -->
						<div class="row">
							<div class="col-lg-12">
								<div class="text-center">
									<h3><?php echo $rowproposal["proposalTitle"]; ?></h3>
								</div>
							</div>
						</div>
						<div id="page-wrapper">
							<div class="row">
								<div class="form-group col-lg-12">
									<label><b>1.0 Tujuan</b></label>
									<textarea rows="3" class="form-control-plaintext" readonly><?php echo $rowproposal["tujuan"]; ?></textarea>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-12">
									<label><b>2.0 Pendahuluan</b></label>
									<textarea rows="3" class="form-control-plaintext" readonly><?php echo $rowproposal["pendahuluan"]; ?></textarea>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-12">
									<label><b>3.0 Objektif</b></label>
									<textarea rows="3" class="form-control-plaintext" readonly><?php echo $rowproposal["objektif"]; ?></textarea>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-12">
									<label><b>4.0 Tarikh dan Tempat</b></label>
								</div>
							</div>
							<div class="row">
								<div class="form-group row col-lg-12">
									<label class="col-sm-1 col-form-label">Tarikh: </label>
									<div class="col-sm-11">
										<input type="text" readonly class="form-control-plaintext" value="<?php echo $rowproposal["date1"]." hingga ".$rowproposal["date2"]; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group row col-lg-12">
									<label class="col-sm-1 col-form-label">Tempat: </label>
									<div class="col-sm-11">
										<input type="text" readonly class="form-control-plaintext" value="<?php echo $rowproposal["location"]; ?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-12">
									<label><b>5.0 Penganjur</b></label>
									<textarea rows="3" class="form-control-plaintext" readonly><?php echo $rowproposal["penganjur"]; ?></textarea>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-12">
									<label><b>6.0 Sasaran</b></label>
									<textarea rows="3" class="form-control-plaintext" readonly><?php echo $rowproposal["sasaran"]; ?></textarea>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-12">
									<label><b>7.0 Perincian Program</b></label>
								</div>
							</div>
							<?php
							$query1=mysqli_query($con, "SELECT * FROM activity WHERE proposaId='$proposalId'");
							while($row1=mysqli_fetch_array($query1)){
								?>
								<div class="row">
									<div class="form-group col-lg-12">
										<label><b><?php echo $row1["activityTitle"]; ?></b></label>
									</div>
								</div>
								<div class="row">
									<div class="form-group row col-lg-12">
										<label class="col-sm-1 col-form-label">Tarikh: </label>
										<div class="col-sm-11">
											<input type="text" readonly class="form-control-plaintext" value="<?php echo $row1["date1"]." hingga ".$row1["date2"]; ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-lg-12">
										<label class="col-sm-1 col-form-label">Masa: </label>
										<div class="col-sm-11">
											<input type="text" readonly class="form-control-plaintext" value="<?php echo $row1["time1"]." hingga ".$row1["time2"]; ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group row col-lg-12">
										<label class="col-sm-1 col-form-label">Tempat: </label>
										<div class="col-sm-11">
											<input type="text" readonly class="form-control-plaintext" value="<?php echo $row1["activityLocation"]; ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-lg-12">
										<label><b>Objektif:</b></label>
										<textarea rows="3" class="form-control-plaintext" readonly><?php echo $row1["objective"]; ?></textarea>
									</div>
								</div>
								<?php
							}
							?>
							<div class="row">
								<div class="form-group col-lg-12">
									<label><b>8.0 Tentatif Program</b></label>
								</div>
							</div>
							<?php
							$query2=mysqli_query($con, "SELECT * FROM program WHERE proposaId='$proposalId'");
							while($row2=mysqli_fetch_array($query2)){
								$programId=$row2["programId"];
								?>
								<div class="row">
									<div class="form-group col-lg-12">
										<label><b><?php echo $row2["date"]; ?></b></label>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<table class="table table-bordered"  width="100%" cellspacing="0">
											<thead>
												<tr>
													<th width="20%">Masa</th>
													<th>Acara</th>
													<th>Lokasi</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query3=mysqli_query($con, "SELECT * FROM programdetail WHERE programid='$programId'");
												while($row3=mysqli_fetch_array($query3)){
													?>
													<tr>
														<td><?php echo $row3["time1"]; ?> hingga <?php echo $row3["time1"]; ?></td>
														<td><?php
															$acara=$row3["acara"];
															$IndividualAcara=explode("\n",$acara);
															foreach($IndividualAcara as $ListAcara){
																echo $ListAcara."<br>";
															}
															?>
														</td>
														<td><?php echo $row3["programLocation"]; ?></td>
													</tr>
													<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
								<?php
							}
							?>
							<div class="row">
								<div class="form-group col-lg-12">
									<label><b>9.0 Jemputan Rasmi</b></label>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-12">
									<label><b>Program ini menjemput organisasi luar:</b></label>
									<textarea rows="3" class="form-control-plaintext" readonly><?php
																								$jemputanLuar=$rowproposal["jemputanLuar"];
																								$IndiJemLuar=explode("\n",$jemputanLuar);
																								foreach($IndiJemLuar as $ListJemLuar){
																									echo $ListJemLuar."<br>";
																								}
																								?>
									</textarea>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-12">
									<label><b>Jemputan dalam UNIMAS:</b></label>
									<textarea rows="3" class="form-control-plaintext" readonly><?php
																								$jemputanDalam=$rowproposal["jemputanDalam"];
																								$IndiJemDlm=explode("\n",$jemputanDalam);
																								foreach($IndiJemDlm as $ListJemDlm){
																									echo $ListJemDlm."<br>";
																								}
																								?>
									</textarea>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-12">
									<label><b>Kolaberasi:</b></label>
									<textarea rows="3" class="form-control-plaintext" readonly><?php
																								$kolaberasi=$rowproposal["kolaborasi"];
																								$IndiKola=explode("\n",$kolaberasi);
																								foreach($IndiKola as $ListKola){
																									echo $ListKola."<br>";
																								}
																								?>
									</textarea>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-12">
									<label><b>10.0 Jawatankuasa Pelaksana</b></label>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<table class="table table-bordered"  width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>Jawatankuasa</th>
												<th>Nama</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$query4=mysqli_query($con, "SELECT * FROM org_detail WHERE id_proposal='$proposalId'");
											while($row4=mysqli_fetch_array($query4)){
												?>
												<tr>
													<td><?php echo $row4["ja_watan"]; ?></td>
													<td><?php
														$nama=$row4["nama"];
														$IndividualNama=explode(",",$nama);
														foreach($IndividualNama as $ListNama){
															echo $ListNama."<br>";
														}
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
							<div class="row">
								<div class="form-group col-lg-12">
									<label><b>11.0 Senarai Keperluan/Peralatan</b></label>
								</div>
							</div>
							<?php
							$query5=mysqli_query($con, "SELECT * FROM equipment WHERE IDproposal='$proposalId'");
							while($row5=mysqli_fetch_array($query2)){
								$idequipment=$row5["idequipment"];
								?>
								<div class="row">
									<div class="form-group col-lg-12">
										<label><b><?php echo $row5["bahagian"]; ?></b></label>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<table class="table table-bordered" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th>Keperluan</th>
													<th>Kuantiti</th>
													<th>Unit</th>
													<th>Catatan</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$query6=mysqli_query($con, "SELECT * FROM equipmentdetail WHERE idequipment='$idequipment'");
												while($row6=mysqli_fetch_array($query6)){
													?>
													<tr>
														<td><?php echo $row6["keperluan"]; ?></td>
														<td><?php echo $row6["kuantiti"]; ?></td>
														<td><?php echo $row6["unit"]; ?></td>
														<td><?php echo $row6["catatan"]; ?></td>
													</tr>
													<?php
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
								<?php
							}
							?>
							<div class="row">
								<div class="form-group col-lg-12">
									<label><b>12.0 Anggaran Pendapatan dan Perbelanjaan</b></label>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-12">
									<label><b>Anggaran Pendapatan</b></label>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<table class="table table-bordered"  width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>Perkara</th>
												<th>Harga Seunit (RM)</th>
												<th>Kuantiti</th>
												<th>Jumlah (RM)</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$query7=mysqli_query($con, "SELECT * FROM b_income WHERE Iproposald='$proposalId'");
											while($row7=mysqli_fetch_array($query7)){
												?>
												<tr>
													<td><?php echo $row7["perkara"]; ?></td>
													<td><?php echo $row7["hargaSeunit"]; ?></td>
													<td><?php echo $row7["kuantiti"]; ?></td>
													<td><?php echo $row7["jumlah"]; ?></td>
												</tr>
												<?php
											}
											?>
										</tbody>
										<tfoot>
											<tr>
												<th colspan="3">JUMLAH</th>
												<th>
													<?php
													$query8=mysqli_query($con, "SELECT SUM(jumlah) AS Total FROM b_income WHERE Iproposald='$proposalId'");
													$row8=mysqli_fetch_array($query8);
													echo $row8["Total"];
													?>
												</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-12">
									<label><b>Anggaran Perbelanjaan</b></label>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<table class="table table-bordered"  width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>Perkara</th>
												<th>Harga Seunit (RM)</th>
												<th>Kuantiti</th>
												<th>Jumlah (RM)</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$query9=mysqli_query($con, "SELECT * FROM b_outcome WHERE Oproposald='$proposalId'");
											while($row9=mysqli_fetch_array($query9)){
												?>
												<tr>
													<td><?php echo $row9["perkara"]; ?></td>
													<td><?php echo $row9["hargaSeunit"]; ?></td>
													<td><?php echo $row9["kuantiti"]; ?></td>
													<td><?php echo $row9["jumlah"]; ?></td>
												</tr>
												<?php
											}
											?>
										</tbody>
										<tfoot>
											<tr>
												<th colspan="3">JUMLAH</th>
												<th>
													<?php
													$query10=mysqli_query($con, "SELECT SUM(jumlah) AS Total FROM b_outcome WHERE Oproposald='$proposalId'");
													$row10=mysqli_fetch_array($query10);
													echo $row10["Total"];
													?>
												</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="form-group col-lg-12">
									<label><b>13.0 Penutup</b></label>
									<textarea rows="3" class="form-control-plaintext" readonly><?php echo $rowproposal["penutup"]; ?></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<table border="0" width="100%" cellspacing="0">
										<tbody>
											<tr>
												<td>Disediakan oleh,</td>
											</tr>
											<tr>
												<td><br><br><br></td>
											</tr>
											<tr>
												<td>......................................</td>
											</tr>
											<tr>
												<td>Nama:</td>
											</tr>
											<tr>
												<td>Jawatan:</td>
											</tr>
											<tr>
												<td>No Tel:</td>
											</tr>
											<tr>
												<td><br><br><br></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<table border="0" width="100%" cellspacing="0">
										<tbody>
											<tr>
												<td>Disemak oleh,</td>
											</tr>
											<tr>
												<td><br><br><br></td>
											</tr>
											<tr>
												<td>......................................</td>
											</tr>
											<tr>
												<td>Nama:</td>
											</tr>
											<tr>
												<td>Jawatan:</td>
											</tr>
											<tr>
												<td>No Tel:</td>
											</tr>
											<tr>
												<td><br><br><br></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<table border="0" width="100%" cellspacing="0">
										<tbody>
											<tr>
												<td>Sokongan dan Ulasan Penasihat PERTEKMA</td>
											</tr>
											<tr>
												<td><br></td>
											</tr>
											<tr>
												<td>_________________________________________________________________________________
													_________________________________________________________________________________
													_________________________________________________________________________________
													_________________________________________________________________________________
													_________________________________________________________________________________
													_________________________________________________________________________________
													_________________________________________________________________________________
													_________________________________________________________________________________
												</td>
											</tr>
											<tr>
												<td><br><br><br></td>
											</tr>
											<tr>
												<td>......................................</td>
											</tr>
											<tr>
												<td>Nama:</td>
											</tr>
											<tr>
												<td>Tarikh:</td>
											</tr>
											<tr>
												<td>Cop Rasmi:</td>
											</tr>
											<tr>
												<td><br><br><br></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<table border="0" width="100%" cellspacing="0">
										<tbody>
											<tr>
												<td>Sokongan dan Ulasan Dekan Fakulti Sains Komputer dan Teknologi Maklumat</td>
											</tr>
											<tr>
												<td><br></td>
											</tr>
											<tr>
												<td>_________________________________________________________________________________
													_________________________________________________________________________________
													_________________________________________________________________________________
													_________________________________________________________________________________
													_________________________________________________________________________________
													_________________________________________________________________________________
													_________________________________________________________________________________
													_________________________________________________________________________________
												</td>
											</tr>
											<tr>
												<td><br><br><br></td>
											</tr>
											<tr>
												<td>......................................</td>
											</tr>
											<tr>
												<td>Nama:</td>
											</tr>
											<tr>
												<td>Tarikh:</td>
											</tr>
											<tr>
												<td>Cop Rasmi:</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End of Main Content -->
		</div>
		<!-- End of Content Wrapper -->
		</div>
	</div>
  <!-- End of Page Wrapper -->



 

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
<script>
window.onload= function(){
	setTimeout(function(){
		window.print();
		window.close();
	}, 1000);
};
</script>