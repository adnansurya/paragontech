<?php
include("../koneksi.php");

// melakukan pengecekan koneksi

  if($_POST['action'] == 'edit') {
    $id_inventory = $_POST['id_inventory'];
    $vendor = $_POST['vendor'];;
    $warehouse = $_POST['warehouse'];
    $brand = $_POST['brand'];
    $fixture = $_POST['fixture'];
    $tipe =$_POST['tipe'];
    $running_number = $_POST['running_number'];
    // $inventory = $row['kode_inventory'];
    $detail = $_POST['detail'];
    $thn_produksi = $_POST['thn_produksi'];
    $thn_demolish = $_POST['thn_demolish'];
    $status = $_POST['status'];

    $result = mysqli_query($koneksi, "SELECT * from tbl_fixture WHERE id_fixture='$fixture'");
    if(mysqli_num_rows($result) == 1 ){
      $row = mysqli_fetch_assoc($result);
      $kode_fixture = $row['kode_fixture'];
    }


    $result = mysqli_query($koneksi, "SELECT * from tbl_brand WHERE id_brand='$brand'");
      if(mysqli_num_rows($result) == 1 ){
        $row = mysqli_fetch_assoc($result);
        $kode_brand = $row['kode_brand'];
      }

    $result = mysqli_query($koneksi, "SELECT * from tbl_tipe WHERE id_tipe='$tipe'");
      if(mysqli_num_rows($result) == 1 ){
        $row = mysqli_fetch_assoc($result);
        $kode_tipe = $row['kode_tipe'];
    }




    $kode_inventory = $kode_brand.''.$thn_produksi.''. sprintf("%'03d", $kode_fixture).''.$kode_tipe.''.sprintf("%'03d", $running_number);

    //perintah untuk melakukan update
    //melakukan update data berdasarkan ID
    $sql = "UPDATE tbl_inventory SET id_vendor = '$vendor', id_warehouse = '$warehouse', id_brand = '$brand',
      id_fixture = '$fixture', id_tipe = '$tipe', id_detail = '$detail', thn_produksi = '$thn_produksi',
      thn_demolish = '$thn_demolish', id_status = '$status', kode_inventory='$kode_inventory', running_number='$running_number' WHERE id_inventory=$id_inventory";
    $result = mysqli_query($koneksi,$sql);
  }else if($_POST['action'] == 'delete') {
    
      $result = mysqli_query($koneksi,"DELETE from tbl_inventory WHERE id_inventory='" . $_POST['id_inventory'] . "'");
  }
    //menangkap parameter yang dikirimkan dari detail.php



    if ($result === TRUE) {
        //jika  berhasil tampil ini
        header('Location: ../cari.php');
    } else {
        // jika gagal tampil ini
        echo "Gagal Melakukan Perubahan: " . $mysqli->error;
    }




?>
