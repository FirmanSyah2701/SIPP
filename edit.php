<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <div class="container">
        <h2>Edit Jadwal Baru</h2>

        <?php 
        require_once('Jadwal_dokter.php');

        if(isset($_GET['id_jadwal'])){
            $jadwal = new Jadwal_dokter();
            $baru = $jadwal->editJadwal($_GET['id_jadwal']);
            $row = $baru->fetch(PDO::FETCH_OBJ);
        ?>
        <form action="edit.php" method="POST" class="form-group">
            <input type="hidden" name="id_jadwal" value="<?= $row->id_jadwal ?>">
            Nama Dokter: <input type="text" name="nama_dokter" value ="<?= $row->nama_dokter ?>"><br>
            Hari: <input type="text" name="hari" value ="<?= $row->hari ?>"><br>
            Jam Awal: <input type="text" name="jam_awal" value="<?= $row->jam_awal ?>"><br>
            Jam Akhhir: <input type="text" name="jam_akhir" value ="<?= $row->jam_akhir?>"><br>
            <input type="submit" name="update" value="Update">
            <input type="reset" value="Reset" >
        </form>
        <?php } ?>
    </div>
</body>
</html>

<?php
    if(isset($_POST['update'])){
        $id_jadwal = $_POST['id_jadwal'];
        $nama_dokter = $_POST['nama_dokter'];
        $hari = $_POST['hari'];
        $jam_awal = $_POST['jam_awal'];
        $jam_akhir = $_POST['jam_akhir'];
        $jadwal = new Jadwal_dokter();
        $upd = $jadwal->updateJadwal($id_jadwal, $nama_dokter, $hari, $jam_awal, $jam_akhir);

        if($upd == "Success")
            header('Location: index.php');
    }
?>