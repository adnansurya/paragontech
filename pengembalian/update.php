<?php
include("../koneksi.php");

// melakukan pengecekan koneksi

  if($_POST['id_pinjam']) {
    $id_pinjam = $_POST['id_pinjam'];
    $keterangan = $_POST['keterangan'];


    $query = mysqli_query($koneksi, "SELECT * from tbl_history WHERE id_pinjam='$id_pinjam'");
    foreach ($query as $barang) {
        $result = mysqli_query($koneksi, "UPDATE tbl_inventory SET id_status = 1 WHERE id_inventory='" . $barang['id_inventory']. "'") or die(mysqli_error());
        if($result == false){
          echo "Tidak ";
          break;
        }
    }

    $result2 = mysqli_query($koneksi, "UPDATE tbl_pinjam SET selesai = 1, keterangan='$keterangan' WHERE id_pinjam='" . $id_pinjam. "'") or die(mysqli_error());

    echo "Berhasil";



  }    else{

        echo "Terjadi Kesalahan";
  }


?>
