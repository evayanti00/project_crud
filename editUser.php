<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <h2>edit user</h2>
    <?php
        require_once ' classes/user.php';
        $users = new Users();
        $data = $users->readByID($_GET['id']);
    
    ?>
    <form action="proses_user.php" method="POST">
        <label for="nama">Nama : </label>
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <input type="text" name="nama" value="<?= $data['nama'] ?>">><br>
         <label for="email">Email : </label>
        <input type="email" id="email" name="email" value="<?= $data['email'] ?>"><br><br>

        <label for="password">Password : </label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Update">
    </form>
    <hr>
    <h2>Data user</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>nama</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php
        require_once 'classes/user.php';
        $users = new Users();
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