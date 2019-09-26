<?php
  include("../koneksi.php");

  function formatTgl($tanggal){
    $a = explode('-',$tanggal);
    $my_new_date = $a[2].'-'.$a[1].'-'.$a[0];
    return $my_new_date;
  }
?>

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
            <button class='btn btn-default' onclick='tampilDetail(".$id_pinjam.")'>
            <i class='fa fa-list'></i><span> Detail</span></button>

          </td>
          </tr>";
        $no++;
      }
    ?>
  </tbody>
</table>


<script type="text/javascript">

var tabelPinjam = $('#tabelPinjam').DataTable( {

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
             title: 'Data Pinjam',
             text:'<span class="fa fa-file-excel-o"></span>',"className": 'btn btn-info'
      },
      {
              extend:    'csvHtml5',
              title: 'Data Pinjam',
             text:'<span class="fa fa-table"></span>',"className": 'btn btn-info'
      },
      {
              extend:    'pdfHtml5',
              title: 'Data Pinjam',
             text:'<span class="fa fa-file-pdf-o"></span>',"className": 'btn btn-info'
      },
      {
              extend:    'print',
              title: 'Data Pinjam',
             text:'<span class="fa fa-print"></span>',"className": 'btn btn-info'
      }
   ]



} );




function tampilDetail(id_pinjam){
  	$('#detailView').css('display','block');

  $.ajax({
      type : 'post',
      url : 'pengembalian/detail.php',
      data :  'id_pinjam='+ id_pinjam,
      success : function(data){
      $('.detail-data').html(data);//menampilkan data ke dalam modal

      }
  });
}

function jumlahItem(){
  var kolom = tabelPinjam.page.info().recordsDisplay;
  if(kolom == 0){
      $('#pinjamTxt').text('Daftar Barang');
  }else{
    $('#pinjamTxt').text('Daftar Barang : ' + kolom + ' Item');
  }

}



</script>
