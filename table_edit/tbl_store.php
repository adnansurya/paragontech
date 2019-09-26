<?php

// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

include("../koneksi.php");

header('Content-Type: application/json');
$input = filter_input_array(INPUT_POST);

if ($input['action'] === 'edit') {
      mysqli_query($koneksi, "UPDATE tbl_store SET nama_store='" . $input['nama_store'] . "' WHERE id_store='" . $input['id_store'] . "'");
} else if ($input['action'] === 'delete') {
    mysqli_query($koneksi, "DELETE from tbl_store WHERE id_store='" . $input['id_store'] . "'");
} else if ($input['action'] === 'restore') {
      mysqli_query($koneksi, "UPDATE tbl_store SET deleted=0 WHERE id_store='" . $input['id'] . "'");
}

mysqli_close($koneksi);

echo json_encode($input);
?>
