<?php

  include("../koneksi.php");



  $id_store = $_POST['id_store'];
  $tgl_mulai = formatTgl($_POST['tgl_mulai']);
  $tgl_akhir = formatTgl($_POST['tgl_akhir']);
  $keterangan = $_POST['keterangan'];
  $daftar_barang=json_decode($_POST['daftar_barang']);
  $selesai=0;

  $result = mysqli_query($koneksi, "INSERT INTO tbl_pinjam(id_store, tgl_mulai, tgl_akhir,selesai, keterangan) VALUES('$id_store','$tgl_mulai','$tgl_akhir','$selesai','$keterangan')") or die(mysqli_error()); // quer
  $id_pinjam = mysqli_insert_id($koneksi);

  for($x=0; $x < count($daftar_barang); $x++){
    $id_inventory = $daftar_barang[$x];
    $result1 = mysqli_query($koneksi, "INSERT INTO tbl_history(id_pinjam, id_inventory) VALUES('$id_pinjam','$id_inventory')") or die(mysqli_error()); // query untuk menambahkan data ke dalam
    $result2 = mysqli_query($koneksi, "UPDATE tbl_inventory SET id_status = 2 WHERE id_inventory='" . $id_inventory. "'") or die(mysqli_error());
    if($result1 == false || $result2 == false){
      echo "Tidak ";
      break;
    }
  }




  function formatTgl($tanggal){
    $a = explode('-',$tanggal);
    $my_new_date = $a[2].'-'.$a[1].'-'.$a[0];
    return $my_new_date;
  }

  echo "Berhasil";



 ?>
