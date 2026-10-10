<!DOCTYPE html>
<html>

<head>
    <title>Kategori</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style-table.css">
</head>

<body>
    <?php
    include "config.php";
    include "auth.php";
    $username = $_SESSION['username'];
    $tanggal = date("l, d F Y");
    $role = $_SESSION['peran'] ?? 'User';
    ?>

    <nav class="navbar navbar-custom d-flex justify-content-between align-items-center">
        <div class="navbar-left">
            <?php echo $tanggal . " | " . $username . " (" . $role . ")"; ?>
        </div>
        <div class="navbar-right">
            <a href="logout.php" class="btn btn-logout"
                onclick="return confirm('Apakah kamu yakin ingin keluar dari website?')">Logout</a>
        </div>
    </nav>
    <div class="header mt-4 text-center">
        <h2 align="center">Kategori Menu</h2>
    </div>
    <div class="container table-wrapper mb-4">
        <div class="row mt-4 mb-3 align-items-center">
            <div class="col-md-6">
                <a href="admin-dashboard.php" class="btn btn-kembali">Kembali</a>
            </div>
            <div class="col-md-6 text-right">
                <!-- <a href="fungsi/arsip/arsip_kategori.php" class="btn btn-arsip mb-2" role="button">Lihat Arsip</a> -->
                <a href="fungsi/tambah/tambah_kategori.php" class="btn btn-tambah mb-2 ml-2" role="button">+ Tambah Kategori
                    Baru</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>ID Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include "config.php";
                    $sql = "SELECT * FROM kategori WHERE status_kategori = 1 ORDER BY id_kategori ASC"; 
                    $result = $conn->query($sql);
                    while ($data = $result->fetch_assoc()) {
                        ?>

                        <tr>
                            <td><?php echo $data["id_kategori"]; ?></td>
                            <td><?php echo $data["nama_kategori"]; ?></td>
                            <td class="action-buttons">
                                <div class="btn-actions">
                                    <a href="fungsi/edit/edit_kategori.php?id_kategori=<?php echo $data["id_kategori"]; ?>"
                                        class="btn btn-sm btn-edit mr-2">Edit</a>
                                    <!-- <a href="fungsi/arsip/proses_arsip_kategori.php?id_kategori=<?= $data['id_kategori'] ?>&status=0"
                                        class="btn btn-status btn-sm">Arsipkan</a> -->
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                    }
                    ?>
            </table>
        </div>
    </div>
</body>

</html>