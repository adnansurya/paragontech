<?php
    include("../koneksi.php");
    if($_POST['id_pinjam']) {
        $id_pinjam = $_POST['id_pinjam'];
        $query = mysqli_query($koneksi,"SELECT tbl_pinjam.id_pinjam, tbl_store.nama_store,
          tbl_pinjam.tgl_mulai, tbl_pinjam.tgl_akhir, tbl_pinjam.selesai, tbl_pinjam.keterangan
          FROM tbl_pinjam
          INNER JOIN tbl_store ON tbl_pinjam.id_store = tbl_store.id_store WHERE id_pinjam=".$id_pinjam);

          foreach ($query as $baris) {
            $nama_store = $baris['nama_store'];
            $tgl_mulai = $baris['tgl_mulai'];
            $tgl_akhir = $baris['tgl_akhir'];
            $selesai = $baris['selesai'];
            $keterangan = $baris['keterangan'];
              echo "<h3 id='namaStoreTxt'>".$nama_store."</h3>";
              echo "<h4 id='waktuTxt'>Waktu Peminjaman : ".$tgl_mulai." s.d. ".$tgl_akhir."</h4>";
            	echo "<h4 id='jumlahBarangTxt'></h4>";
              if($selesai == 0){
                	echo "<h4 id='statusTxt'>Status : Belum Dikembalikan </h4>";
              }else if ($selesai == 1) {
                	echo "<h4 id='statusTxt'>Status : Selesai </h4>";
                // code...
              }
              echo "<h5 id='keteranganTxt'>Keterangan : ".$keterangan."</h5>";

              echo "<br>";

          }

    }
  ?>






    <table id="tabelDetail" class="table table-bordered display nowrap responsive" width="100%" cellspacing="0">
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

        </tr>
      </thead>
      <tbody>
        <?php
          $tampil = mysqli_query($koneksi,"SELECT tbl_history.id_history, tbl_history.id_inventory,
              tbl_vendor.nama_vendor,tbl_warehouse.nama_warehouse, tbl_brand.nama_brand, tbl_fixture.nama_fixture,
              tbl_tipe.nama_tipe,tbl_inventory.running_number, tbl_inventory.kode_inventory,
              tbl_detail.nama_detail, tbl_inventory.thn_produksi, tbl_inventory.thn_demolish
             FROM tbl_history
             INNER JOIN tbl_inventory ON tbl_history.id_inventory = tbl_inventory.id_inventory
             INNER JOIN tbl_vendor ON tbl_inventory.id_vendor = tbl_vendor.id_vendor
             INNER JOIN tbl_warehouse ON tbl_inventory.id_warehouse = tbl_warehouse.id_warehouse
             INNER JOIN tbl_brand ON tbl_inventory.id_brand = tbl_brand.id_brand
             INNER JOIN tbl_fixture ON tbl_inventory.id_fixture = tbl_fixture.id_fixture
             INNER JOIN tbl_tipe ON tbl_inventory.id_tipe = tbl_tipe.id_tipe
             INNER JOIN tbl_detail ON tbl_inventory.id_detail = tbl_detail.id_detail WHERE id_pinjam = $id_pinjam");
          $no=1;
          while ($row = mysqli_fetch_array($tampil)){
            $id_history = $row['id_history'];
            $id_inventory= $row['id_inventory'];
            $nama_vendor = $row['nama_vendor'];
            $nama_warehouse = $row['nama_warehouse'];
            $nama_brand = $row['nama_brand'];
            $nama_fixture = $row['nama_fixture'];
            $nama_tipe = $row['nama_tipe'];
            $running_number = sprintf("%'03d", $row['running_number']);
            $kode_inventory = $row['kode_inventory'];
            $nama_detail = $row['nama_detail'];
            $thn_produksi = $row['thn_produksi'];
            $thn_demolish = $row['thn_demolish'];



            echo "<tr>
              <td>".$id_inventory."</td>
              <td>".$kode_inventory."</td>
              <td>".$running_number."</td>
              <td>".$nama_vendor."</td>
              <td>".$nama_warehouse."</td>
              <td>".$nama_brand."</td>
              <td>".$nama_fixture."</td>
              <td>".$nama_tipe."</td>
              <td>".$nama_detail."</td>
              <td>".$thn_produksi."</td>
              <td>".$thn_demolish."</td>
              </tr>";
            $no++;
          }
        ?>
      </tbody>
    </table>






    <div class="row">
      <div class="col-sm-offset-2 col-sm-8">
        <?php
            if($selesai == 0){
              echo   "<a href='#myModal' class='btn btn-primary btn-block' id='konfirmasiBtn' data-toggle='modal' data-id='".$id_pinjam."'>Konfirmasi Pengembalian</a>";
            }

        ?>
      </div>
    </div>



      <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Konfirmasi Pengembalian</h4>
                    </div>
                    <div class="modal-body">

                      <label>Keterangan</label>
                      <textarea id="keteranganTxt" class="form-control" rows="4" name="keteranganTxt" ><?php echo $keterangan; ?></textarea>
                      <h4>Apakah pengembalian barang telah selesai diproses?</h4>

                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" onclick="barangKembali(<?php echo $id_pinjam; ?>)"class="btn btn-success">Ya</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>


<script type="text/javascript">

var namaStore = $("#namaStoreTxt").val();
var waktu = $("#waktuTxt").val();
var jumlahBarang = $("#jumlahBarangTxt").val();
var status = $("#statusTxt").val();
var keterangan = $("#keteranganTxt").val();


var tabelDetail = $('#tabelDetail').DataTable( {

    "order": [[ 0, "desc" ]],
    "bInfo" : false,
  dom: 'flrtiBp',
    buttons: [

      {
              extend:   'copyHtml5',
             text:'<span class="fa fa-copy"></span>',"className": 'btn btn-info'
      },
      {
              extend: 'excelHtml5',
             title: 'Daftar Barang',
             text:'<span class="fa fa-file-excel-o"></span>',"className": 'btn btn-info',
               orientation: 'landscape'
      },
      {
              extend:    'csvHtml5',
             title: 'Daftar Barang',
             text:'<span class="fa fa-table"></span>',"className": 'btn btn-info'
      },
      {
              extend:    'pdfHtml5',
           title: 'Daftar Barang',
             text:'<span class="fa fa-file-pdf-o"></span>',"className": 'btn btn-info',
               orientation: 'landscape'
      },
      {
              extend:    'print',
         title: 'Daftar Barang',
             text:'<span class="fa fa-print"></span>',"className": 'btn btn-info',
               orientation: 'landscape'
      }
   ]



} );





function barangKembali(id_pinjam){
  	var keterangan =$('#keteranganTxt').val();

  $.ajax({
      type : 'post',
      url : 'pengembalian/update.php',
      data : {
          id_pinjam:id_pinjam,
          keterangan:keterangan


      },
      success : function(data){
        if(data=="Berhasil"){
            window.location.href = 'index.php';
        }else{
            alert(data);
        }


      }
  });
}


function jumlahItem(){
  var kolom = tabelDetail.page.info().recordsDisplay;
  if(kolom == 0){
      $('#jumlahBarangTxt').text('Jumlah Barang');
  }else{
    $('#jumlahBarangTxt').text('Jumlah Barang : ' + kolom + ' Item');
  }

}

jumlahItem();



</script>
