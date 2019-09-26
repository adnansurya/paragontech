<?php

// Basic example of PHP script to handle with jQuery-Tabledit plug-in.
// Note that is just an example. Should take precautions such as filtering the input data.

include("../koneksi.php");

header('Content-Type: application/json');
$input = filter_input_array(INPUT_POST);


if ($input['action'] === 'edit') {
    mysqli_query($koneksi, "UPDATE tbl_detail SET nama_detail='" . $input['nama_detail'] . "' WHERE id_detail='" . $input['id_detail'] . "'");
} else if ($input['action'] === 'delete') {
    mysqli_query($koneksi, "DELETE from tbl_detail WHERE id_detail='" . $input['id_detail'] . "'");
} else if ($input['action'] === 'restore') {
    mysqli_query($koneksi, "UPDATE tbl_detail SET deleted=0 WHERE id_detail='" . $input['id_detail'] . "'");
}

mysqli_close($koneksi);

echo json_encode($input);
?>
