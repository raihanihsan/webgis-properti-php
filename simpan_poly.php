<?php 
    require 'connection.php';

    $keterangan = $_GET['keterangan'];
    $wkt = $_GET['wkt'];
    $kategori = $_GET['kategori'];
    $jenis = $_GET['jenis'];
    $harga = $_GET['harga'];
	$alamat = $_GET['alamat'];
    $lt = $_GET['lt'];
	$lb = $_GET['lb'];
	$gambar = $_GET['gambar'];

    $sql = "INSERT INTO properti(kategori,jenis,harga,alamat,lt,lb,foto,keterangan,geom) values('$kategori','$jenis','$harga','$alamat','$lt','$lb','$foto','$keterangan','$wkt')";
    if($conn->query($sql)){
        echo "data berhasil tersimpan";
    }else
    {
        echo "data gagal tersimpan. ";
    }
?>