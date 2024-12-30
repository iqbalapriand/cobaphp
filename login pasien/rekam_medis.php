<?php
require_once "_config/config.php";
session_start();

if (!isset($_SESSION['user']) || ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'patient')) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user'];
$is_admin = $_SESSION['role'] === 'admin';

if ($is_admin) {
    $sql = "SELECT r.*, p.nama_pasien, d.nama_dokter 
            FROM tb_rekammedis r 
            JOIN tb_pasien p ON r.id_pasien = p.id_pasien 
            JOIN tb_dokter d ON r.id_dokter = d.id_dokter 
            ORDER BY r.tgl_periksa DESC";
} else {
    $sql = "SELECT r.*, p.nama_pasien, d.nama_dokter 
            FROM tb_rekammedis r 
            JOIN tb_pasien p ON r.id_pasien = p.id_pasien 
            JOIN tb_dokter d ON r.id_dokter = d.id_dokter 
            WHERE r.id_pasien = '$user_id' 
            ORDER BY r.tgl_periksa DESC";
}

$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Medical Records</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Medical Records</h2>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <?php if ($is_admin): ?>
                                <th>Patient</th>
                                <?php endif; ?>
                                <th>Doctor</th>
                                <th>Diagnosis</th>
                                <th>Treatment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= date('d/m/Y', strtotime($row['tgl_periksa'])) ?></td>
                                <?php if ($is_admin): ?>
                                <td><?= $row['nama_pasien'] ?></td>
                                <?php endif; ?>
                                <td><?= $row['nama_dokter'] ?></td>
                                <td><?= $row['diagnosis'] ?></td>
                                <td><?= $row['penanganan'] ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>