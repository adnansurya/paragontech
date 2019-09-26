<?php
	include("koneksi.php"); // memanggil file koneksi.php untuk koneksi ke database
?>
<!doctype html>
<html lang="en">

<head>
	<title>Inventory | Peminjaman</title>
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
	<script src="assets/vendor/jquery.ui/jquery-ui.min.js"></script>
  <script src="assets/vendor/jquery.tabledit/jquery.tabledit.min.js"></script>
  <script src="assets/vendor/jquery.chosen/chosen.jquery.min.js"></script>
	<script src="assets/vendor/jquery.dataTables/fnFindCellRowIndexes.js"></script>


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
				<a href="index.php"><img src="assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
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
              <h3 class="panel-title">Informasi Peminjaman</h3>
              <div class="right">
                  <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
              </div>
						</div>
						<div class="panel-body">
                        <label class="control-label col-md-2" for="select_store">Store :</label>
                        <div class="col-md-10">
                            <select id="select_store" class="form-control load_opsi">
															 <option value="" disabled selected hidden>Pilih Nama Store</option>
                                <?php
                                    $load = mysqli_query($koneksi, "SELECT * from tbl_store");
                                    while ($row = mysqli_fetch_array($load)){
                                        $id_store = $row['id_store'];
                                        $nama_store = $row['nama_store'];
                                        echo "<option data-nama='".$nama_store."' value='" . $id_store . "'>" . $nama_store . "</option>";
                                    }
                                ?>
                            </select>
                        </div>
												<div class="spacer"></div>
                        <label class="control-label col-sm-2" for="tgl_mulai">Tangggal Mulai :</label>
                        <div class="col-sm-10">
                            	<input id="tgl_mulai" type="text" class="form-control datepicker" placeholder="Masukkan Tanggal Awal Peminjaman">
                        </div>
												<div class="spacer"></div>
												<label class="control-label col-sm-2" for="tgl_akhir">Tangggal Akhir :</label>
												<div class="col-sm-10">
															<input id="tgl_akhir" type="text" class="form-control datepicker" placeholder="Masukkan Tanggal Akhir Peminjaman">
												</div>
												<div class="spacer"></div>
												<label class="control-label col-sm-2" for="keterangan">Keterangan :</label>
												<div class="col-sm-10">
													<textarea id="keterangan" placeholder="Masukkan informasi tambahan terkait dengan Peminjaman"name="keterangan" class="form-control" placeholder="textarea" rows="2"></textarea>

												</div>
							</div>
					</div>
					<div class="panel panel-headline">
						<div class="panel-heading">
								<h3 id="keranjangTxt" class="panel-title">Daftar Barang</h3>
								<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								</div>
						</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<table id="tabelDaftar" class="table table-bordered display responsive" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>No</th>
											<th>Kode</th>
											<th>Running Number</th>
											<th>Vendor</th>
											<th>Warehouse</th>
											<th>Brand</th>
											<th>Fixture</th>
											<th>Tipe</th>
											<th>Detail</th>
											<th>Tahun Produksi</th>
											<th>Tahun Demolish</th>
											<th>Action</th>


										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>


						</div>



					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-sm-offset-2 col-sm-8">
								<button id="konfirmasiBtn" class="btn btn-primary btn-block" >Konfirmasi Peminjaman</button>
							</div>
						</div>

					</div>
				</div>
					<div class="row">
						<div class="col-md-4">
							<div class="panel">
								<div class="panel-heading">
		              <h3 class="panel-title">Filter</h3>
		              <div class="right">
		                  <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
		              </div>
								</div>
								<div class="panel-body">
                  <label class="control-label" for="select_vendor">Vendor :</label>
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
                  <label class="control-label" for="select_warehouse">Warehouse :</label>
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
                  <label class="control-label" for="select_brand">Brand :</label>
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
                  <label class="control-label" for="select_fixture">Fixture :</label>
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
                  <label class="control-label" for="select_tipe">Tipe :</label>
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
                  <label class="control-label" for="select_detail">Detail :</label>
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

									<div class="spacer"></div>

                  	<button id="filterBtn" class="btn btn-primary btn-block" > Cari</button>


									</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="panel">
								<div class="panel-heading">
		              <h3 id="panelTxt" class="panel-title">Hasil Pencarian</h3>
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
	<div class="modal fade" id="cariModal" role="dialog">
	      <div class="modal-dialog" role="document">
	          <div class="modal-content">
	              <div class="modal-header">
	                  <button type="button" class="close" data-dismiss="modal">&times;</button>
	                  <h4 class="modal-title">Pencarian Inventory</h4>
	              </div>
	              <div class="modal-body">


	              </div>
	              <div class="modal-footer">
	                  <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
	              </div>
	          </div>
	      </div>
	  </div>

	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script>

	$(document).ready(function() {
				$('.load_opsi').chosen();
				$('.tampildata').load("peminjaman/read.php");
				document.getElementById("judulHalaman").innerHTML = "&emsp;Inventory | Peminjaman";
				$( "#tgl_mulai" ).datepicker({
					dateFormat: "dd-mm-yy",
				});
				$( "#tgl_akhir" ).datepicker({
					dateFormat: "dd-mm-yy",

				});


	} );

	$('#konfirmasiBtn').on('click', function () {

		 var kolom = tabelDaftar.page.info().recordsDisplay;

		 if(kolom == 0){
			 alert("Daftar Barang Masih Kosong");
		 }else{
			 var id_store=$("#select_store").val();
	 		var tgl_mulai = $('#tgl_mulai').val();
	 		var tgl_akhir =$('#tgl_akhir').val();
	 		var keterangan =$('#keterangan').val();

			if(id_store != null && tgl_mulai != "" && tgl_akhir != "" ){
				var idDaftar = [];
				tabelDaftar.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
						var data = this.data()[0];
			// ... do something with data(), or this.node(), etc
						idDaftar.push(data);
				} );

				$.ajax({
						type : 'POST',
						url : 'peminjaman/insert.php',
						data : {
								id_store:id_store,
								tgl_mulai:tgl_mulai,
								tgl_akhir:tgl_akhir,
								keterangan:keterangan,
								daftar_barang:JSON.stringify(idDaftar)
						},
						success : function(data){

							if(data=="Berhasil"){
									window.location.href = 'pinjam.php';
							}else{
									alert(data);
							}


						}
				});

			}else {
				alert("Mohon Lengkapi Informasi Peminjaman")
			}



		 }

	});







	</script>
</body>

</html>
