<?php
include "../../config.php";
include "../../auth.php";
$username = $_SESSION['username'];
$tanggal = date("l, d F Y");
$role = $_SESSION['peran'] ?? 'User';
$filter_kategori = $_GET['kategori'] ?? '';

$sql = "SELECT 
menu.id_menu, 
menu.nama_menu, 
kategori.nama_kategori AS kategori, 
menu.stok_minimal, 
menu.stok, 
menu.hpp, 
menu.harga_jual 
FROM menu 
INNER JOIN kategori ON menu.id_kategori = kategori.id_kategori 
WHERE menu.status_menu = 0";

if (!empty($filter_kategori)) {
    $sql .= " AND menu.id_kategori = '$filter_kategori'";
}

$sql .= " ORDER BY menu.id_menu ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style-table.css">
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
    <div class="header mt-4 text-center">
        <h2 align="center">Menu - Diarsipkan</h2>
    </div>
    <div class="container table-wrapper mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="../../menu.php" class="btn btn-kembali">Kembali</a>

                <form method="GET" action="arsip_menu.php" class="form-inline filter-form">
                    <label for="kategori" class="mr-2">Filter:</label>
                    <select name="kategori" id="kategori" class="form-control mr-3">
                        <option value="">-- Semua Kategori --</option>
                        <?php
                        $kategoriQuery = "SELECT * FROM kategori ORDER BY nama_kategori ASC";
                        $kategoriResult = $conn->query($kategoriQuery);
                        while ($kategori = $kategoriResult->fetch_assoc()) {
                            $selected = ($_GET['kategori'] ?? '') == $kategori['id_kategori'] ? 'selected' : '';
                            echo "<option value='{$kategori['id_kategori']}' $selected>{$kategori['nama_kategori']}</option>";
                        }
                        ?>
                    </select>
                    <button type="submit" class="btn btn-filter mr-2">Filter</button>
                    <a href="arsip_menu.php" class="btn btn-reset">Reset</a>
                </form>
            </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>ID Menu</th>
                        <th>Nama Menu</th>
                        <th>Stok Minimal</th>
                        <th>Stok Saat Ini</th>
                        <th>Harga Pokok</th>
                        <th>Harga Jual</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($data = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $data["id_menu"]; ?></td>
                                <td><?php echo $data["nama_menu"]; ?></td>
                                <td><?php echo $data["stok_minimal"]; ?></td>
                                <td><?php echo $data["stok"]; ?></td>
                                <td><?php echo number_format($data["hpp"], 0, ',', '.'); ?></td>
                                <td><?php echo number_format($data["harga_jual"], 0, ',', '.'); ?></td>
                                <td class="action-buttons">
                                    <div class="btn-actions">
                                        <a href="proses_arsip_menu.php?id_menu=<?= $data['id_menu'] ?>&status=1"
                                            class="btn btn-status btn-sm">Jual Menu Ini</a>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="8" class="text-center font-weight-bold">
                                Tidak ada menu yang diarsipkan.
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>