<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Siswa
 */
class Model_pengaturan extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  public function listPengaturan() {
    $query = $this->db->get('pengaturan');
    return $query->result();
  }

  public function biayaPendidikan() {
    $query = $this->db->get('biayapendidikan');
    return $query->result();
  }

  public function updatePengaturan() {
    $this->kepalamadrasah = $_POST['pengaturan-kepala-madrasah'];
    $this->namasekolah    = $_POST['pengaturan-nama-sekolah'];
    $this->alamatsekolah  = $_POST['pengaturan-alamat-sekolah'];
    $this->namabendahara  = $_POST['pengaturan-nama-bendahara'];
    $this->tahunajaran    = $_POST['pengaturan-tahun-ajaran'];

    $biayax         = $_POST['biaya-pendidikan-10'];
    $biayaxi        = $_POST['biaya-pendidikan-11'];
    $biayaxii       = $_POST['biaya-pendidikan-12'];

    $this->db->where('id',1);
    $this->db->update('pengaturan',$this);

    $this->db->query("UPDATE biayapendidikan
                      SET jumlah = CASE tingkat
                        WHEN 10 THEN $biayax
                        WHEN 11 THEN $biayaxi
                        WHEN 12 THEN $biayaxii
                        END
                      WHERE tingkat IN (10,11, 12)
                      ");

    header('location:'.base_url().index_page().'/pengaturan');
  }
}
