<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Siswa
 */
class Model_kelas extends CI_Model
{

  function __construct()
  {
    # code...
    parent::__construct();
  }

  public function listKelas() {
    // $query = $this->db->query('SELECT * FROM kelas');
    $query = $this->db->query('SELECT kelas.id, kelas.slug, kelas.nama, kelas.tingkat, (SELECT COUNT(*) FROM siswa WHERE siswa.idkelas = kelas.id) AS jumlah_siswa FROM kelas');
    // $query = $this->db->query('SELECT siswa.idkelas, kelas.id, kelas.slug, kelas.nama, kelas.tingkat, COUNT()')
    return $query->result();
  }

  public function namaKelas() {
    $query = $this->db->query('SELECT kelas.id, kelas.tingkat, kelas.nama FROM kelas');
    return $query->result();
  }

  public function addKelas() {
    $splitKelas = preg_split("/ /",$_POST['kelas-tambah-nama']);
    $this->tingkat = $splitKelas[0];
    if (isset($splitKelas[2])) {
      $this->nama = $splitKelas[1] . " " . $splitKelas[2];
    } else {
      $this->nama = $splitKelas[1];
    }
    $this->slug = underscore($_POST['kelas-tambah-nama']);

    // Database Query - Insert
    $this->db->insert('kelas', $this);

    // Back to Kelas after completed
    header('location:'.base_url().index_page().'/kelas');
  }

  public function updateKelas() {
    $splitKelas = preg_split("/ /",$_POST['kelas-edit-nama']);
    $this->tingkat = $splitKelas[0];
    if (isset($splitKelas[2])) {
      $this->nama = $splitKelas[1] . " " . $splitKelas[2];
    } else {
      $this->nama = $splitKelas[1];
    }
    $this->slug = underscore($_POST['kelas-edit-nama']);
    $id = $_POST['kelas-edit-id'];

    // Database Query - Update
    $this->db->where('id', $id);
    $this->db->update('kelas',$this);

    // Back to Kelas after completed
    header('location:'.base_url().index_page().'/kelas');
  }

  public function jumlahSiswa($idkelas) {
    $this->db->where('idkelas', $idkelas);
    $this->db->from('siswa');
    return $this->db->count_all_results();
  }
}
