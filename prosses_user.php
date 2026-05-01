<?php
 required_once 'classes/users.php';
 $users = new Users();

 if($_SERVER['REQUEST_METHOOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSORD_DEFAULT);

    if ($users->create($nama, $email, $password)) {
        echo 'simpan data berhasil';
    }else {
        echo 'gagal simpan data';
    }
 }else{
    echo 'tidak valid';
 }

?>