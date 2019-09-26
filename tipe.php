<?php
include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
<!doctype html>
<html lang="en">

<head>
	<title>Data | Tipe</title>
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
			document.getElementById("judulHalaman").innerHTML = "&emsp;Data | Tipe";
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
		<!-- END NAVBAR -->
		<?php include ("navigation.php"); ?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel">
                        <div class="panel-heading">
								<h3 class="panel-title">Tambah Tipe</h3>
								<div class="right">
                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>

                            </div>
                        </div>
                            <div class="panel-body">
							<form class="form-horizontal" action="" method="POST">
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="input_nama_tipe">Nama Tipe :</label>
                                    <div class="col-sm-10">
                                    <input id="input_nama_tipe" name="input_nama_tipe" class="form-control" type="text" placeholder="Masukkan Nama Tipe" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="input_kode_tipe">Kode Tipe :</label>
                                    <div class="col-sm-10">
                                    <input id="input_kode_tipe" name="input_kode_tipe" class="form-control" type="text" placeholder="Masukkan Kode Tipe" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" name="tambah" class="btn btn-primary" value="Tambahkan">
                                    </div>
                                </div>
                            </form>

                                <?php
                                if(isset($_POST['tambah'])){
                                    $nama_tipe = $_POST['input_nama_tipe'];
                                    $kode_tipe = $_POST['input_kode_tipe'];

                                    $result = mysqli_query($koneksi, "INSERT INTO tbl_tipe(nama_tipe, kode_tipe) VALUES('$nama_tipe','$kode_tipe')") or die(mysqli_error()); // query untuk menambahkan data ke dala

                                }
                                ?>


                        </div>
                    </div><!-- RECENT PURCHASES -->
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 id="test" class="panel-title">Tipe Terdaftar</h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>

                            </div>
                        </div>
                        <div class="panel-body">
							<table id="tabel" class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
                                        <th>Nama Tipe</th>
                                        <th>Kode Tipe</th>

									</tr>
								</thead>
								<tbody>
									<?php

										$tampil = mysqli_query($koneksi, "SELECT * from tbl_tipe");
										$no=1;
										while ($row = mysqli_fetch_array($tampil))
										{
											$id_tipe = $row['id_tipe'];
                                            $nama_tipe = $row['nama_tipe'];
                                            $kode_tipe = $row['kode_tipe'];

											echo "<tr>
												<td>".$id_tipe."</td>
                                                <td>".$nama_tipe."</td>
                                                <td>".$kode_tipe."</td>
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
			url: 'table_edit/tbl_tipe.php',
            restoreButton: false,
			columns: {
				identifier: [0, 'id_tipe'],
				editable: [[1, 'nama_tipe'], [2, 'kode_tipe']]
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
