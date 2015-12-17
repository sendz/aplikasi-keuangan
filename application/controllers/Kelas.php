<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Siswa
 */
class Kelas extends CI_Controller
{

  function __construct()
  {
    # code...
    parent::__construct();
    $this->load->model('model_kelas');
    $this->load->model('model_pengaturan');
  }

  public function index()
  {
    # code...
    # get data kelas from database
    $data['list']       = $this->model_kelas->listKelas();
    $data['pengaturan'] = $this->model_pengaturan->listPengaturan();
    // $data['namakelas']  = $this->model_kelas->namaKelas();
    $this->load->view('head', $data);
    $this->load->view('nav', $data);
    $this->load->view('kelas', $data);
    $this->load->view('foot');
  }

  public function update() {
    $this->model_kelas->updateKelas();
  }

  public function tambah() {
    $this->model_kelas->addKelas();
  }
}
