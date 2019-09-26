<!doctype html>
<html lang="en">

<head>
	<title>Data | Pinjam</title>
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
		<?php
			include ("navigation.php");
		  include("koneksi.php");


		  function formatTgl($tanggal){
		    $a = explode('-',$tanggal);
		    $my_new_date = $a[2].'-'.$a[1].'-'.$a[0];
		    return $my_new_date;
		  }
		?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
								<h3 id="pinjamTxt" class="panel-title">Data Pinjam</h3>
								<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								</div>
						</div>
						<div class="panel-body">
							<table id="tabelPinjam" class="table table-bordered display responsive" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Store</th>
										<th>Tgl. Mulai</th>
										<th>Tgl. Akhir</th>
										<th>Status</th>
										<th>Keterangan</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$tampil = mysqli_query($koneksi, "SELECT tbl_pinjam.id_pinjam, tbl_store.nama_store,
											tbl_pinjam.tgl_mulai, tbl_pinjam.tgl_akhir, tbl_pinjam.selesai, tbl_pinjam.keterangan
											FROM tbl_pinjam
											INNER JOIN tbl_store ON tbl_pinjam.id_store = tbl_store.id_store");
										$no=1;
										while ($row = mysqli_fetch_array($tampil)){
											$id_pinjam = $row['id_pinjam'];
											$nama_store = $row['nama_store'];
											$tgl_mulai = $row['tgl_mulai'];
											$tgl_akhir = $row['tgl_akhir'];
											$selesai = $row['selesai'];
											$keterangan = $row['keterangan'];


											echo "<tr>
												<td>".$id_pinjam."</td>
												<td>".$nama_store."</td>
												<td>".formatTgl($tgl_mulai)."</td>
												<td>".formatTgl($tgl_akhir)."</td>";

											if($selesai == 0){
													echo  "<td><span class='label label-danger'>BELUM DIKEMBALIKAN</span></td>";
											}else if ($selesai == 1) {
													echo  "<td><span class='label label-success'>SELESAI</span></td>";
												// code...
											}
											echo "<td>".$keterangan."</td>


												<td>


													  <a href='#editModal' class='btn btn-info btn-small' id='editId' data-toggle='modal' data-id=".$id_pinjam.">Edit</a>
														  <a href='#hapusModal' class='btn btn-danger btn-small' id='hapusId' data-toggle='modal' data-id=".$id_pinjam.">Hapus</a>

												</td>
												</tr>";
											$no++;
										}
									?>
								</tbody>
							</table>
							<div class="modal fade" id="editModal" role="dialog">
							      <div class="modal-dialog" role="document">
							          <div class="modal-content">
							              <div class="modal-header">
							                  <button type="button" class="close" data-dismiss="modal">&times;</button>
							                  <h4 class="modal-title">Detail Inventory</h4>
							              </div>
							              <div class="modal-body">
							                  <div class="fetched-data-edit"></div>
							              </div>
							              <div class="modal-footer">
							                  <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
							              </div>
							          </div>
							      </div>
							  </div>
							  <div class="modal fade" id="hapusModal" role="dialog">
							        <div class="modal-dialog" role="document">
							            <div class="modal-content">
							                <div class="modal-header">
							                    <button type="button" class="close" data-dismiss="modal">&times;</button>
							                    <h4 class="modal-title">Hapus Data</h4>
							                </div>
							                <div class="modal-body">
							                    <div class="fetched-data"></div>
							                </div>
							                <div class="modal-footer">
							                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
							                </div>
							            </div>
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
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script>
	$(document).ready(function() {


				document.getElementById("judulHalaman").innerHTML = "&emsp;Data | Pinjam";

				var tabelPinjam = $('#tabelPinjam').DataTable( {

				    "order": [[ 0, "desc" ]],
				    "bInfo" : false

				} );
				$('#editModal').on('show.bs.modal', function (e) {


		        var id_pinjam = $(e.relatedTarget).data('id');

		        //menggunakan fungsi ajax untuk pengambilan data
		        $.ajax({
		            type : 'post',
		            url : 'peminjaman/edit.php',
		            data :  'id_pinjam='+ id_pinjam,
		            success : function(data){
		            $('.fetched-data-edit').html(data);//menampilkan data ke dalam modal

		            }
		        });

		     });

		     $('#hapusModal').on('show.bs.modal', function (e) {


		         var id_pinjam = $(e.relatedTarget).data('id');

		         //menggunakan fungsi ajax untuk pengambilan data
		         $.ajax({
		             type : 'post',
		             url : 'peminjaman/delete.php',
		             data :  'id_pinjam='+ id_pinjam,
		             success : function(data){
		             $('.fetched-data').html(data);//menampilkan data ke dalam modal

		             }
		         });

		      });




	} );
	</script>
</body>

</html>
