<?php
    class Jadwal_dokter{
        private $id_jadwal;
        private $nama_dokter;
        private $hari;
        private $jam_awal;
        private $jam_akhir;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=sipp','root','iseedeadpeople');
        }

        public function setId_jadwal($id_jadwal){
            $this->id_jadwal = $id_jadwal;
        }

        public function getId_jadwal(){
            return $this->id_jadwal;
        }

        public function setNama_dokter($nama_dokter){
            $this->nama_dokter = $nama_dokter;
        }

        public function getNama_dokter(){
            return $this->nama_dokter;
        }

        public function setHari($hari){
            $this->hari = $hari;
        }

        public function getHari(){
            return $this->hari;
        }

        public function setJamAwal($jam_awal){
            $this->jam_awal = $jam_awal;
        }

        public function getJamAwal(){
            return $this->jam_awal;
        }

        public function setJamAkhir($jam_akhir){
            $this->jam_akhir = $jam_akhir;
        }

        public function getJamAkhir(){
            return $this->jam_akhir;
        }

        public function showJadwalDokter(){
            $query = $this->db->query("SELECT * FROM jadwal_dokter");
            return $query;
        }

        public function addJadwal($nama, $hari, $jam_awal, $jam_akhir){
            $sql  = "INSERT INTO jadwal_dokter (nama_dokter,hari,jam_awal,jam_akhir)
                        VALUES ('$nama','$hari','$jam_awal','$jam_akhir')";
            $query = $this->db->query($sql);
            if(!$query){
                return $sql;
            }else{
                return "Success";
            }

        }

        public function editJadwal($id_jadwal){
            $sql = "SELECT * FROM jadwal_dokter WHERE id_jadwal='$id_jadwal'";
            $query = $this->db->query($sql);
            return $query;
        }
        public function updateJadwal($id_jadwal, $nama_dokter, $hari, $jam_awal, $jam_akhir){
            $sql = "UPDATE jadwal_dokter SET nama_dokter='$nama_dokter', hari='$hari', jam_awal='$jam_awal', 
                    jam_akhir='$jam_akhir' WHERE id_jadwal='$id_jadwal'";
            $query = $this->db->query($sql);
            if(!$query){
                return "Failed";
            }else{
                return "Success";
            }
        }

        public function deleteJadwal($id_jadwal){
            return $this->db->query("DELETE FROM jadwal_dokter WHERE id_jadwal='$id_jadwal'");
        }
    }
?>