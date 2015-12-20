<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Index
 */
class Pemasukan extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('model_kelas');
    $this->load->model('model_siswa');
    $this->load->model('model_pemasukan');
    $this->load->model('model_pengaturan');
  }

  public function index()
  {
    # code...
    $data['kelas']  = $this->model_kelas->namaKelas();
    $data['tambahkelas'] = $this->model_kelas->namaKelas();
    $data['siswa']  = $this->model_siswa->listSiswa();
    $data['pembayaran'] = $this->model_pemasukan->listPemasukan();
    $data['pengaturan'] = $this->model_pengaturan->listPengaturan();
    $data['biayapendidikan'] = $this->model_pengaturan->biayaPendidikan();
    $this->load->view('head', $data);
    $this->load->view('nav', $data);
    $this->load->view('pemasukan', $data);
    $this->load->view('foot');
  }

  public function siswa($by, $id) {
    $data['pengaturan'] = $this->model_pengaturan->listPengaturan();
    $data['pembayaran'] = $this->model_pemasukan->perSiswa($by, $id);
    $data['biayapendidikan'] = $this->model_pengaturan->biayaPendidikan();

    $this->load->view('head', $data);
    $this->load->view('nav', $data);
    $this->load->view('pemasukansiswa', $data);
    $this->load->view('foot');
  }

  public function kelas($by, $id) {
    $data['pengaturan'] = $this->model_pengaturan->listPengaturan();
    $data['pembayaran'] = $this->model_pemasukan->perKelas($by, $id);
    $data['kelas']      = $this->model_kelas->namaKelas();

    $this->load->view('head', $data);
    $this->load->view('nav', $data);
    $this->load->view('pemasukankelas', $data);
    $this->load->view('foot');
  }

  public function tambah() {
    $this->model_pemasukan->addPemasukan();
  }
}
