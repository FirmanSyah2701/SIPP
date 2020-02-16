<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
</head>
<body>
    <div class="container">
        <h2>Tambah Buku Baru</h2>
        <form action="tambah.php" method="POST" >
            Nama Dokter: <input type="text" name="nama_dokter" ><br>
            Hari: <input type="text" name="hari" ><br>
            Jam Awal: <input type="text" name="jam_awal" ><br>
            Jam Akhir: <input type="text" name="jam_akhir" ><br>
            <input type="submit" name="tambah" value="Tambah" >
            <input type="reset" value="Reset" >
        </form>
    </div>
</body>
</html>
<?php
    require_once('Jadwal_dokter.php');
    if(isset($_POST['tambah'])){
        $nama_dokter = $_POST['nama_dokter'];
        $hari = $_POST['hari'];
        $jam_awal = $_POST['jam_awal'];
        $jam_akhir = $_POST['jam_akhir'];
        
        $jadwal = new Jadwal_dokter();
        $add = $jadwal->addJadwal($nama_dokter, $hari, $jam_awal, $jam_akhir);

        if($add == "Success"){
            header('Location: index.php');
        }else {
            var_dump($add);
        }
    }
?>