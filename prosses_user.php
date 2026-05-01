<?php
require_once 'classes/user.php';
$users = new Users();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form sesuai atribut name
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Simpan ke database
    if ($users->create($nama, $email, $password)) {
        echo 'Simpan data berhasil';
    } else {
        echo 'Gagal simpan data';
    }
} else {
    echo 'Tidak valid';
}
?>
