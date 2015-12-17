<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Siswa
 */
class Model_kas extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  public function transaksi() {
    if(isset($_POST['kas-tanggal-mulai']) && isset($_POST['kas-tanggal-hingga'])) {

      $tanggalMulai   = $_POST['kas-tanggal-mulai'];
      $tanggalHingga  = $_POST['kas-tanggal-hingga'];
    }
    if (!isset($tanggalMulai) && !isset($tanggalHingga)) {
      $query = $this->db->query('SELECT pemasukan.tanggal AS tanggal, pemasukan.jumlah AS jumlah, pemasukan.namakegiatan AS kegiatan, pemasukan.tujuan AS tujuan, pemasukan.penanggungjawab AS penanggungjawab, pemasukan.bendahara AS bendahara, pemasukan.keterangan AS keterangan, siswa.nis AS nis, siswa.nama AS namasiswa, kelas.tingkat AS tingkat, kelas.nama AS namakelas FROM pemasukan LEFT JOIN siswa ON pemasukan.idsiswa = siswa.id LEFT JOIN kelas ON siswa.idkelas = kelas.id ORDER BY pemasukan.tanggal ASC');
    } else {
      $query = $this->db->query("SELECT pemasukan.tanggal AS tanggal, pemasukan.jumlah AS jumlah, pemasukan.namakegiatan AS kegiatan, pemasukan.tujuan AS tujuan, pemasukan.penanggungjawab AS penanggungjawab, pemasukan.bendahara AS bendahara, pemasukan.keterangan AS keterangan, siswa.nis AS nis, siswa.nama AS namasiswa, kelas.tingkat AS tingkat, kelas.nama AS namakelas FROM pemasukan LEFT JOIN siswa ON pemasukan.idsiswa = siswa.id LEFT JOIN kelas ON siswa.idkelas = kelas.id WHERE pemasukan.tanggal BETWEEN '$tanggalMulai' AND '$tanggalHingga' ORDER BY pemasukan.tanggal ASC");
    }
    return $query->result();
  }
}
