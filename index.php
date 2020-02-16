<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Dokter</title>
</head>

<style>
    table, td, th {  
        border: 1px solid #ddd;
    }
    table{
        border-collapse:collapse; 
        width:80%;
    }
    th, td {
        padding:10px;
    }
</style>
<body>
    <a href="tambah.php">Tambah</a>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Dokter</th>
            <th>Hari</th>
            <th>Jam Awal</th>
            <th>Jam Akhir</th>
            <th>Aksi</th>
        </tr>
        <?php 
            require_once('Jadwal_dokter.php');
            $i = 1;
            $jadwal = new Jadwal_dokter();
            $show = $jadwal->showJadwalDokter();
            while ($row = $show->fetch(PDO::FETCH_OBJ)) {
        ?>
        <tr>
            <td><?= $i++; ?>.</td>
            <td><?= $row->nama_dokter; ?></td>
            <td><?= $row->hari; ?></td>
            <td><?= $row->jam_awal; ?></td>
            <td><?= $row->jam_akhir; ?></td>
            <td>
                <a href="edit.php?id_jadwal=<?= $row->id_jadwal ?>">Ubah</a>
                <a href="index.php?delete=<?= $row->id_jadwal ?>" onclick="return confirm('Yakin mau di Hapus?')">
                    Hapus</a>
            </td>
        </tr>
            <?php } ?>
    </table>
</body>
</html>
<?php
    //$del = $_GET['delete'];
    if(isset($_GET['delete'])){
        $del = $jadwal->deleteJadwal($_GET['delete']);
        header('Location: index.php');
    }
?>