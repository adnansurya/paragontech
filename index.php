<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Paragon Technology and Innovation</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/jquery-ui.min.css">
		<link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
	  <!-- <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css"> -->
	  <link rel="stylesheet" href="assets/css/responsive.dataTables.min.css">
		<!-- <link rel="stylesheet" href="assets/css/buttons.dataTables.min.css"> -->
    <link rel="stylesheet" href="assets/css/bootstrap-chosen.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script src="assets/vendor/jquery.dataTables/jquery.dataTables.min.js"></script>
	<script src="assets/vendor/jquery.dataTables/dataTables.bootstrap.min.js"></script>
	<script src="assets/vendor/jquery.dataTables/dataTables.responsive.min.js"></script>
	<script src="assets/vendor/jquery.dataTables/dataTables.buttons.min.js"></script>
	<script src="assets/vendor/export/buttons.flash.min.js"></script>
	<script src="assets/vendor/export/jszip.min.js"></script>
	<script src="assets/vendor/export/pdfmake.min.js"></script>
	<script src="assets/vendor/export/vfs_fonts.js"></script>
	<script src="assets/vendor/export/buttons.html5.min.js"></script>
	<script src="assets/vendor/export/buttons.print.min.js"></script>
	<script src="assets/vendor/jquery.ui/jquery-ui.min.js"></script>
	<script src="assets/vendor/jquery.tabledit/jquery.tabledit.min.js"></script>
	<script src="assets/vendor/jquery.chosen/chosen.jquery.min.js"></script>
	<script src="assets/vendor/jquery.dataTables/fnFindCellRowIndexes.js"></script>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->

		<!-- END NAVBAR -->
		<?php include ("navigation.php"); ?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
								<h3 id="pinjamTxt" class="panel-title">Daftar Pinjam</h3>
								<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								</div>
						</div>
						<div class="panel-body">
								<div class="tampildata"></div>
						</div>

				</div>
				<div id="detailView" style="display:none">
					<div class="panel panel">





						<div class="panel-body">

								<div class="detail-data"></div>
						</div>

					</div>
			</div>

				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script>
	$(document).ready(function() {

				$('.tampildata').load("pengembalian/read.php");
				document.getElementById("judulHalaman").innerHTML = "&emsp;Dashboard (Pengembalian)";




	} );
	</script>
</body>

</html>
