<?php

// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

include("../koneksi.php");

header('Content-Type: application/json');
$input = filter_input_array(INPUT_POST);

if ($input['action'] === 'edit') {
      mysqli_query($koneksi, "UPDATE tbl_warehouse SET nama_warehouse='" . $input['nama_warehouse'] . "' WHERE id_warehouse='" . $input['id_warehouse'] . "'");
} else if ($input['action'] === 'delete') {
    mysqli_query($koneksi, "DELETE from tbl_warehouse WHERE id_warehouse='" . $input['id_warehouse'] . "'");
} else if ($input['action'] === 'restore') {
      mysqli_query($koneksi, "UPDATE tbl_warehouse SET deleted=0 WHERE id_warehouse='" . $input['id_warehouse'] . "'");
}

mysqli_close($koneksi);

echo json_encode($input);
?>
