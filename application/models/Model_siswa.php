<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Siswa
 */
class Model_siswa extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  public function countSiswa() {
    return $this->db->count_all('siswa');
  }

  public function pageSiswa($limit, $start) {
    $query = $this->db->query("SELECT siswa.id, siswa.nis, siswa.idkelas, siswa.nama, siswa.alamat, siswa.orangtua, siswa.tahunmasuk, kelas.tingkat, kelas.nama as namakelas FROM siswa INNER JOIN kelas ON siswa.idkelas = kelas.id LIMIT $limit OFFSET $start");
    return $query->result();
  }

  public function listSiswa() {
    // 'SELECT kelas.id, kelas.slug, kelas.nama, kelas.tingkat, (SELECT COUNT(*) FROM siswa WHERE siswa.idkelas = kelas.id) AS jumlah_siswa FROM kelas'
    $query = $this->db->query('SELECT siswa.id, siswa.nis, siswa.idkelas, siswa.nama, siswa.alamat, siswa.orangtua, siswa.tahunmasuk, kelas.tingkat, kelas.nama as namakelas FROM siswa INNER JOIN kelas ON siswa.idkelas = kelas.id');
    return $query->result();
  }

  public function listById($by, $id) {
    $query = $this->db->query("SELECT siswa.id, siswa.nis, siswa.idkelas, siswa.nama, siswa.alamat, siswa.orangtua, siswa.tahunmasuk, kelas.tingkat, kelas.nama as namakelas FROM siswa INNER JOIN kelas ON siswa.idkelas = kelas.id WHERE siswa.$by = $id ORDER BY siswa.nis");
    return $query->result();
  }

  public function find($by, $id){
    $query = $this->db->get_where('siswa',array($by => $id));
    return $query->result();
  }

  public function addSiswa() {
    $this->nis        = $_POST['siswa-tambah-nis'];
    $this->nama       = $_POST['siswa-tambah-nama'];
    $this->idkelas    = $_POST['siswa-tambah-kelas'];
    $this->alamat     = $_POST['siswa-tambah-alamat'];
    $this->orangtua   = $_POST['siswa-tambah-orang-tua'];
    $this->tahunmasuk = $_POST['siswa-tambah-tahun-masuk'];

    // Database Query - Insert
    $this->db->insert('siswa',$this);

    // Back to Kelas after completed
    header('location:'.base_url().index_page().'/siswa');
  }

  public function updateSiswa() {
    $id               = $_POST['siswa-edit-id'];
    $this->nis        = $_POST['siswa-edit-nis'];
    $this->nama       = $_POST['siswa-edit-nama'];
    $this->idkelas    = $_POST['siswa-edit-kelas'];
    $this->alamat     = $_POST['siswa-edit-alamat'];
    $this->orangtua   = $_POST['siswa-edit-orang-tua'];
    $this->tahunmasuk = $_POST['siswa-edit-tahun-masuk'];

    // Database Query - Update
    $this->db->where('id', $id);
    $this->db->update('siswa',$this);

    // Back to Kelas after completed
    header('location:'.base_url().index_page().'/siswa');
  }

  public function uploadSiswa() {
    if (isset($_POST['submit'])) {
      $file     = $_FILES['excel-file']['tmp_name'];
      $handle   = fopen($file,"r");
      $c        = 0;
      while (($filesop = fgetcsv($handle, 1000, ";")) != false) {
        $this->idkelas  = $filesop[0];
        $this->nama     = $filesop[1];
        // echo $this->idkelas;
        // echo $this->nama;
        $this->db->insert('siswa', $this);
      }
    }
    header('location:'.base_url().index_page().'/siswa');
  }
}
