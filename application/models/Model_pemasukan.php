<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Siswa
 */
class Model_pemasukan extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  public function perSiswa($by,$id) {
    $query = $this->db->query("SELECT GROUP_CONCAT(pemasukan.id) AS id, siswa.nis AS nis, siswa.nama AS namasiswa, GROUP_CONCAT(pemasukan.tanggal) AS tanggal, GROUP_CONCAT(pemasukan.jumlah) AS jumlah, kelas.tingkat AS tingkat, kelas.nama AS namakelas, biayapendidikan.jumlah AS biayapendidikan FROM siswa, pemasukan, kelas, biayapendidikan WHERE (pemasukan.idsiswa = siswa.id AND kelas.id = siswa.idkelas) AND biayapendidikan.tingkat = kelas.tingkat AND pemasukan.keterangan = 'pemasukan' AND siswa.$by = $id GROUP BY siswa.id ORDER BY siswa.nama");
    return $query->result();
  }

  public function perKelas($by, $id){
    if ($id == 'all') {
      $option = '';
    } else {
      $option = 'AND kelas.'.$by.' = ' . $id;
    }
    $query = $this->db->query("SELECT GROUP_CONCAT(pemasukan.id) AS id, siswa.nis AS nis, siswa.nama AS namasiswa, GROUP_CONCAT(pemasukan.tanggal) AS tanggal, GROUP_CONCAT(pemasukan.jumlah) AS jumlah, kelas.tingkat AS tingkat, kelas.nama AS namakelas, biayapendidikan.jumlah AS biayapendidikan FROM siswa, pemasukan, kelas, biayapendidikan WHERE (pemasukan.idsiswa = siswa.id AND kelas.id = siswa.idkelas) AND biayapendidikan.tingkat = kelas.tingkat AND pemasukan.keterangan = 'pemasukan' $option GROUP BY siswa.id ORDER BY siswa.nama");
    return $query->result();
  }

  public function listPemasukan() {
    // $query = $this->db->query('SELECT siswa.nama, pemasukan.id, pemasukan.tanggal, pemasukan.jumlah, kelas.nama AS namakelas FROM siswa, pemasukan, kelas WHERE pemasukan.idsiswa = siswa.id AND kelas.id = siswa.idkelas');
    $query = $this->db->query("SELECT GROUP_CONCAT(pemasukan.id) AS id, siswa.nis AS nis, siswa.nama AS namasiswa, GROUP_CONCAT(pemasukan.tanggal) AS tanggal, GROUP_CONCAT(pemasukan.jumlah) AS jumlah, kelas.tingkat AS tingkat, kelas.nama AS namakelas, biayapendidikan.jumlah AS biayapendidikan FROM siswa, pemasukan, kelas, biayapendidikan WHERE (pemasukan.idsiswa = siswa.id AND kelas.id = siswa.idkelas) AND biayapendidikan.tingkat = kelas.tingkat AND pemasukan.keterangan = 'pemasukan' GROUP BY siswa.id ORDER BY siswa.nama");
    return $query->result();
  }

  public function addPemasukan() {
    $this->idsiswa  = $_POST['pemasukan-tambah-nama'];
    $this->tanggal  = $_POST['pemasukan-tambah-tanggal'];
    $this->jumlah   = $_POST['pemasukan-tambah-dana'];
    $this->bendahara  = $_POST['pemasukan-tambah-bendahara'];
    $this->keterangan = 'pemasukan';

    $this->db->insert('pemasukan', $this);

    // Back to Pemasukan after completed
    header('location:'.base_url().index_page().'/pemasukan');
  }
}
