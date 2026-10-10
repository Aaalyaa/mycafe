<?php
include "../../config.php";
include "../../auth.php";
$username = $_SESSION['username'];
$tanggal = date("l, d F Y");
$role = $_SESSION['peran'] ?? 'User';
$id_user = $_GET["id_user"];
$query = "SELECT * FROM user WHERE id_user = '$id_user'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Owner - Edit Akun</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style-form.css">
</head>

<body>
    <nav class="navbar navbar-custom d-flex justify-content-between align-items-center">
        <div class="navbar-left">
            <?php echo $tanggal . " | " . $username . " (" . $role . ")"; ?>
        </div>
        <div class="navbar-right">
            <a href="../../logout.php" class="btn btn-logout"
                onclick="return confirm('Apakah kamu yakin ingin keluar dari website?')">Logout</a>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        <h2 class="title">Edit Akun Owner</h2>

        <a href="../../admin-akun.php" class="btn back-link" role="button">← Kembali</a>

        <div class="form">
            <form action="proses_edit_admin.php" method="POST">
                <div class="form-group my-3">
                    <label for="id-user">ID User</label>
                    <input type="text" class="form-control" id="id-user" name="id_user"
                        value="<?php echo $data["id_user"]; ?>" readonly>
                </div>
                <div class="form-group my-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                        value="<?php echo $data["username"]; ?>" required>
                </div>
                <div class="form-group my-3">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password"
                        value="<?php echo $data["password"]; ?>" required>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" name="update" class="btn btn-submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>