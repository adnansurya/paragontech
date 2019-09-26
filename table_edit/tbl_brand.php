<?php

// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

include("../koneksi.php");

header('Content-Type: application/json');
$input = filter_input_array(INPUT_POST);


if ($input['action'] === 'edit') {
    //$mysqli->query("UPDATE tbl_brand SET nama_brand='" . $input['nama_brand'] . "', kode_brand='" . $input['kode_brand'] . "' WHERE id_brand='" . $input['id_brand'] . "'");
    mysqli_query($koneksi, "UPDATE tbl_brand SET nama_brand='" . $input['nama_brand'] . "', kode_brand='" . $input['kode_brand'] . "' WHERE id_brand='" . $input['id_brand'] . "'");
} else if ($input['action'] === 'delete') {
    mysqli_query($koneksi, "DELETE from tbl_brand WHERE id_brand='" . $input['id_brand'] . "'");
} else if ($input['action'] === 'restore') {
    mysqli_query($koneksi, "UPDATE tbl_brand SET deleted=0 WHERE id_brand='" . $input['id_brand'] . "'");
}

mysqli_close($koneksi);

echo json_encode($input);
?>
