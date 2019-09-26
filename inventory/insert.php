<?php

include("../koneksi.php");

$id_vendor = $_POST['id_vendor'];
$id_warehouse = $_POST['id_warehouse'];
$id_brand = $_POST['id_brand'];
$id_fixture = $_POST['id_fixture'];
$id_tipe = $_POST['id_tipe'];
$id_detail = $_POST['id_detail'];
$jumlah = $_POST['jumlah'];
$thn_produksi = $_POST['thn_produksi'];
$thn_demolish = $_POST['thn_demolish'];

$kode_brand = $_POST['kode_brand'];
$kode_fixture = $_POST['kode_fixture'];
$kode_tipe = $_POST['kode_tipe'];


$result = mysqli_query($koneksi,"SELECT * FROM tbl_inventory WHERE id_vendor='$id_vendor'
 AND id_warehouse='$id_warehouse' AND id_brand = '$id_brand' AND id_fixture='$id_fixture' AND id_tipe = '$id_tipe'
 AND id_detail = '$id_detail' AND thn_produksi = '$thn_produksi'
ORDER BY running_number  DESC LIMIT 1");
if (mysqli_num_rows($result) > 0) {
   $last_row = mysqli_fetch_array($result);
   $init = $last_row['running_number'];

}
else {
  $init = 0;
}




for ($i=$init+1; $i < $jumlah+$init+1; $i++) {
  $id_status = 1;
  $running_number = $i;
  $nomor_kode = sprintf("%'03d", $i);
  $kode_inventory = $kode_brand.''.$thn_produksi.''. sprintf("%'03d", $kode_fixture).''.$kode_tipe.''.$nomor_kode;
  $result = mysqli_query($koneksi, "INSERT INTO tbl_inventory
    (id_vendor, id_warehouse, id_brand, id_fixture, id_tipe, running_number,
    kode_inventory, id_detail, thn_produksi, thn_demolish, id_status)
    VALUES('$id_vendor','$id_warehouse','$id_brand','$id_fixture','$id_tipe',
    '$running_number', '$kode_inventory', '$id_detail', '$thn_produksi', '$thn_demolish' , '$id_status')")
     or die(mysqli_error()); // query untuk menambahkan data ke dala

  if($result === TRUE){
    echo "berhasil";

  }else{
    echo "gagal";
  }
}


 ?>
