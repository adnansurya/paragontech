<?php

// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.
include("../koneksi.php");

header('Content-Type: application/json');
$input = filter_input_array(INPUT_POST);

if ($input['action'] === 'edit') {
  mysqli_query($koneksi, "UPDATE tbl_tipe SET nama_tipe='" . $input['nama_tipe'] . "', kode_tipe='" . $input['kode_tipe'] . "' WHERE id_tipe='" . $input['id_tipe'] . "'");
} else if ($input['action'] === 'delete') {
  mysqli_query($koneksi, "DELETE from tbl_tipe WHERE id_tipe='" . $input['id_tipe'] . "'");
} else if ($input['action'] === 'restore') {
    mysqli_query($koneksi, "UPDATE tbl_tipe SET deleted=0 WHERE id_tipe='" . $input['id_tipe'] . "'");
}

mysqli_close($koneksi);

echo json_encode($input);
?>
