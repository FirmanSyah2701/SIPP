<?php 
    class Dokter{
        private $kd_dokter;
        private $nama_dokter;

        public function setKdDokter($kd_dokter){
            $this->kd_dokter = $kd_dokter;
        }

        public function getKdDokter(){
            return $this->kd_dokter;
        }

        public function setNamaDokter($nama_dokter){
            $this->nama_dokter = $nama_dokter;
        }

        public function getNamaDokter(){
            return $this->nama_dokter;
        }

        public function showDokter(){
            $sql = $this->db->query('SELECT * FROM dokter');
            return $sql;
        }
    }