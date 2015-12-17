<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Siswa
 */
class Model_pengeluaran extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  function listPengeluaran() {
    $query = $this->db->get_where('pemasukan', array('keterangan'=>'pengeluaran'));
    return $query->result();
  }

  function addPengeluaran() {
    $this->tanggal      = $_POST['pengeluaran-tambah-tanggal'];
    $this->jumlah       = (-1 * $_POST['pengeluaran-tambah-jumlah']);
    $this->namakegiatan = $_POST['pengeluaran-tambah-kegiatan'];
    $this->tujuan       = $_POST['pengeluaran-tambah-tujuan'];
    $this->penanggungjawab  = $_POST['pengeluaran-tambah-penanggungjawab'];
    $this->bendahara        = $_POST['pengeluaran-tambah-bendahara'];
    $this->keterangan       = 'pengeluaran';

    $this->db->insert('pemasukan', $this);

    // Back to Pengeluaran after completed
    header('location:'.base_url().index_page().'/pengeluaran');
  }
}
