<?php
	include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
<!doctype html>
<html lang="en">

<head>
	<title>Inventory | Pencarian</title>
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
	  <!-- <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css"> -->
	  <link rel="stylesheet" href="assets/css/responsive.dataTables.min.css">
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
  <script src="assets/vendor/jquery.tabledit/jquery.tabledit.min.js"></script>
  <script src="assets/vendor/jquery.chosen/chosen.jquery.min.js"></script>

<style type="text/css">
	.spacer { margin:0; padding:0; height:50px; }
</style>

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
			</div>

		</nav>
		<!-- END NAVBAR -->
		<?php include ("navigation.php"); ?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-headline">
            <div class="panel-heading">
              <h3 class="panel-title">Filter Pencarian</h3>
              <div class="right">
                  <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
              </div>
						</div>
						<div class="panel-body">

                        <label class="control-label col-sm-2" for="select_vendor">Vendor :</label>
                        <div class="col-sm-10">
                            <select id="select_vendor" class="form-control load_opsi">
															<option data-nama="" value="">Semua Vendor</option>
                                <?php
                                    $load = mysqli_query($koneksi, "SELECT * from tbl_vendor");
                                    while ($row = mysqli_fetch_array($load)){
                                        $id_vendor = $row['id_vendor'];
                                        $nama_vendor = $row['nama_vendor'];
                                        echo "<option data-nama='".$nama_vendor."' value='" . $id_vendor . "'>" . $nama_vendor . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
												<div class="spacer"></div>
                        <label class="control-label col-sm-2" for="select_warehouse">Warehouse :</label>
                        <div class="col-sm-10">
                            <select id="select_warehouse" class="form-control load_opsi">
															<option data-nama="" value="">Semua Warehouse</option>
                                <?php
                                    $load = mysqli_query($koneksi, "SELECT * from tbl_warehouse");
                                    while ($row = mysqli_fetch_array($load)){
                                        $id_warehouse = $row['id_warehouse'];
                                        $nama_warehouse = $row['nama_warehouse'];
                                        echo "<option data-nama='".$nama_warehouse."' value='" . $id_warehouse . "'>" . $nama_warehouse . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
												<div class="spacer"></div>
                        <label class="control-label col-sm-2" for="select_brand">Brand :</label>
                        <div class="col-sm-10">
                            <select id="select_brand" class="form-control load_opsi">
															<option data-nama="" value="">Semua Brand</option>
                                <?php
                                    $load = mysqli_query($koneksi, "SELECT * from tbl_brand");
                                    while ($row = mysqli_fetch_array($load)){
                                        $id_brand = $row['id_brand'];
                                        $nama_brand = $row['nama_brand'];
																				$kode_brand = $row['kode_brand'];
                                        echo "<option data-kode='".$kode_brand."' data-nama='".$nama_brand."' value='" . $id_brand . "'>" . $nama_brand . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
												<div class="spacer"></div>
                        <label class="control-label col-sm-2" for="select_fixture">Fixture :</label>
                        <div class="col-sm-10">
                            <select id="select_fixture" class="form-control load_opsi">
															<option data-nama="" value="">Semua Fixture</option>
                                <?php
                                    $load = mysqli_query($koneksi, "SELECT * from tbl_fixture");
                                    while ($row = mysqli_fetch_array($load)){
                                        $id_fixture = $row['id_fixture'];
                                        $nama_fixture = $row['nama_fixture'];
																				$kode_fixture = $row['kode_fixture'];
                                        echo "<option data-kode='".$kode_fixture."' data-nama='".$nama_fixture."' value='" . $id_fixture . "'>" . $nama_fixture . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
												<div class="spacer"></div>
                        <label class="control-label col-sm-2" for="select_tipe">Tipe :</label>
                        <div class="col-sm-10">
                            <select id="select_tipe" class="form-control load_opsi">
															<option data-nama="" value="">Semua Tipe</option>
                                <?php
                                    $load = mysqli_query($koneksi, "SELECT * from tbl_tipe");
                                    while ($row = mysqli_fetch_array($load)){
                                        $id_tipe = $row['id_tipe'];
                                        $nama_tipe = $row['nama_tipe'];
																				$kode_tipe = $row['kode_tipe'];
																				echo "<option data-kode='".$kode_tipe."' data-nama='".$nama_tipe."' value='" . $id_tipe . "'>" . $nama_tipe . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
												<div class="spacer"></div>
                        <label class="control-label col-sm-2" for="select_detail">Detail :</label>
                        <div class="col-sm-10">
                            <select id="select_detail" class="form-control load_opsi">
															<option data-nama="" value="">Semua Detail</option>
                                <?php
                                    $load = mysqli_query($koneksi, "SELECT * from tbl_detail");
                                    while ($row = mysqli_fetch_array($load)){
                                        $id_detail = $row['id_detail'];
                                        $nama_detail = $row['nama_detail'];
                                        echo "<option data-nama='".$nama_detail."' value='" . $id_detail . "'>" . $nama_detail . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
												<div class="spacer"></div>
                        <label class="control-label col-sm-2" for="select_status">Status :</label>
                        <div class="col-sm-10">
                            <select id="select_status" class="form-control load_opsi">
															<option data-nama="" value="">Semua Status</option>
                                <?php
                                    $load = mysqli_query($koneksi, "SELECT * from tbl_status");
                                    while ($row = mysqli_fetch_array($load)){
                                        $id_status = $row['id_status'];
                                        $nama_status= $row['nama_status'];
                                        echo "<option data-nama='".$nama_status."' value='" . $id_status . "'>" . $nama_status . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
												<div class="spacer"></div>
                        <div class="col-sm-offset-2 col-sm-10">
                        	<button id="cariBtn" class="btn btn-primary" > Cari</button>

                        </div>
							</div>
					</div>
					<div id="stok" style="display:none" class="row">
						<div class="col-md-12">
							<div class="panel">
									<div class="panel-heading">
										<h3 class="panel-title">Tambah Stok</h3>
										<div class="right">
												<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										</div>
									</div>
									<div class="panel-body">
										<input id="thn_produksiTxt" type="text" class="form-control" placeholder="Tahun Produksi">
										<br>
										<input id="thn_demolishTxt" type="text" class="form-control" placeholder="Tahun Demolish">

										<br>
										<div class="input-group">
										<input id="jumlahTxt" type="number" class="form-control" placeholder="Jumlah" min="1" max="999">
										<span class="input-group-btn"><button id="tambahBtn" class="btn btn-success" type="button">Tambahkan</button></span>

									</div>

									</div>
							</div>
						</div>

					</div>

            <div class="panel panel-headline">
              <div class="panel-heading">
                  <h3 id="panelTxt" class="panel-title">Inventory Terdaftar</h3>
                  <div class="right">
                      <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                  </div>
          		</div>
            <div class="panel-body">
							<div class="tampildata"></div>
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
				$('.load_opsi').chosen();
				$('.tampildata').load("inventory/read.php");
					document.getElementById("judulHalaman").innerHTML = "&emsp;Inventory | Pencarian";
	} );



		$("#tambahBtn").click(function(){
        var id_vendor=$("#select_vendor").val();
        var id_warehouse=$("#select_warehouse").val();
				var id_brand=$("#select_brand").val();
				var id_fixture=$("#select_fixture").val();
				var id_tipe=$("#select_tipe").val();
				var id_detail=$("#select_detail").val();
				var jumlah = $('#jumlahTxt').val();
				var thn_produksi =$('#thn_produksiTxt').val();
				var thn_demolish =$('#thn_demolishTxt').val();

				var kode_brand = $('#select_brand').find(':selected').data('kode');
				var kode_fixture = $('#select_fixture').find(':selected').data('kode');
				var kode_tipe = $('#select_tipe').find(':selected').data('kode');

        $.ajax({
            url:'inventory/insert.php',
            method:'POST',
            data:{
                id_vendor:id_vendor,
                id_warehouse:id_warehouse,
								id_brand:id_brand,
								id_fixture:id_fixture,
								id_tipe:id_tipe,
								id_detail:id_detail,
								jumlah:jumlah,
								thn_produksi:thn_produksi,
								thn_demolish:thn_demolish,
								kode_brand:kode_brand,
								kode_fixture:kode_fixture,
								kode_tipe:kode_tipe
            },	success: function() {
								$('.tampildata').load("inventory/read.php");
						}
        });
    });


		$('#cariBtn').on('click', function () {
			var nama_vendor = $('#select_vendor').find(':selected').data('nama');
			var nama_warehouse = $('#select_warehouse').find(':selected').data('nama');
			var nama_brand = $('#select_brand').find(':selected').data('nama');
			var nama_fixture = $('#select_fixture').find(':selected').data('nama');
			var nama_tipe = $('#select_tipe').find(':selected').data('nama');
			var nama_detail = $('#select_detail').find(':selected').data('nama');
			var nama_status = $('#select_status').find(':selected').data('nama');

			var tabel = $('#tabel').DataTable();
			tabel.column( 3 ).search(nama_vendor)
			.column( 4 ).search(nama_warehouse)
			.column( 5 ).search(nama_brand)
			.column( 6 ).search(nama_fixture)
			.column( 7 ).search(nama_tipe)
			.column( 8 ).search(nama_detail)
			.column( 11 ).search(nama_status)
			.draw();
	 var kolom = tabel.page.info().recordsDisplay;


	 $('#panelTxt').text('Hasil Pencarian : ' + kolom + ' Stok Tersedia');

	 if(nama_vendor != "" && nama_warehouse != "" && nama_brand != "" &&
 				nama_fixture != "" && nama_tipe != "" && nama_detail != ""){
							$('#stok').css('display','block');
	}else {
						$('#stok').css('display','none');

	}
		});
	</script>
</body>

</html>
