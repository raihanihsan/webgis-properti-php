<?php 
    require 'connection.php';

    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM properti WHERE id = $id");
    $data = mysqli_fetch_array($query);
?>
<h3>Detail Properti</h3>
     <div class="content">
        <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0">
            <tr>
                <td width="20%">Kategori</td>
                <td width="1%">:</td>
                <td><?php echo $data['kategori']; ?></td>
            </tr>
            <tr>
                <td width="20%">Jenis</td>
                <td width="1%">:</td>
                <td><?php echo $data['jenis']; ?></td>
            </tr>
            <tr>
                <td width="20%">Harga</td>
                <td width="1%">:</td>
                <td><?php echo $data['harga']; ?></td>
            </tr>
            <tr>
                <td width="20%">Alamat</td>
                <td width="1%">:</td>
                <td><?php echo $data['alamat']; ?></td>
            </tr>
            <tr>
                <td width="20%">Luas Tanah</td>
                <td width="1%">:</td>
                <td><?php echo $data['lt']; ?></td>
            </tr>
            <tr>
                <td width="20%">Luas Bangunan</td>
                <td width="1%">:</td>
                <td><?php echo $data['lb']; ?></td>
            </tr>
            <tr>
                <td width="20%">Keterangan</td>
                <td width="1%">:</td>
                <td><?php echo $data['keterangan']; ?></td>
            </tr>
            <tr>
                <td width="20%">Status</td>
                <td width="1%">:</td>
                <td><?php echo $data['status']; ?></td>
            </tr>
            
        </table>
    </div>