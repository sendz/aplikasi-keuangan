<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Siswa
 */
class Siswa extends CI_Controller
{

  function __construct()
  {
    # code...
    parent::__construct();
    $this->load->model('model_kelas');
    $this->load->model('model_siswa');
    $this->load->model('model_pengaturan');
  }

  public function index()
  {
    # code...
    // Get list of Kelas from DB
    $data['kelas']  = $this->model_kelas->namaKelas();
    $data['editkelas']  = $this->model_kelas->namaKelas();
    $data['kelas2']  = $this->model_kelas->namaKelas();
    $data['siswa']  = $this->model_siswa->listSiswa();
    $data['pengaturan'] = $this->model_pengaturan->listPengaturan();
    // Views
    $this->load->view('head', $data);
    $this->load->view('nav', $data);
    $this->load->view('siswa', $data);
    $this->load->view('foot');
  }

  public function tambah() {
    $this->model_siswa->addSiswa();
  }

  public function update() {
    $this->model_siswa->updateSiswa();
  }

  public function kelas($by,$id) {
    $data['siswa']  = $this->model_siswa->find($by,$id);
    $this->load->view('optionsiswa',$data);
  }
}
