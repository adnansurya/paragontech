<?php
  include("../koneksi.php")
?>
<table id="tabelCari" class="table table-bordered display responsive nowrap" width="100%" cellspacing="0">
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
    <?php
      $tampil = mysqli_query($koneksi, "SELECT tbl_inventory.id_inventory, tbl_vendor.nama_vendor,
        tbl_warehouse.nama_warehouse, tbl_brand.nama_brand, tbl_fixture.nama_fixture, tbl_tipe.nama_tipe,
        tbl_inventory.running_number, tbl_inventory.kode_inventory,
        tbl_detail.nama_detail, tbl_inventory.thn_produksi, tbl_inventory.thn_demolish
        FROM tbl_inventory
        INNER JOIN tbl_vendor ON tbl_inventory.id_vendor = tbl_vendor.id_vendor
        INNER JOIN tbl_warehouse ON tbl_inventory.id_warehouse = tbl_warehouse.id_warehouse
        INNER JOIN tbl_brand ON tbl_inventory.id_brand = tbl_brand.id_brand
        INNER JOIN tbl_fixture ON tbl_inventory.id_fixture = tbl_fixture.id_fixture
        INNER JOIN tbl_tipe ON tbl_inventory.id_tipe = tbl_tipe.id_tipe
        INNER JOIN tbl_detail ON tbl_inventory.id_detail = tbl_detail.id_detail
        INNER JOIN tbl_status ON tbl_inventory.id_status = tbl_status.id_status WHERE tbl_status.id_status=1");
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
          <td>
            <button class='btn btn-success' onclick='addDaftar(".$id_inventory.")'>
            <i class='fa fa-plus'></i><span> Tambahkan</span></button>

          </td>
          </tr>";
        $no++;
      }
    ?>
  </tbody>
</table>

  
<script type="text/javascript">
var tabelCari = $('#tabelCari').DataTable( {

    "order": [[ 0, "desc" ]],
    "bInfo" : false,
    "columnDefs": [
            {
                "targets": [ 11 ],
                "visible": false,
                "searchable": false
            }
      ]

} );

var tabelDaftar = $('#tabelDaftar').DataTable( {

  "bInfo" : false
  ,"columnDefs": [ {
        "targets": -1,
        "data": null,
        "defaultContent": "<button  class='btn btn-danger btn-small'> <i class='fa fa-trash'></i></button>"
    } ]
  } );

tabelDaftar.on("click", "button", function () {
  var id_hapus = tabelDaftar.rows($(this).closest("tr")).data()[0][0];
  deleteDaftar(id_hapus);
});

function deleteDaftar(id_data){
    var rowId = $('#tabelDaftar').dataTable().fnFindCellRowIndexes(id_data, 0);
    var satuBarisDaftar = tabelDaftar.rows(rowId).data();
    tabelDaftar.row(rowId).remove().draw( true );
    tabelCari.rows.add(satuBarisDaftar).draw();
    jumlahItem();
}

function addDaftar(id_data) {

  var rowId = $('#tabelCari').dataTable().fnFindCellRowIndexes(id_data, 0);
  var satuBarisCari = tabelCari.rows(rowId).data(); //menyalin
  tabelCari.row(rowId).remove().draw( true );
  tabelDaftar.rows.add(satuBarisCari).draw();
  jumlahItem();

}

function jumlahItem(){
  var kolom = tabelDaftar.page.info().recordsDisplay;
  if(kolom == 0){
      $('#keranjangTxt').text('Daftar Barang');
  }else{
    $('#keranjangTxt').text('Daftar Barang : ' + kolom + ' Item');
  }

}


		$('#filterBtn').on('click', function () {
			var nama_vendor = $('#select_vendor').find(':selected').data('nama');
			var nama_warehouse = $('#select_warehouse').find(':selected').data('nama');
			var nama_brand = $('#select_brand').find(':selected').data('nama');
			var nama_fixture = $('#select_fixture').find(':selected').data('nama');
			var nama_tipe = $('#select_tipe').find(':selected').data('nama');
			var nama_detail = $('#select_detail').find(':selected').data('nama');
			var nama_status = $('#select_status').find(':selected').data('nama');


			tabelCari.column( 3 ).search(nama_vendor)
			.column( 4 ).search(nama_warehouse)
			.column( 5 ).search(nama_brand)
			.column( 6 ).search(nama_fixture)
			.column( 7 ).search(nama_tipe)
			.column( 8 ).search(nama_detail)

			.draw();


	 var kolom = tabelCari.page.info().recordsDisplay;

	 $('#panelTxt').text('Hasil Pencarian : ' + kolom + ' Stok Tersedia');


	});






</script>
