<?php
include("../koneksi.php");
function formatTgl($tanggal){
  $a = explode('-',$tanggal);
  $my_new_date = $a[2].'-'.$a[1].'-'.$a[0];
  return $my_new_date;
}
// melakukan pengecekan koneksi

  if($_POST['action'] == 'edit') {
    $id_pinjam = $_POST['id_pinjam'];
    $store = $_POST['store'];
    $tgl_mulai = formatTgl($_POST['tgl_mulai']);
    $tgl_akhir = formatTgl($_POST['tgl_akhir']);
    $keterangan = $_POST['keterangan'];



    //perintah untuk melakukan update
    //melakukan update data berdasarkan ID
    $sql = "UPDATE tbl_pinjam SET id_store = '$store', tgl_mulai = '$tgl_mulai', tgl_akhir = '$tgl_akhir',
      keterangan = '$keterangan' WHERE id_pinjam=$id_pinjam";
    $result = mysqli_query($koneksi,$sql);
  }else if($_POST['action'] == 'delete') {
      $id_pinjam = $_POST['id_pinjam'];


    $query = mysqli_query($koneksi,"SELECT * FROM tbl_history WHERE id_pinjam = ".$id_pinjam);
    foreach ($query as $baris) {
      $id_inventory = $baris['id_inventory'];
        $result =   mysqli_query($koneksi,"UPDATE tbl_inventory SET id_status = 1 WHERE id_inventory=".$id_inventory);

    }

      $result = mysqli_query($koneksi,"DELETE from tbl_history WHERE id_pinjam='" . $_POST['id_pinjam'] . "'");
      $result = mysqli_query($koneksi,"DELETE from tbl_pinjam WHERE id_pinjam='" . $_POST['id_pinjam'] . "'");
  }
    //menangkap parameter yang dikirimkan dari detail.php



    if ($result === TRUE) {
        //jika  berhasil tampil ini
        header('Location: ../data_pinjam.php');
    } else {
        // jika gagal tampil ini
        echo "Gagal Melakukan Perubahan: ";
    }




?>
