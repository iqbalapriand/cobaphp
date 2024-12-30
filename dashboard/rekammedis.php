<?php
session_start();
require_once "../_config/config.php";
$id_pasien = $_SESSION['user'];
$query = mysqli_query($con, "SELECT * FROM tb_rekammedis WHERE id_pasien = '$id_pasien'") or die(mysqli_error($con));
while($data = mysqli_fetch_assoc($query)) {
    echo $data['id_rm'] . " - " . $data['keluhan'] . " - " . $data['diagnosa'] . "<br>";
}
?>
