<?php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
<!doctype html>
<html lang="en">

<head>
	<title>Data | Store</title>
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
	<link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
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
	<script src="assets/vendor/jquery.tabledit/jquery.tabledit.min.js"></script>


	<script>

	$(document).ready(function() {
		$('#tabel').DataTable();
		document.getElementById("judulHalaman").innerHTML = "&emsp;Data | Store";
	} );


	</script>
</head>

<body>
	<!-- WRAPPER -->
	<div class="toastr" data-context="info" data-message="This is general theme info bro " data-position="top-right"></div>
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>



		</nav>
		<!-- END NAVBAR -->
		<?php include ("navigation.php"); ?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel">
                            <div class="panel-heading">
									<h3 class="panel-title">Tambah Store</h3>
									<div class="right">
                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>

                            </div>
								</div>
								<div class="panel-body">

										<?php
										if(isset($_POST['tambah'])){
											$nama_store = $_POST['input_nama_store'];

											$result = mysqli_query($koneksi, "INSERT INTO tbl_store(nama_store) VALUES('$nama_store')") or die(mysqli_error()); // query untuk menambahkan data ke dala



										}
										?>


										<form action="" method="POST">

												<div class="input-group">
														<input name="input_nama_store" class="form-control" type="text" placeholder="Nama Store" required>
														<span class="input-group-btn">

														<input type="submit" name="tambah" class="btn btn-primary" value="Tambahkan">
														</span>
												</div>

										</form>


								</div>
					</div>

                    <div class="panel">
                        <div class="panel-heading">
                            <h3 id="test" class="panel-title">Store Terdaftar</h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>

                            </div>
                        </div>
                        <div class="panel-body">
							<table id="tabel" class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Store</th>


									</tr>
								</thead>
								<tbody>
									<?php

										$tampil = mysqli_query($koneksi, "SELECT * from tbl_store");
										$no=1;
										while ($row = mysqli_fetch_array($tampil))
										{
											$id_store = $row['id_store'];
											$nama_store = $row['nama_store'];

											echo "<tr>
												<td>".$id_store."</td>
												<td>".$nama_store."</td>
												</tr>";
											$no++;
										}
									?>








                                </tbody>
                            </table>
						</div>


                    </div>
                    <!-- END RECENT PURCHASES -->

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
		$('#tabel').Tabledit({
			url: 'table_edit/tbl_store.php',
			restoreButton: false,
			columns: {
				identifier: [0, 'id_store'],
				editable: [[1, 'nama_store']]
			},
			onDraw: function() {
				console.log('onDraw()');
			},
			onSuccess: function(data, textStatus, jqXHR) {
				console.log('onSuccess(data, textStatus, jqXHR)');
				console.log(data);
				console.log(textStatus);
				console.log(jqXHR);
			},
			onFail: function(jqXHR, textStatus, errorThrown) {
				console.log('onFail(jqXHR, textStatus, errorThrown)');
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			},
			onAlways: function() {
				console.log('onAlways()');
			},
			onAjax: function(action, serialize) {
				console.log('onAjax(action, serialize)');
				console.log(action);
				console.log(serialize);
			}
		});

	</script>

</body>

</html>
