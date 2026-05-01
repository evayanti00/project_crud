<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <?php
        require_once 'classes/user.php';
        $users = new Users();

        // cek apakah ada parameter id
        $id = $_GET['id'] ?? null;
        if ($id === null) {
            die("ID tidak ditemukan di URL");
        }

        $data = $users->readByID($id);
    ?>
    <form action="prosses_user_update.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <label for="nama">Nama : </label>
        <input type="text" id="nama" name="nama" value="<?= $data['nama'] ?>"><br>

        <label for="email">Email : </label>
        <input type="email" id="email" name="email" value="<?= $data['email'] ?>"><br><br>

        <label for="password">Password : </label>
        <input type="password" id="password" name="password"><br><br>

        <input type="submit" value="Update">
    </form>

    <hr>
    <h2>Data User</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        $data = $users->read();
        while($row = $data->fetch_assoc()){
            echo "
                <tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['email']}</td>
                    <td>
                        <a href='editUser.php?id={$row['id']}'>Edit</a>
                    </td>
                </tr>
            ";
        }
        ?>
    </table>
</body>
</html>
