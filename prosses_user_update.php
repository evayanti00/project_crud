<?php
require_once 'classes/user.php';
$users = new Users();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama  = $_POST['nama'];
    $email = $_POST['email'];
    $id    = $_POST['id'];

    if ($users->update($id, $nama, $email)) {
        echo "<script>alert('berhasil update data'); window.location='form_user.php';</script>";
    } else {
        echo "<script>alert('gagal update data'); window.location='form_user.php';</script>";
    }
} else {
    echo 'tidak valid';
}
?>
