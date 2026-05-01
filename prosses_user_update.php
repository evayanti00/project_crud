<?php
 required_once 'classes/users.php';
 $users = new Users();

 if($_SERVER['REQUEST_METHOOD'] == 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    if ($users->create($id, $nama, $email)) {
        echo "<script>alert('berhasil update data'); window.location'form_user.php'</script>;"
    }else {
        echo "<script>alert('gagal update data'); window.location'form_user.php'</script>;"
    }
 }else{
    echo 'tidak valid';
 }

?>