<?php
include_once('config.php');
$id = $_GET['id'];
$sql = "SELECT * FROM siswa WHERE id='$id'";
$result = mysqli_query($con, $sql);
$r = mysqli_fetch_assoc($result);
if(!empty($r['foto'])) {
    unlink("siswa/foto" . $r['foto']);
}

$sql = "DELETE from siswa WHERE id='$id'";
$result =  mysqli_query($con, $sql);
if ($result) {
    header('location: index.php?m=siswa&s=view');
} else {
    include "index.php?m=siswa&s=view";
    echo '<script language="JavaScript">';
        echo 'alert("Data Gagal Ditambahkan.")';
    echo '</script>';
}