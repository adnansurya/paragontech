<?php
  include("../koneksi.php");
?>
<table id="tabel" class="table table-bordered display responsive nowrap" width="100%" cellspacing="0">
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
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $tampil = mysqli_query($koneksi, "SELECT tbl_inventory.id_inventory, tbl_vendor.nama_vendor,
        tbl_warehouse.nama_warehouse, tbl_brand.nama_brand, tbl_fixture.nama_fixture, tbl_tipe.nama_tipe,
        tbl_inventory.running_number, tbl_inventory.kode_inventory,
        tbl_detail.nama_detail, tbl_inventory.thn_produksi, tbl_inventory.thn_demolish, tbl_status.nama_status
        FROM tbl_inventory
        INNER JOIN tbl_vendor ON tbl_inventory.id_vendor = tbl_vendor.id_vendor
        INNER JOIN tbl_warehouse ON tbl_inventory.id_warehouse = tbl_warehouse.id_warehouse
        INNER JOIN tbl_brand ON tbl_inventory.id_brand = tbl_brand.id_brand
        INNER JOIN tbl_fixture ON tbl_inventory.id_fixture = tbl_fixture.id_fixture
        INNER JOIN tbl_tipe ON tbl_inventory.id_tipe = tbl_tipe.id_tipe
        INNER JOIN tbl_detail ON tbl_inventory.id_detail = tbl_detail.id_detail
        INNER JOIN tbl_status ON tbl_inventory.id_status = tbl_status.id_status");
      $no=1;
      while ($row = mysqli_fetch_array($tampil)){
        $id_inventory = $row['id_inventory'];
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
        $nama_status = $row['nama_status'];

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
          <td>".$nama_status."</td>
          <td>
            <a href='#editModal' class='btn btn-info btn-small' id='editId' data-toggle='modal' data-id=".$id_inventory.">Edit</a>
            <a href='#hapusModal' class='btn btn-danger btn-small' id='hapusId' data-toggle='modal' data-id=".$id_inventory.">Hapus</a>
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
<script type="text/javascript">
  $('#tabel').DataTable( {

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
             title: 'Data Inventory',
             text:'<span class="fa fa-file-excel-o"></span>',"className": 'btn btn-info',
               orientation: 'landscape'
      },
      {
              extend:    'csvHtml5',
               title: 'Data Inventory',
             text:'<span class="fa fa-table"></span>',"className": 'btn btn-info'
      },
      {
              extend:    'pdfHtml5',
               title: 'Data Inventory',
             text:'<span class="fa fa-file-pdf-o"></span>',"className": 'btn btn-info',
               orientation: 'landscape'
      },
      {
              extend:    'print',
             title: 'Data Inventory',
             text:'<span class="fa fa-print"></span>',"className": 'btn btn-info',
               orientation: 'landscape'
      }
   ]

} );


    $('#editModal').on('show.bs.modal', function (e) {


        var id_inventory = $(e.relatedTarget).data('id');

        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : 'post',
            url : 'inventory/edit.php',
            data :  'id_inventory='+ id_inventory,
            success : function(data){
            $('.fetched-data-edit').html(data);//menampilkan data ke dalam modal

            }
        });

     });

     $('#hapusModal').on('show.bs.modal', function (e) {


         var id_inventory = $(e.relatedTarget).data('id');

         //menggunakan fungsi ajax untuk pengambilan data
         $.ajax({
             type : 'post',
             url : 'inventory/delete.php',
             data :  'id_inventory='+ id_inventory,
             success : function(data){
             $('.fetched-data').html(data);//menampilkan data ke dalam modal

             }
         });

      });


</script>
