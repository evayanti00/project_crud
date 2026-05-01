<?php
require_once 'classes/user.php';

if (isset($_GET['id'])) {
    $users = new Users();
    $id = $_GET['id'];

    if ($users->delete($id)) {
        echo "<script>alert('User berhasil dihapus'); window.location='form_user.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus user'); window.location='form_user.php';</script>";
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
