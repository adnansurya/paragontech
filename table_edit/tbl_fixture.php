<?php

// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

include("../koneksi.php");

header('Content-Type: application/json');
$input = filter_input_array(INPUT_POST);


if ($input['action'] === 'edit') {
    mysqli_query($koneksi, "UPDATE tbl_fixture SET nama_fixture='" . $input['nama_fixture'] . "', kode_fixture='" . $input['kode_fixture'] . "' WHERE id_fixture='" . $input['id_fixture'] . "'");
} else if ($input['action'] === 'delete') {
    mysqli_query($koneksi, "DELETE from tbl_fixture WHERE id_fixture='" . $input['id_fixture'] . "'");
} else if ($input['action'] === 'restore') {
    mysqli_query($koneksi, "UPDATE tbl_fixture SET deleted=0 WHERE id_fixture='" . $input['id_fixture'] . "'");
}

mysqli_close($koneksi);

echo json_encode($input);
?>
