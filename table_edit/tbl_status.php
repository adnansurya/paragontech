<?php

// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

include("../koneksi.php");

header('Content-Type: application/json');
$input = filter_input_array(INPUT_POST);

if ($input['action'] === 'edit') {
  mysqli_query($koneksi, "UPDATE tbl_status SET nama_status='" . $input['nama_status'] . "' WHERE id_status='" . $input['id_status'] . "'");
} else if ($input['action'] === 'delete') {
    mysqli_query($koneksi, "DELETE from tbl_status WHERE id_status='" . $input['id_status'] . "'");
} else if ($input['action'] === 'restore') {
    mysqli_query($koneksi, "UPDATE tbl_status SET deleted=0 WHERE id_status='" . $input['id_status'] . "'");
}

mysqli_close($koneksi);

echo json_encode($input);
?>
