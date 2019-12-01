<?php
    require 'connection.php';
    $nama = $_GET['nama'];
    $wkt = $_GET['wkt'];
    $jenis = $_GET['jenis'];

    $sql = "INSERT INTO lokasi(jenis,nama,geom) values('$jenis','$nama','$wkt')";
    if($conn->query($sql)){
        echo "data berhasil tersimpan";
    }else
    {
        echo "data gagal tersimpan. ";
    }
    ?>
?>